@extends('layouts.app', ['page' => __('Tables'), 'pageSlug' => 'tables'])

@section('content')
<div class="row">
  <div class="col-md-12">
  	<div class="col-md-12">
    <div class="card  card-plain">
      <div class="card-header">
        <h4 class="card-title"> Categories</h4>
        <p class="category"> Validate and manage the categories of your products</p>        
      </div>

      <div>
        <a href="{{ route('createcategory')  }}" class="btn btn-primary btn-link">New Category</a>
      </div>

      <div class="card-body">
        <div class="table-responsive">
          <table class="table tablesorter " id="">
            <thead class=" text-primary">
              <tr>
                <th class="text-center">id</th>
                <th class="text-center">name</th>
                <th class="text-center">description</th>
                <th class="text-center">created</th>
                <th class="text-center">updated</th>
                <th class="text-center">edit categorie</th>
              </tr>
            </thead>
            <tbody>
            	@foreach ($categories as $categorie)
              <tr>                
                <td class="text-center">
                  {{ $categorie->id }}
                </td>
                <td class="text-center">
                  {{ $categorie->name}}
                </td>
                <td class="text-center">
                  {{ $categorie->description }}
                </td>
                <td class="text-center">
                  {{ $categorie->created_at }}
                </td>
                <td class="text-center">
                  {{ $categorie->updated_at }}
                </td>
                <td class="text-center">
                	<form action="" method="POST">
                		@csrf
                      @method('')
	                  	<div class="card-footer">	                    	
	                    	<a href="{{ url('/categories/'.$categorie->id.'/edit') }}" class="btn btn-fill btn-primary">{{ __('Edit') }}</a>
	                	  </div>
                	</form>
                </td>
               </tr>
               @endforeach 
            </tbody>
          </table>          
        </div>
        
        
          <ul class="pagination justify-content-center">
            <li class="page-item" >{!! $categories->links() !!}</li>
          </ul>
       
     
        
      </div>
    </div>
  </div>
  </div>
  
</div>
@endsection
