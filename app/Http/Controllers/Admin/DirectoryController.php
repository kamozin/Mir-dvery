<?php

namespace App\Http\Controllers\Admin;
use App\Actions;
use App\characteristics;
use App\Directory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;

use Validator;
use Storage;
class DirectoryController extends Controller
{



public function  store(){
    $directory=Directory::all();
    return view('admin.directory.store', ['directory'=>$directory]);
}


    public function create (Request $request){

                $directoty=new Directory();

                $directoty->name=$request->input('name');
                $directoty->parent_id=$request->input('parent_id');

                $directoty->save();
                return redirect('/admin/directory');


    }

    public function index(){

        $directoty=Directory::all();

        return view('admin.directory.show', ['directory'=>$directoty]);


    }

    public function StoreHar(Request $request){

        $directoty=Directory::where('parent_id', '>', 0)->get();


        return view('admin.directory.har.store', ['directory'=>$directoty, 'id'=>$request->id]);


    }

    public function createHar(Request $request){

        $v = Validator::make($request->all(), [
            'file' => 'mimes:jpg,png,jpeg',

        ]);

        if ($v->fails()) {

            return redirect()->back()->with('error', 'Тип файла запрещен');
        }

        $characteristick=new characteristics();
        $characteristick->name=$request->input('name');

        $directory_razdel=Directory::find($request->id_razdel);

        $directory=Directory::find($directory_razdel->parent_id);

        $characteristick->id_directory=$directory->id;
        $characteristick->id_razdel=$request->id_razdel;

        $file = $request->file('file');

        $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();
        $filename=TranslitController::str2url($filename);
        $filename = $filename . '-' . time() . '.' . $extension;
        $characteristick->img = $filename;

        $request->file('file')->move('gallery/directory/', $filename);

        $characteristick->save();

        return redirect('/admin/directory/characteristics/'.$request->id_razdel);
    }

    public function ShowHar($id){

        $char=characteristics::where('id_razdel', '=', $id)->get();



        $directory=Directory::all();
            return view('admin.directory.har.show', ['har'=>$char, 'directory'=>$directory, 'id'=>$id]);

    }

}
