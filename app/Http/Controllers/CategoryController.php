<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function index(Category $model)
    {
        return view('categories.index', ['categories' => $model->paginate(15)]);
    }

    public function edit($id)
    {
        $categorie = Category::find($id);

        return view('categories.edit', ['categorie' => $categorie]);
    }  

    public function create()
    {

      return view('categories.create');

    }

    public function store(Request $request)
    {
        //dd($request);
        $validate = $this->validate($request, [
          'name' => 'required|string|min:4|max:255',
          'description' => 'required|string|min:10|max:255',
        ]);

        $categorie = new Category();
        $categorie->name = $request->input('name');
        $categorie->description = $request->input('description');

        $categorie->save();

        return back()->withStatus(__('Category successfully created.'));
        
    }

    public function update(Request $request)
    {        
        $validate = $this->validate($request, [
          'name' => 'required|string|min:4|max:255',
          'description' => 'required|string|min:10|max:255',
        ]);

        $categorie = Category::find($request->id);
        $categorie->name = $request->input('name');
        $categorie->description = $request->input('description');

        $categorie->save();

        return back()->withStatus(__('Category successfully updated.'));
        
    }
}
