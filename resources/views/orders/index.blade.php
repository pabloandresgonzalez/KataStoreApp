@extends('layouts.app', ['page' => __('Tables'), 'pageSlug' => 'tables'])

@section('content')
<div class="row">
  <div class="col-md-12">
  	<div class="col-md-12">
    <div class="card  card-plain">
      <div class="card-header">
        <h4 class="card-title"> Orders  </h4>
        <p class="category"> Validate and manage your orders</p>
        <div>
        <p class="text">Total de ordenes creadas  {{ $tolOrders }}</p>
      </div>        
      </div>
      

      @if(session('message'))
          <div class="alert alert-success alert-dismissible">
            {{ session('message') }}
            <button type="button" class="close" data-dismiss="alert">
              <span>x</span>
            </button>
          </div>
      @endif

      

      <!-- Form -->
      <form class="">
        <div class="form-group mb-0">
          <div class="input-group input-group-alternative">
            <div class="input-group-prepend">
              <span class="input-group-text thead-dark"><i class="fas fa-search"></i></span>
            </div>
            <input name="buscarpor" class="form-control" placeholder="Buscar" type="text">
              <!-- <button class="btn btn-secondary btn-sm" type="submit">Buscar</button> -->
            </div>
        </div>
      </form>

      <div class="card-body">
        <div class="table-responsive">
          <table class="table tablesorter " id="">
            <thead class=" text-primary">
              <tr>
                <th class="text-center">id</th>
                <th class="text-center">name</th>
                <th class="text-center">#product</th>
                <th class="text-center">estado actual</th>
                <th class="text-center">description</th>
                <th class="text-center">precio</th>
                <th class="text-center">cantidad</th>
                <th class="text-center">observacion</th>
                <th class="text-center">total</th>
                <th class="text-center">soporte de pago</th>
                <th class="text-center">creado</th>
                <th class="text-center">actualizado</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($news as $pedido)

            
              <tr>         
                <td class="text-center">
                   {{ $pedido->id }}
                </td>  
                <td class="text-center">
                  {{ $pedido->name}}
                </td>
                <td class="text-center">
                  {{ $pedido->id_product }}
                </td>
                <td class="text-center">                  
                  <form action="" method="POST">
                    @csrf
                      @method('')                
                  <a class="btn btn-primary btn-link" href="{{ url('/pedidos/'.$pedido->id.'/edit') }}">
                    {{ $pedido->estado }}
                  </form>                  
                </td>
                </a> 
                <td class="text-center">
                  {{ $pedido->description }}
                </td>
                <td class="text-center">
                  {{ $pedido->precio }}
                </td>
                <td class="text-center">
                  {{ $pedido->cantidad }}
                </td>
                <td class="text-center">
                  {{ $pedido->observacion }}
                </td>
                <td class="text-center">
                  {{ $pedido->total }}
                </td>
                <td class="text-center">                  
                  <img src=""/>                     
                </td>
                <td class="text-center">
                  {{ $pedido->created_at }}
                </td>
                <td class="text-center">
                  {{ $pedido->updated_at }}
                </td>
               </tr>
               
               @endforeach  
          	 
            </tbody>
          </table>          
        </div>
        
        
          <ul class="pagination justify-content-center">
            <li class="page-item" >{!! $news->links() !!}</li>         
          </ul>
       
     
        
      </div>
    </div>
  </div>
  </div>
  
</div>
@endsection

