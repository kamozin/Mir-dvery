<?php

namespace App\Http\Controllers\Admin;

use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Validator;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
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

        $news=News::all();

        return view('admin.news.show', ['news'=>$news]);
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

            $news=new News();

            $news->name=$request->input('name');
            $news->url=TranslitController::str2url($request->input('name'));
            $news->text=$request->input('text');
            $news->description=$request->input('description');
            $news->keywords=$request->input('keywords');
            $news->title=$request->input('title');
        $file = $request->file('file');

        $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();
        $filename = $filename . '-' . time() . '.' . $extension;
        $news->img = $filename;

        $request->file('file')->move('gallery/news/', $filename);

        $news->save();

        return redirect('/admin/news');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {

        return view ('admin.news.store');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $news=News::find($id);

        return view('admin.news.edit', ['news'=>$news]);
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

        $news=News::find($request->input('id'));

        $news->name=$request->input('name');
        $news->url=TranslitController::str2url($request->input('name'));
        $news->text=$request->input('text');
        $news->description=$request->input('description');
        $news->keywords=$request->input('keywords');
        $news->title=$request->input('title');

        $news->save();

        return redirect('/admin/news');

    }

    public function editPhoto($id)
    {

        $category = News::find($id);

        if ($category) {
            return view('admin.news.photo', ['id' => $id]);
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

        $category = News::find($request->input('id'));

        $photo_old = $category->img;


        $file = $request->file('file');

        $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();
        $filename = $filename . '-' . time() . '.' . $extension;
        $category->img = $filename;

        if ($request->file('file')->move('gallery/category/', $filename)) {

            Storage::delete('gallery/news/' . $photo_old);
            $category->save();
            return redirect('/admin/news');

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
