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
        $properties = explode(',', $product['original']['properties']);
        $properties_arr = [];

//        Тащим информацию о характеристиках
        for ($i = 0; $i < count($properties); $i++) {

            $char = characteristics::where('id', '=', $properties[$i])->get();
//                dd($char[0]['original']);
            $properties_arr[$i] = [];
            $properties_arr[$i] = array_add($properties_arr[$i], 'har', $char[0]['original']);

        }

//        Оставляем только нужные справочники

//        Массив справочников отобранный для вывода
        $directory_arr = [];
        for ($i = 0; $i < count($directory); $i++) {

            for ($j = 0; $j < count($properties_arr); $j++) {

                if ($directory[$i]['original']['id'] == $properties_arr[$j]['har']['id_directory']) {

                    $directory_arr[$i] = [];

                    $directory_arr[$i] = array_add($directory_arr[$i], 'directory', $directory[$i]['original']);
                } else {

                }
            }
        }



//        Массив раздела отобранный для вывода
        $razdel_arr = [];
        for ($i = 0; $i < count($razdel); $i++) {

            for ($j = 0; $j < count($properties_arr); $j++) {

                if ($razdel[$i]['original']['id'] == $properties_arr[$j]['har']['id_razdel']) {

                    $razdel_arr[$i] = [];
                    $razdel_arr[$i] = array_add($razdel_arr[$i], 'razdel', $razdel[$i]['original']);
                } else {


                }
            }
        }


        $spravochniki = [];
        for ($i = 0; $i < count($directory_arr); $i++) {
//            Добавляем в массив справочник
            $spravochniki[$i] = [];
            $spravochniki[$i] = array_add($spravochniki[$i], 'directory', $directory_arr[$i]['directory']);
            for ($j = 0; $j < count($razdel_arr); $j++) {


                if ($spravochniki[$i]['directory']['id'] == $razdel_arr[0]['razdel']['parent_id']) {
                    $spravochniki[$i]['directory']['razdel'][$j] = [];
                    $spravochniki[$i]['directory']['razdel'][$j] = $razdel_arr[0]['razdel'];
                    unset($razdel_arr[0]);
                    sort($razdel_arr);
                }
            }
        }

        for ($i = 0; $i < count($spravochniki); $i++) {
            $count = count($spravochniki[$i]['directory']['razdel']);
            for ($j = 0; $j < $count; $j++) {
                for ($k = 0; $k < count($properties_arr); $k++) {

                    if ($spravochniki[$i]['directory']['razdel'][$j]['id'] == $properties_arr[0]['har']['id_razdel']) {

                        $spravochniki[$i]['directory']['razdel'][$j]['harackteristick'][$k] = [];
                        $spravochniki[$i]['directory']['razdel'][$j]['harackteristick'][$k] = array_add($spravochniki[$i]['directory']['razdel'][$j]['harackteristick'][$k], 'harakt', $properties_arr[0]['har']);

                        unset($properties_arr[0]);
                        sort($properties_arr);
//                        dd($properties_arr);
                    }
                }
            }
        }
//dd($spravochniki);

        return view('admin.products.edit', ['product'=>$product, 'category'=>$category, 'dir'=>$spravochniki]);


    }

    public function destroy($id){

        $product=Products::find($id);

        $product->delete();

        return redirect()->back();


    }

}
