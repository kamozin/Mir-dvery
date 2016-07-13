<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Validator;
use Input;
use Storage;
use Session;

class CategoryController extends Controller
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

        $category = Category::all();

        return view('admin.category.show', ['category' => $category]);

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
        $category = new Category();

        $category->name = $request->input('name');
        $category->url = TranslitController::str2url($request->input('name'));

        $urlCheck = $this->checkUrl($category->url);

        if (empty($urlCheck['items'])) {


        } else {

            return redirect()->back()->with('error', 'URL уже существует измените название')->withInput();

        }

        $category->parent_id = $request->input('parent_id');
        $category->text = $request->input('text');

        $file = $request->file('file');

        $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();
        $filename=TranslitController::str2url($filename);
        $filename = $filename . '-' . time() . '.' . $extension;
        $category->img = $filename;

        $request->file('file')->move('gallery/category/', $filename);


        if ($category->save()) {
            return redirect('/admin/category')->with('success', 'Категория ' . $request->input('name') . ' успешно создана');
        } else {
            return redirect()->back()->with('error', 'Ошибка при создании категории');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $catigories = $this->getCategories();
        return view('admin.category.add', ['categories' => $catigories]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    public function checkUrl($url)
    {

        $category = Category::where('url', '=', $url)->get();

        return $category;

    }

    public function getCategories()
    {


        $categories = Category::all();

        return $categories;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $category = Category::find($id);

        $categories = $this->getCategories();

        return view('admin.category.edit', ['category' => $category, 'categories' => $categories]);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $category = Category::find($request->input('id'));

        $category->name = $request->input('name');
        $category->url = TranslitController::str2url($request->input('name'));
        $category->text = $request->input('text');

        $category->save();

        return redirect('/admin/category');

    }


    public function editPhoto($id)
    {

        $category = Category::find($id);

        if ($category) {
            return view('admin.category.photo', ['id' => $id]);
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

        $category = Category::find($request->input('id'));

        $photo_old = $category->img;


        $file = $request->file('file');

        $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();
        $filename=TranslitController::str2url($filename);
        $filename = $filename . '-' . time() . '.' . $extension;
        $category->img = $filename;

        if ($request->file('file')->move('gallery/category/', $filename)) {

            Storage::delete('gallery/category/' . $photo_old);
            $category->save();
            return redirect('/admin/category');

        }
        return redirect()->back()->withErrors('error', 'Ошибка')->withInput();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);

        $category->delete();

        return redirect('/admin/category');
    }
}
