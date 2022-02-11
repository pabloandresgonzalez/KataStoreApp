@extends('layouts.app', ['page' => __('Tables'), 'pageSlug' => 'tables'])

@section('content')
<div class="row">
  <div class="col-md-12">
  	<div class="col-md-12">
    <div class="card  card-plain">
      <div class="card-header">
        <h4 class="card-title"> Orders</h4>
        <p class="category"> Validate and manage your orders</p>        
      </div>

      <div>
        <a href="{{ route('createproduct')  }}" class="btn btn-primary btn-link">New order</a>
      </div>

      <div class="card-body">
        <div class="table-responsive">
          <table class="table tablesorter " id="">
            <thead class=" text-primary">
              <tr>
                <th class="text-center">id</th>
                <th class="text-center">name</th>
                <th class="text-center">category</th>
                <th class="text-center">description</th>
                <th class="text-center">precio</th>
                <th class="text-center">cantidad</th>
                <th class="text-center">inventario</th>
                <th class="text-center">image</th>
                <th class="text-center">created</th>
                <th class="text-center">updated</th>
                <th class="text-center">edit categorie</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($orders as $order)
              <tr>                
                <td class="text-center">
                  {{ $order>id }}
                </td>
                <td class="text-center">
                  {{ $order>name}}
                </td>
                <td class="text-center">
                  {{ $order>categoryProd_id }}
                </td>
                <td class="text-center">
                  {{ $order>description }}
                </td>
                <td class="text-center">
                  {{ $order>precio }}
                </td>
                <td class="text-center">
                  {{ $order>cantidad }}
                </td>
                <td class="text-center">
                  {{ $order>inventario }}
                </td>
                <td class="text-center">                  
                  <img src="{{ route('orderavatar',['filename'=>$order>image]) }}"/>                     
                </td>
                <td class="text-center">
                  {{ $order>created_at }}
                </td>
                <td class="text-center">
                  {{ $order>updated_at }}
                </td>
                <td class="text-center">
                  <form action="" method="POST">
                    @csrf
                      @method('')
                      <div class="card-footer">                       
                        <a href="{{ url('/order/'.$order>id.'/edit') }}" class="btn btn-fill btn-primary">{{ __('Edit') }}</a>
                      </div>
                  </form>
                </td>
               </tr>
               @endforeach            	 
            </tbody>
          </table>          
        </div>
        
        
          <ul class="pagination justify-content-center">
            <li class="page-item" >{!! $orders->links() !!}</li>
          </ul>
       
     
        
      </div>
    </div>
  </div>
  </div>
  
</div>
@endsection

