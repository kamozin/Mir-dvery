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
//dd($properties_arr);
//        Массив справочников отобранный для вывода
        $directory_arr = [];

//        for ($i = 0; $i < count($directory); $i++) {
        $i = 0;
        foreach ($directory as $d) {
            foreach ($properties_arr as $p) {

                if ($d['original']['id'] == $p['har']['id_directory']) {
                    $directory_arr[$i] = [];
                    $directory_arr[$i] = array_add($directory_arr[$i], 'directory', $d['original']);

                    unset($d['original']);
                    $i++;
                } else {

                }
            }
        }
//        dd($directory_arr);

//        Массив раздела отобранный для вывода
        $razdel_arr = [];
        $i = 0;
//        for ($i = 0; $i < count($razdel); $i++) {
        foreach ($razdel as $r) {

            foreach ($properties_arr as $p) {

                if ($r['original']['id'] == $p['har']['id_razdel']) {

                    $razdel_arr[$i] = [];
                    $razdel_arr[$i] = array_add($razdel_arr[$i], 'razdel', $r['original']);

                    unset($r['original']);
                    $i++;
                } else {

                }
            }
        }

//        Собираем в один массив Справочники и Разделы.
        $spravochniki = [];
        $i = 0;

        foreach ($directory_arr as $d) {
//            Добавляем в массив справочник
            $spravochniki[$i] = [];

            $spravochniki[$i] = array_add($spravochniki[$i], 'directory', $d['directory']);
            $j = 0;

            foreach ($razdel_arr as $r) {
                if ($spravochniki[$i]['directory']['id'] == $r['razdel']['parent_id']) {
                    $spravochniki[$i]['directory']['razdel'][$j] = $r['razdel'];

                    unset($r['razdel']);

                    $k = 0;
                    foreach ($properties_arr as $p) {

                        if ($spravochniki[$i]['directory']['razdel'][$j]['id'] == $p['har']['id_razdel']) {

                            $spravochniki[$i]['directory']['razdel'][$j]['harackteristick'][$k] = [];

 $spravochniki[$i]['directory']['razdel'][$j]['harackteristick'][$k] = array_add($spravochniki[$i]['directory']['razdel'][$j]
 ['harackteristick'][$k], 'harakt', $p['har']);
//                            unset($p['har']);

                                $k++;
                        }

                    }
                    $j++;
                }


            }
            $i++;
        }


        return view('product', ['product' => $product, 'spravochnick' => $spravochniki]);

    }

//    Построение дерева категорий
    static function categoryTree()
    {


    }
}