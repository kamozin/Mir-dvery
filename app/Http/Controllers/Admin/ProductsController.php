<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\characteristics;
use App\Directory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class ProductsController extends Controller
{
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

}
