<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function index(Product $model)
    {
        return view('products.index', ['products' => $model->paginate(15)]);
    }

    public function create()
    {
      $categories = Category::all();

      return view('products.create', ['categories' => $categories]);

    }

    public function store(Request $request)
    {
    	//dd($request);
        $validate = $this->validate($request, [
          'name' => 'required|string|min:4|max:255',
          'description' => 'required|string|min:10|max:255',
          //'categoryProd_id' => 'required|string|min:4|max:255',
          'precio' => 'required|numeric',
          'cantidad' => 'required|numeric',
          'inventario' => 'required|numeric',
          'image' => 'file',

        ]);

        $categorie = new Product();
        $categorie->name = $request->input('name');
        $categorie->description = $request->input('description');
        $categorie->categoryProd_id = $request->input('categoryProd_id');
        $categorie->precio = $request->input('precio');
        $categorie->cantidad = $request->input('cantidad');
        $categorie->inventario = $request->input('inventario');

        //Subir la imagen photo
        $image_photo = $request->file('image');
        if ($image_photo) {

          //Poner nombre unico
          $image_photo_name = time() . $image_photo->getClientOriginalName();

          //Guardarla en la carpeta storage (storage/app/users)
          Storage::disk('imgproducts')->put($image_photo_name, File::get($image_photo));

          //Seteo el nombre de la imagen en el objeto
          $categorie->image = $image_photo_name;
        }


        $categorie->save();

        return back()->withStatus(__('Product successfully created.'));

    }

    public function edit($id)
    {
      $product = Product::find($id);
      $categories = Category::all();

      return view('products.edit', ['product' => $product, 'categories' => $categories]);
    }

    public function update(Request $request)
    {    

    //dd($request); 

      $validate = $this->validate($request, [
          'name' => 'required|string|min:4|max:255',
          'description' => 'required|string|min:10|max:255',
          //'categoryProd_id' => 'required|string|min:4|max:255',
          'precio' => 'required|numeric',
          'cantidad' => 'required|numeric',
          'inventario' => 'required|numeric',
          'image' => 'file',

      ]);

        $categorie = Product::find($request->id);
        $categorie->name = $request->input('name');
        $categorie->description = $request->input('description');
        $categorie->categoryProd_id = $request->input('categoryProd_id');
        $categorie->precio = $request->input('precio');
        $categorie->cantidad = $request->input('cantidad');
        $categorie->inventario = $request->input('inventario');

        //Subir la imagen photo
        $image_photo = $request->file('image');
        if ($image_photo) {

          //Poner nombre unico
          $image_photo_name = time() . $image_photo->getClientOriginalName();

          //Guardarla en la carpeta storage (storage/app/users)
          Storage::disk('imgproducts')->put($image_photo_name, File::get($image_photo));

          //Seteo el nombre de la imagen en el objeto
          $categorie->image = $image_photo_name;
        }

        $categorie->save();

        return back()->withStatus(__('Product successfully updated.'));

    }

    public function getImage($filename)
    {
      // Obtener imagen de avatar
      $file = Storage::disk('imgproducts')->get($filename);
      return new Response($file, 200);
    }
}
