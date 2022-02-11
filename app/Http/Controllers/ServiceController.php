<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Service;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ServiceController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function index(Service $model)
    {
        return view('services.index', ['services' => $model->paginate(15)]);
    }

    public function create()
    {
      $categories = Category::all();

      return view('services.create', ['categories' => $categories]);

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

        $categorie = new Service();
        $categorie->name = $request->input('name');
        $categorie->description = $request->input('description');
        $categorie->categoryServ_id = $request->input('categoryServ_id');
        $categorie->precio = $request->input('precio');
        $categorie->cantidad = $request->input('cantidad');
        $categorie->inventario = $request->input('inventario');

        //Subir la imagen photo
        $image_photo = $request->file('image');
        if ($image_photo) {

          //Poner nombre unico
          $image_photo_name = time() . $image_photo->getClientOriginalName();

          //Guardarla en la carpeta storage (storage/app/users)
          Storage::disk('imgservices')->put($image_photo_name, File::get($image_photo));

          //Seteo el nombre de la imagen en el objeto
          $categorie->image = $image_photo_name;
        }


        $categorie->save();

        return back()->withStatus(__('Service successfully created.'));

    }

    public function edit($id)
    {
      $service = Service::find($id);
      $categories = Category::all();

      return view('services.edit', ['service' => $service, 'categories' => $categories]);
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

        $categorie = Service::find($request->id);
        $categorie->name = $request->input('name');
        $categorie->description = $request->input('description');
        $categorie->categoryServ_id = $request->input('categoryServ_id');
        $categorie->precio = $request->input('precio');
        $categorie->cantidad = $request->input('cantidad');
        $categorie->inventario = $request->input('inventario');

        //Subir la imagen photo
        $image_photo = $request->file('image');
        if ($image_photo) {

          //Poner nombre unico
          $image_photo_name = time() . $image_photo->getClientOriginalName();

          //Guardarla en la carpeta storage (storage/app/users)
          Storage::disk('imgservices')->put($image_photo_name, File::get($image_photo));

          //Seteo el nombre de la imagen en el objeto
          $categorie->image = $image_photo_name;
        }

        $categorie->save();

        return back()->withStatus(__('Service successfully updated.'));

    }

    public function getImage($filename)
    {
      // obtener imagen avatar
      $file = Storage::disk('imgservices')->get($filename);
      return new Response($file, 200);
    }
}
