<?php

namespace App\Http\Controllers\Admin;
use Validator;
use App\Category;
use App\characteristics;
use App\Directory;
use App\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class ProductsController extends Controller
{

    public function index(){

        $product=Products::all();
        $category=Category::all();

        return view('admin.products.show', ['products'=>$product, 'category'=>$category]);
    }


    //
    public function store()
    {
        $category = Category::all();
        $directory = Directory::where('parent_id', '=', 0)->get();
        $dir = [];
        for ($i = 0; $i < count($directory); $i++) {
            $dir[$i] = [];
            $dir[$i] = array_add($dir[$i], 'id', $directory[$i]->id);
            $dir[$i] = array_add($dir[$i], 'name', $directory[$i]->name);
        }
        for ($i = 0; $i < count($dir); $i++) {
            $directory_razdel = Directory::where('parent_id', '=', $dir[$i]['id'])->get();

            for ($j = 0; $j < count($directory_razdel); $j++) {
                $dir[$i]['razdel'][$j] = [];
                $dir[$i]['razdel'][$j] = array_add($dir[$i]['razdel'][$j], 'id', $directory_razdel[$j]['id']);
                $dir[$i]['razdel'][$j] = array_add($dir[$i]['razdel'][$j], 'name', $directory_razdel[$j]['name']);
            }
        }
        for ($i = 0; $i < count($dir); $i++) {
//           dd($dir);
            for ($j = 0; $j < count($dir[$i]['razdel']); $j++) {
                $directory_properties = characteristics::where('id_razdel', '=', $dir[$i]['razdel'][$j]['id'])->get();
                $dir[$i]['razdel'][$j]['properties']=[];
                for($q=0; $q<count($directory_properties); $q++) {
                    $dir[$i]['razdel'][$j]['properties'][$q]=[];
                    $dir[$i]['razdel'][$j]['properties'][$q] = array_add($dir[$i]['razdel'][$j]['properties'][$q], 'id', $directory_properties[$q]['id']);
                    $dir[$i]['razdel'][$j]['properties'][$q] = array_add($dir[$i]['razdel'][$j]['properties'][$q], 'img', $directory_properties[$q]['img']);
                    $dir[$i]['razdel'][$j]['properties'][$q] = array_add($dir[$i]['razdel'][$j]['properties'][$q], 'name', $directory_properties[$q]['name']);
                }
            }
        }

//        dd($dir);
        return view('admin.products.store', ['category'=>$category, 'dir'=>$dir ]);
    }



    public function productCreate(Request $request){

        $v = Validator::make($request->all(), [
            'file' => 'mimes:jpg,png,jpeg',
            'files' => 'mimes:jpg,png,jpeg',

        ]);

        if ($v->fails()) {

            return redirect()->back()->with('error', 'Тип файла запрещен');
        }

        $product=new Products();

//        dd($request->input('directory'));

        $product->name=$request->input('name');
        $product->url=TranslitController::str2url($request->name);
        $product->price=$request->input('price');
        $product->text=$request->input('text');
        $product->keywords=$request->input('keywords');
        $product->description=$request->input('description');
        $product->title=$request->input('title');
        $product->id_category=$request->input('id_category');
        $product->properties=implode(",", $request->input('directory'));



//        Картинка 1

        $file = $request->file('file');

        $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();

        $filename=TranslitController::str2url($filename);
        $filename=TranslitController::str2url($filename);
        $filename = $filename . '-' . time() . '.' . $extension;
        $product->img_one = $filename;

        $request->file('file')->move('gallery/products/', $filename);

//        Картинка 2

        $file = $request->file('files');

        $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();

        $filename=TranslitController::str2url($filename);
        $filename=TranslitController::str2url($filename);
        $filename = $filename . '-' . time() . '.' . $extension;
        $product->img_too = $filename;

        $request->file('files')->move('gallery/products/', $filename);
        $product->save();

        return redirect('/admin/products');

    }


    public function edit(Request $request){

            $id=$request->id;

        $product=Products::find($id);



        $category=Category::all();

//        $product = $product[0]['original'];
        $directory = Directory::where('parent_id', '=', 0)->get();
        $razdel = Directory::where('parent_id', '>', 0)->get();
        $properties_arr = explode(',', $product['original']['properties']);


        for ($i = 0; $i < count($directory); $i++) {
            $dir[$i] = [];
            $dir[$i] = array_add($dir[$i], 'id', $directory[$i]->id);
            $dir[$i] = array_add($dir[$i], 'name', $directory[$i]->name);
        }
        for ($i = 0; $i < count($dir); $i++) {
            $directory_razdel = Directory::where('parent_id', '=', $dir[$i]['id'])->get();

            for ($j = 0; $j < count($directory_razdel); $j++) {
                $dir[$i]['razdel'][$j] = [];
                $dir[$i]['razdel'][$j] = array_add($dir[$i]['razdel'][$j], 'id', $directory_razdel[$j]['id']);
                $dir[$i]['razdel'][$j] = array_add($dir[$i]['razdel'][$j], 'name', $directory_razdel[$j]['name']);
            }
        }
        for ($i = 0; $i < count($dir); $i++) {
//           dd($dir);
            for ($j = 0; $j < count($dir[$i]['razdel']); $j++) {
                $directory_properties = characteristics::where('id_razdel', '=', $dir[$i]['razdel'][$j]['id'])->get();
                $dir[$i]['razdel'][$j]['properties']=[];
                for($q=0; $q<count($directory_properties); $q++) {
                    $dir[$i]['razdel'][$j]['properties'][$q]=[];
                    $dir[$i]['razdel'][$j]['properties'][$q] = array_add($dir[$i]['razdel'][$j]['properties'][$q], 'id', $directory_properties[$q]['id']);
                    $dir[$i]['razdel'][$j]['properties'][$q] = array_add($dir[$i]['razdel'][$j]['properties'][$q], 'img', $directory_properties[$q]['img']);
                    $dir[$i]['razdel'][$j]['properties'][$q] = array_add($dir[$i]['razdel'][$j]['properties'][$q], 'name', $directory_properties[$q]['name']);
                }
            }
        }
//dd($spravochniki);

        return view('admin.products.edit', ['product'=>$product, 'category'=>$category, 'dir'=>$dir, 'properties_arr'=> $properties_arr]);


    }


    public function update(Request $request){


        $product=Products::find($request->id);
        $product->name=$request->input('name');
        $product->url=TranslitController::str2url($request->name);
        $product->price=$request->input('price');
        $product->text=$request->input('text');
        $product->keywords=$request->input('keywords');
        $product->description=$request->input('description');
        $product->title=$request->input('title');
        $product->id_category=$request->input('id_category');
        $product->properties=implode(",", $request->input('directory'));

        $product->save();

        return redirect('/admin/products');

    }


    public function editPhotos($id){


        return view('admin.products.EditPhotos', ['id'=>$id]);


    }
    public function updatePhotos(Request $request){


        $product=Products::find($request->id);

        if(empty($request->file('file')) && empty($request->file('files'))){

           return redirect()->back()->with('error', 'Добавьте хотя бы 1 фотографию');

        }elseif(empty($request->file('files'))){


            //        Картинка 2

            $file = $request->file('files');

            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();

            $filename=TranslitController::str2url($filename);
            $filename=TranslitController::str2url($filename);
            $filename = $filename . '-' . time() . '.' . $extension;
            $product->img_too = $filename;

            $request->file('files')->move('gallery/products/', $filename);
            $product->save();

        }elseif(empty($request->file('file'))){



            $file = $request->file('file');

            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();

            $filename=TranslitController::str2url($filename);
            $filename=TranslitController::str2url($filename);
            $filename = $filename . '-' . time() . '.' . $extension;
            $product->img_one = $filename;

            $request->file('file')->move('gallery/products/', $filename);


        }else{
            //        Картинка 1

            $file = $request->file('file');

            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();

            $filename=TranslitController::str2url($filename);
            $filename=TranslitController::str2url($filename);
            $filename = $filename . '-' . time() . '.' . $extension;
            $product->img_one = $filename;

            $request->file('file')->move('gallery/products/', $filename);

//        Картинка 2

            $file = $request->file('files');

            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();

            $filename=TranslitController::str2url($filename);
            $filename=TranslitController::str2url($filename);
            $filename = $filename . '-' . time() . '.' . $extension;
            $product->img_too = $filename;

            $request->file('files')->move('gallery/products/', $filename);
            $product->save();

        }



        return redirect('/admin/products');


    }



    public function destroy($id){

        $product=Products::find($id);

        $product->delete();

        return redirect()->back();


    }

}
