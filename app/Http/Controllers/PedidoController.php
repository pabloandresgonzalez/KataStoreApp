<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Pedido;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use DB;




class PedidoController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index(Request $request)
	{

		$nombre = $request->get('buscarpor');

		// Buscador
		$news = Pedido::where('name', 'LIKE', "%$nombre%")
		->orwhere('id', 'LIKE', "%$nombre%")
		->orwhere('id_product', 'LIKE', "%$nombre%")
		->orwhere('categoryProd_id', 'LIKE', "%$nombre%")
		->orwhere('estado', 'LIKE', "%$nombre%")
		->orwhere('description', 'LIKE', "%$nombre%")
		->orwhere('precio', 'LIKE', "%$nombre%")
		->orderBy('created_at', 'desc')
		->paginate(40);

    $tolOrders = Pedido::all()->count('id');


	    return view('orders.index', compact('news', 'tolOrders'));

	}

	public function create($id)
	{	
		//dd($id);
		//Conseguir usuario identificado
  	$user = \Auth::user(); 
  	$name = $user->name;

		//$pedido = Product::find($id);
		$product = Product::find($id);
		$id_product =  $product->id;

		$tolProVend = Pedido::where('id_product', $id)->sum('cantidad');
		
		return view('orders.create', compact('name', 'product', 'id_product', 'tolProVend'));		
	}

	public function edit($id)
	{
		$pedido = Pedido::find($id);

		return view('orders.edit', [
			'pedido' => $pedido
		]);
	}

	public function store(Request $request)
	{

		//Conseguir usuario identificado
      	$user = \Auth::user(); 
      	$userid = $user->id;

		$validate = $this->validate($request, [
  		'id' =>'string',
      'name' => 'required|string|min:4|max:255',
      'description' => 'required|string|min:10|max:255',
      'estado' => 'required|string|min:4|max:255',
      'address' => 'required|string|min:4|max:255',
      'precio' => 'required|numeric',
      'phone' => 'required|numeric',
      'cantidad' => 'required|numeric',
      'observation' => 'string|min:10|max:255',
      'image' => 'file'
    ]);

    $pedido = new Pedido();
    $pedido->id_product = $request->input('id');
    $pedido->name = $request->input('name');
    $pedido->user_id = $userid;
    $pedido->categoryProd_id = $request->input('categoryProd_id');
    $pedido->estado = $request->input('estado');
    $pedido->description = $request->input('description');
    $pedido->precio = $request->input('precio');
    $pedido->address = $request->input('address');
    $pedido->phone = $request->input('phone');
    $pedido->cantidad = $request->input('cantidad');
    $precio = $request->input('precio');
    $cantidad = $request->input('cantidad'); 
    $total = $precio * $cantidad;

    $pedido->total = $total;

    $pedido->observation = $request->input('observation');  

    //Subir la imagen
    $image_photo1 = $request->file('image');
    if ($image_photo1) {

      //Poner nombre unico
      $image_photo_name1 = time() . $image_photo1->getClientOriginalName();

      //Guardarla en la carpeta storage (storage/app/users)
      Storage::disk('imgorders')->put($image_photo_name1, File::get($image_photo1));

      //Seteo el nombre de la imagen en el objeto
      $pedido->image = $image_photo_name1;
    }  
    
    $pedido->save();  

    $news = Pedido::where('user_id', $user->id)->get();

    $nombreApp = config('app.name', 'Laravel');

    $colores = array(
    	'! Gracias por tu compra, felicitaciones disfrútala ¡',
			'! Super ya está tu compra, disfrútala ¡',
			'! Buena decisión ¡tu compra a finalizado',
			'! Gracias por comprar este articulo ¡que lo disfrutes',
			'! Gracias por comprar en '. $nombreApp .'¡, disfruta tu compra'
      );

    var_export ($colores);
		$message = $colores[array_rand($colores)];

    return redirect()->route('misorders')->with([
        'message' => $message,
        'news' => $news,
        'user' => $user,
        'pedido' => $pedido
    ]);     
    
	}

	public function indexMisOrders(Request $request)
	{

		//Conseguir usuario identificado
      $user = \Auth::user();
      $id = $user->id;


    $pedidos = Pedido::where('user_id', $user->id)
    ->orderBy('created_at', 'desc')
    ->paginate(30);

    $nombre = $request->get('buscarpor');

    // Total gastado por usuario
     $totalGasto = $this->totalGasto();
      
		/*
		// Buscador
		$pedidos = Pedido::where('name', 'LIKE', "%$nombre%")
		->orwhere('id', 'LIKE', "%$nombre%")
		->orwhere('id_product', 'LIKE', "%$nombre%")
		->orwhere('categoryProd_id', 'LIKE', "%$nombre%")
		->orwhere('estado', 'LIKE', "%$nombre%")
		->orwhere('description', 'LIKE', "%$nombre%")
		->orwhere('precio', 'LIKE', "%$nombre%")
		->orderBy('created_at', 'desc')
		->paginate(30);*/
		

	   return view('orders.misorders', compact('pedidos', 'totalGasto'));

	}

	public function getImage($filename)
  {
    // Obtener imagen de avatar
    $file = Storage::disk('imgorders')->get($filename);
    return new Response($file, 200);
  }

  private function totalGasto()
  {
    // Conseguir usuario identificado
    $user = \Auth::user();
    $id = $user->id;

    // Total gastado por usuario
    $totalGasto = DB::table("pedidos")
      ->where('user_id', $id)      
      ->get()->sum("precio");

    return $totalGasto;
  }

  	public function update(Request $request)
	{
		//dd($request->id);
		$id = $request->id;

		//Conseguir usuario identificado
  	$user = \Auth::user(); 
  	$userid = $user->id;

    $pedido = Pedido::find($id);
    $id_product = $pedido->id_product;
    $name = $pedido->name;
    $user_id = $pedido->user_id;
    $categoryProd_id = $pedido->categoryProd_id;
    $description = $pedido->description;
    $precio = $pedido->precio;
    $address = $pedido->address;
    $phone = $pedido->phone;
    $cantidad = $pedido->cantidad;
    $observation = $pedido->observation;

		$validate = $this->validate($request, [			
      'estado' => 'required|string|min:4|max:255'
    ]);

		$estado = $request->input('estado');

    $pedido = Pedido::find($id);
    $pedido->id_product = $id_product;
    $pedido->name = $name;
    $pedido->user_id = $userid;
    $pedido->categoryProd_id = $categoryProd_id;
    $pedido->estado = $estado;
    $pedido->description = $description;
    $pedido->precio = $precio;
    $pedido->address = $address;
    $pedido->phone = $phone;
    $pedido->cantidad = $cantidad;
    $total = $precio * $cantidad;
    $pedido->total = $total;
    $pedido->observation = $observation;  
   
    //dd($pedido);
    $pedido->save();  

    $news = Pedido::where('user_id', $user->id)->get();

    $nombreApp = config('app.name', 'Laravel');

    //$message = 'Pedido . $id . cambio a estado' . $estado . 'con éxito';

		//return view('orders.index', compact('news', 'message'));
    /*
    return view('orders.index')->with([
        'message' => 'Pedido . $id . cambio a estado' . $estado . 'con éxito',
        'news' => $news
    ]);*/

    $colores = array(
    	' Pedido #  ' . $id . ' cambio a estado ' . $estado . ' con éxito '  ,
			' El cambio de estado del pedido # ' . ' ' . $id .' fue un éxito  '
      );

    var_export ($colores);
		$message = $colores[array_rand($colores)];

    return redirect()->route('pedidos')->with([
        'message' => $message,
        'news' => $news
    ]);    
    
	}



}
