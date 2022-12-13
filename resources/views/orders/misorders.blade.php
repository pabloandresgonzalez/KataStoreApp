@extends('layouts.app', ['page' => __('Tables'), 'pageSlug' => 'tables'])

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="col-md-12">
    <div class="card  card-plain">
      <div class="card-header">
        <h4 class="card-title"> My orders  </h4>
        <p class="category"> See the histoail of your orders</p>        
      </div>
      

      @if(session('message'))
          <div class="alert alert-success alert-dismissible">
            {{ session('message') }}
            <button type="button" class="close" data-dismiss="alert">
              <span>x</span>
            </button>
          </div>
      @endif

      <div>
        <a href="{{ route('createproduct')  }}" class="btn btn-primary btn-link">New order</a>
      </div>

      <!-- 
      <form class="">
        <div class="form-group mb-0">
          <div class="input-group input-group-alternative">
            <div class="input-group-prepend">
              <span class="input-group-text thead-dark"><i class="fas fa-search"></i></span>
            </div>
            <input name="buscarpor" class="form-control" placeholder="Buscar" type="text" >
              <button class="btn btn-secondary btn-sm" type="submit" id="boton">Buscar</button>
            </div>
        </div>
      </form>
      Form -->

      <div class="card-body">
        <div class="table-responsive">
          <table class="table tablesorter " id="">
            <thead class=" text-primary">
              <tr>
                <th class="text-center">id</th>
                <th class="text-center">name</th>
                <th class="text-center">#Product</th>
                <th class="text-center">condition</th>
                <th class="text-center">description</th>
                <th class="text-center">price</th>
                <th class="text-center">amount</th>
                <th class="text-center">observation</th>
                <th class="text-center">total</th>
                <th class="text-center">proof of payment</th>
                <th class="text-center">created</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($pedidos as $pedido) 
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
                  {{ $pedido->estado }}
                </td>
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
                  <img src="{{ route('pedido.avatar',['filename'=>$pedido->image]) }}"/>                    
                </td>
                <td class="text-center">
                  {{ $pedido->created_at }}
                </td>
               </tr>
               @endforeach  
             
            </tbody>
          </table>          
        </div>
        
        
          <ul class="pagination justify-content-center">
            {{ $pedidos->appends(request()->input())->links() }}          
          </ul>
       
     
        
      </div>
    </div>
  </div>
  </div>
  
</div>
@endsection

