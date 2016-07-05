<?php

namespace App\Http\Controllers\Admin;

use App\Actions;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;

use Validator;
use Storage;

class ActionsController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $actions=Actions::all();

        return view('admin.actions.show', ['actions'=>$actions]);
    }

    public function store()
    {

        return view ('admin.actions.store');

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $v = Validator::make($request->all(), [
            'file' => 'mimes:jpg,png,jpeg',

        ]);

        if ($v->fails()) {


            return redirect()->back()->with('error', 'Тип файла запрещен')->withInput();
        }

        $actions=new Actions();

        $actions->name=$request->input('name');
        $actions->url=TranslitController::str2url($request->input('name'));
        $actions->text=$request->input('text');
        $actions->description=$request->input('description');
        $actions->keywords=$request->input('keywords');
        $actions->title=$request->input('title');
        $file = $request->file('file');

        $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();
        $filename = $filename . '-' . time() . '.' . $extension;
        $actions->img = $filename;

        $request->file('file')->move('gallery/actions/', $filename);

        $actions->save();

        return redirect('/admin/actions');


    }

    public function edit($id)
    {
        //

        $actions=Actions::find($id);

        return view('admin.actions.edit', ['actions'=>$actions]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $actions=Actions::find($request->input('id'));

        $actions->name=$request->input('name');
        $actions->url=TranslitController::str2url($request->input('name'));
        $actions->text=$request->input('text');
        $actions->description=$request->input('description');
        $actions->keywords=$request->input('keywords');
        $actions->title=$request->input('title');

        $actions->save();

        return redirect('/admin/actions');

    }

    public function editPhoto($id)
    {

        $category = Actions::find($id);

        if ($category) {
            return view('admin.actions.photo', ['id' => $id]);
        } else {

            return redirect()->back();

        }

    }


    public function updatePhoto(Request $request)
    {

        $v = Validator::make($request->all(), [
            'file' => 'mimes:jpg,png,jpeg',

        ]);

        if ($v->fails()) {

            return redirect()->back()->with('error', 'Тип файла запрещен');
        }

        $actions = Actions::find($request->input('id'));

        $photo_old = $category->img;


        $file = $request->file('file');

        $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();
        $filename = $filename . '-' . time() . '.' . $extension;
        $actions->img = $filename;

        if ($request->file('file')->move('gallery/actions/', $filename)) {

            Storage::delete('gallery/actions/' . $photo_old);
            $actions->save();
            return redirect('/admin/actions');

        }
        return redirect()->back()->withErrors('error', 'Ошибка')->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
