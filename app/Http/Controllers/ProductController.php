<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Product;
use App\Models\Pedido;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use DB;

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
      'image1' => 'file',
      'image2' => 'file',
      'image3' => 'file',
      'image4' => 'file',

    ]);

    $categorie = new Product();
    $categorie->name = $request->input('name');
    $categorie->description = $request->input('description');
    $categorie->categoryProd_id = $request->input('categoryProd_id');
    $categorie->precio = $request->input('precio');
    $categorie->cantidad = $request->input('cantidad');

    /*
    //Subir la imagen photo1
    $image_photo1 = $request->file('image1');
    if ($image_photo1) {

      //Poner nombre unico
      $image_photo_name1 = time() . $image_photo1->getClientOriginalName();

      //Guardarla en la carpeta storage (storage/app/users)
      Storage::disk('imgproducts')->put($image_photo_name1, File::get($image_photo1));

      //Seteo el nombre de la imagen en el objeto
      $categorie->image1 = $image_photo_name1;
    }
    */

    //Subir la imagen photo2
    $image_photo = $request->file('image1');
    $image_photo2 = $request->file('image2');
    $image_photo3 = $request->file('image3');
    $image_photo4 = $request->file('image4');
    if ($image_photo || $image_photo2 || $image_photo3 || $image_photo4) {

    //Poner nombre unico
    $image_photo_name = time() . $image_photo->getClientOriginalName();
    $image_photo_name2 = time() . $image_photo2->getClientOriginalName();
    $image_photo_name3 = time() . $image_photo3->getClientOriginalName();
    $image_photo_name4 = time() . $image_photo4->getClientOriginalName();

    //Guardarla en la carpeta storage (storage/app/users)
    Storage::disk('imgproducts')->put($image_photo_name, File::get($image_photo));
    Storage::disk('imgproducts')->put($image_photo_name2, File::get($image_photo2));
    Storage::disk('imgproducts')->put($image_photo_name3, File::get($image_photo3));
    Storage::disk('imgproducts')->put($image_photo_name4, File::get($image_photo4));

    //Seteo el nombre de la imagen en el objeto
    $categorie->image1 = $image_photo_name;
    $categorie->image2 = $image_photo_name2;
    $categorie->image3 = $image_photo_name3;
    $categorie->image4 = $image_photo_name4;
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

  public function detail($id)
  {

    $product = Product::find($id);
    $idcategoria = $product->categoryProd_id;

    //dd($product);
    $product = Product::find($id);

    //  
    $category = DB::table("categories")
    ->where('id', $idcategoria)    
    ->get();

    //dd($category);

    //$categories = Category::find($id);

    $tolProVend = Pedido::where('id_product', $id)->sum('cantidad');


    return view('products.detail', [
      'product' => $product,
      'category'=> $category,
      'tolProVend' => $tolProVend
    ]);
  }

  public function update(Request $request)
  {    

    $validate = $this->validate($request, [
      'name' => 'required|string|min:4|max:255',
      'description' => 'required|string|min:10|max:255',
      //'categoryProd_id' => 'required|string|min:4|max:255',
      'precio' => 'required|numeric',
      'cantidad' => 'required|numeric',
      'image' => 'file',

    ]);

      $categorie = Product::find($request->id);
      $categorie->name = $request->input('name');
      $categorie->description = $request->input('description');
      $categorie->categoryProd_id = $request->input('categoryProd_id');
      $categorie->precio = $request->input('precio');
      $categorie->cantidad = $request->input('cantidad');

      /*
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
      */

      //Subir la imagen photo2
      $image_photo = $request->file('image1');
      $image_photo2 = $request->file('image2');
      $image_photo3 = $request->file('image3');
      $image_photo4 = $request->file('image4');
      if ($image_photo || $image_photo2 || $image_photo3 || $image_photo4) {

      //Poner nombre unico
      $image_photo_name = time() . $image_photo->getClientOriginalName();
      $image_photo_name2 = time() . $image_photo2->getClientOriginalName();
      $image_photo_name3 = time() . $image_photo3->getClientOriginalName();
      $image_photo_name4 = time() . $image_photo4->getClientOriginalName();

      //Guardarla en la carpeta storage (storage/app/users)
      Storage::disk('imgproducts')->put($image_photo_name, File::get($image_photo));
      Storage::disk('imgproducts')->put($image_photo_name2, File::get($image_photo2));
      Storage::disk('imgproducts')->put($image_photo_name3, File::get($image_photo3));
      Storage::disk('imgproducts')->put($image_photo_name4, File::get($image_photo4));

      //Seteo el nombre de la imagen en el objeto
      $categorie->image = $image_photo_name;
      $categorie->image2 = $image_photo_name2;
      $categorie->image3 = $image_photo_name3;
      $categorie->image4 = $image_photo_name4;

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
