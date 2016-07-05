<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Page;

class MainController extends Controller
{
    //

    public function index(){


        return view('main');

    }


    public function page($name){

        $page=Page::where('url', '=', $name)->get();


        return view('page', ['page'=>$page[0]['original']]);


    }

    public function about(){

        $p=new Page();

        $url='about';

        $page=$p->getPage($url);



    }

    public function ecatalog(){

        return view('ecatalog');

    }

    public function service(){


    }

    public function credit(){


    }

    public function contacts(){


    }



}
