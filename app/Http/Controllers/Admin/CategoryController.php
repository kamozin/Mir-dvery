<?php

namespace App\Http\Controllers\Admin;

    use App\Category;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use App\Http\Requests;
    use Illuminate\Support\Facades\Input;
    use Validator;

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

            $category=Category::all();

            return view('admin.category.show');

        }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create(Request $request)
        {

            $v = Validator::make($request->all(), [
                'file' => 'mimes:jpg,png',

            ]);

            if ($v->fails()) {
                return redirect()->back()->with('error', 'Формат файла не поддерживается')->withInput();
            }
            $category = new Category();

            $category->name=$request->input('name');
            $category->url=TranslitController::str2url($request->input('name'));
            $category->parent_id=$request->input('parent_id');
            $category->text=$request->input('text');

            $file = $request->file('file');

            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $filename = $filename . '-' . time() . '.' . $extension;
            $category->img = $filename;

            $request->file('file')->move('gallery/category/', $filename);

            $category->save();

            return redirect('/admin/category');

        }

        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {
            //

            return view('admin.category.add');
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
        }

        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, $id)
        {
            //
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
