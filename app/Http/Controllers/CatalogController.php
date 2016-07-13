<?php

namespace App\Http\Controllers;

use App\Category;
use App\characteristics;
use App\Directory;
use App\Products;
use Illuminate\Http\Request;

use App\Http\Requests;

class CatalogController extends Controller
{


    public function index()
    {

        $category = Category::where('parent_id', '=', 0)->get();

        return view('catalog', ['category' => $category]);
    }

    public function catalog(Request $request)
    {

        $url = $request->url;


        $category = Category::where('url', '=', $url)->get();

        $id = $category[0]['id'];

        $subcategories = Category::where('parent_id', '=', $id)->get();


        if (count($subcategories) == 0) {

            $products = $this->getProducts($id);

            return view('products', ['products' => $products, 'category' => $category]);
        } else {

            return view('catalog', ['category' => $subcategories]);

        }


    }


    public function getProducts($id)
    {

        $products = Products::where('id_category', '=', $id)->get();

        return $products;


    }

    public function product(Request $request)
    {
        $url = $request->url;
        $product = Products::where('url', '=', $url)->get();
        $product = $product[0]['original'];
        $directory = Directory::where('parent_id', '=', 0)->get();
        $razdel = Directory::where('parent_id', '>', 0)->get();
        $properties = explode(',', $product['properties']);
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

//        dd($properties_arr);
        $spravochniki = [];
        for ($i = 0; $i < count($directory_arr); $i++) {
//            Добавляем в массив справочник
            $spravochniki[$i] = [];
            $spravochniki[$i] = array_add($spravochniki[$i], 'directory', $directory_arr[$i]['directory']);
            for ($j = 0; $j < count($razdel_arr); $j++) {
                $spravochniki[$i]['directory']['razdel'][$j] = [];
                if ($spravochniki[$i]['directory']['id'] == $razdel_arr[$j]['razdel']['parent_id']) {
                    $spravochniki[$i]['directory']['razdel'][$j] = $razdel_arr[$j]['razdel'];
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


        return view('product', ['product' => $product, 'spravochnick'=>$spravochniki]);

    }

//    Построение дерева категорий
    static function categoryTree()
    {


    }
}