@extends('layouts.app', ['page' => __('Tables'), 'pageSlug' => 'tables'])

@section('content')
<div class="row">
  <div class="col-md-12">
  	<div class="col-md-12">
    <div class="card  card-plain">
      <div class="card-header">
        <h4 class="card-title"> products</h4>
        <p class="category"> Validate and manage your products</p>        
      </div>

      <div>
        <a href="{{ route('createproduct')  }}" class="btn btn-primary btn-link">New product</a>
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
                <th class="text-center">image</th>
                <th class="text-center">created</th>
                <th class="text-center">updated</th>
                <th class="text-center">edit categorie</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($products as $product)
              <tr>                
                <td class="text-center">
                  {{ $product->id }}
                </td>
                <td class="text-center">
                  {{ $product->name}}
                </td>
                <td class="text-center">
                  {{ $product->categoryProd_id }}
                </td>
                <td class="text-center">
                  {{ $product->description }}
                </td>
                <td class="text-center">
                  {{ $product->precio }}
                </td>
                <td class="text-center">
                  {{ $product->cantidad }}
                </td>
                <td class="text-center">                  
                  <img src="{{ route('product.avatar',['filename'=>$product->image1]) }}"/>                     
                </td>
                <td class="text-center">
                  {{ $product->created_at }}
                </td>
                <td class="text-center">
                  {{ $product->updated_at }}
                </td>
                <td class="text-center">
                  <form action="" method="POST">
                    @csrf
                      @method('')
                      <div class="card-footer">                       
                        <a href="{{ url('/products/'.$product->id.'/edit') }}" class="btn btn-fill btn-primary">{{ __('Edit') }}</a>
                      </div>
                  </form>
                </td>
               </tr>
               @endforeach            	 
            </tbody>
          </table>          
        </div>
        
        
          <ul class="pagination justify-content-center">
            <li class="page-item" >{!! $products->links() !!}</li>
          </ul>
       
     
        
      </div>
    </div>
  </div>
  </div>
  
</div>
@endsection
