@extends('layouts.app', ['page' => __('Tables'), 'pageSlug' => 'tables'])

@section('content')
<div class="row">
  <div class="col-md-12">
  	<div class="col-md-12">
    <div class="card  card-plain">
      <div class="card-header">
        <h4 class="card-title"> Service</h4>
        <p class="category"> Validate and manage your services</p>        
      </div>

      <div>
        <a href="{{ route('createservice')  }}" class="btn btn-primary btn-link">New service</a>
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
            	@foreach ($services as $service)
              <tr>                
                <td class="text-center">
                  {{ $service->id }}
                </td>
                <td class="text-center">
                  {{ $service->name}}
                </td>
                <td class="text-center">
                  {{ $service->categoryProd_id }}
                </td>
                <td class="text-center">
                  {{ $service->description }}
                </td>
                <td class="text-center">
                  {{ $service->precio }}
                </td>
                <td class="text-center">
                  {{ $service->cantidad }}
                </td>
                <td class="text-center">
                  {{ $service->inventario }}
                </td>
                <td class="text-center">                  
                  <img src="{{ route('service.avatar',['filename'=>$service->image]) }}"/>                     
                </td>
                <td class="text-center">
                  {{ $service->created_at }}
                </td>
                <td class="text-center">
                  {{ $service->updated_at }}
                </td>
                <td class="text-center">
                  <form action="" method="POST">
                    @csrf
                      @method('')
                      <div class="card-footer">                       
                        <a href="{{ url('/services/'.$service->id.'/edit') }}" class="btn btn-fill btn-primary">{{ __('Edit') }}</a>
                      </div>
                  </form>
                </td>
               </tr>
               @endforeach 
            </tbody>
          </table>          
        </div>
        
        
          <ul class="pagination justify-content-center">
            <li class="page-item" >{!! $services->links() !!}</li>
          </ul>
       
     
        
      </div>
    </div>
  </div>
  </div>
  
</div>
@endsection
