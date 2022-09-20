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
		//Conseguir usuario identificado
      	$user = \Auth::user(); 
      	$name = $user->name;

		$pedido = Product::find($id);
		
		return view('orders.create', compact('pedido', 'name'));		
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

		//dd($request);
		$validate = $this->validate($request, [
          'name' => 'required|string|min:4|max:255',
          'description' => 'required|string|min:10|max:255',
          'estado' => 'required|string|min:4|max:255',
          'precio' => 'required|numeric',
          'cantidad' => 'required|numeric'
        ]);

        $pedido = new Pedido();
        $pedido->id_product = $request->input('id_product');
        $pedido->name = $request->input('name');
        $pedido->user_id = $userid;
        $pedido->categoryProd_id = $request->input('categoryProd_id');
        $pedido->estado = $request->input('estado');
        $pedido->description = $request->input('description');
        $pedido->precio = $request->input('precio');
        $pedido->cantidad = $request->input('cantidad');  


        $pedido->save();  

        $news = Pedido::all();

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

      	$news = Pedido::where('user_id', $user->id)->get();

		$nombre = $request->get('buscarpor');

		/*
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
		*/

	    return view('orders.misorders', compact('news'));
		//return view('orders.index', ['pedido' => $model->paginate(15)]);
	}



}
