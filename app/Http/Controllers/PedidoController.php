<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Pedido;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;



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
		->paginate(50);

	    return view('orders.index', compact('news'));
		//return view('orders.index', ['pedido' => $model->paginate(15)]);
	}

	public function create($id)
	{	
		//dd($id);
		//Conseguir usuario identificado
      	$user = \Auth::user(); 
      	$name = $user->name;

		//$pedido = Product::find($id);
		$product = Product::find($id);
		$id_product = $id;
		
		return view('orders.create', compact('name', 'product', 'id_product'));		
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
		//dd($request);
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

        //return view('orders.index');
        /*
        return view('orders.index')->with([
            'message' => 'Order successfully created.',
            'news' => $news,

        ]);*/

        return redirect()->route('misorders')->with([
            'message' => 'Order successfully created.',
            'news' => $news,
            'user' =>$user
        ]);

        //'message' => '¡' . $name . '¡hash enviado correctamente!',

        //return view('orders.index', compact());

        //return view('orders.index', ['pedido' => $pedido]);

        //return back()->withStatus(__('Order successfully created.'));        
    
	}

	public function indexMisOrders(Request $request)
	{
		//Conseguir usuario identificado
      $user = \Auth::user();   

    $pedidos = Pedido::where('user_id', $user->id)
    ->orderBy('created_at', 'desc')
    ->paginate(30);

    $nombre = $request->get('buscarpor');
      
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
		
		

	    return view('orders.misorders', compact('pedidos'));
		//return view('orders.index', ['pedido' => $model->paginate(15)]);
	}

	public function getImage($filename)
    {
      // Obtener imagen de avatar
      $file = Storage::disk('imgorders')->get($filename);
      return new Response($file, 200);
    }



}
