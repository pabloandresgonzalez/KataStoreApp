@extends('layouts.app', ['page' => __('Tables'), 'pageSlug' => 'tables'])

@section('content')
<div class="row">
  <div class="col-md-12">
  	<div class="col-md-12">
    <div class="card  card-plain">
      <div class="card-header">
        <h4 class="card-title"> Users</h4>
        <p class="category"> Users registered in the system</p>        
      </div>

      <div class="card-body">
        <div class="table-responsive">
          <table class="table tablesorter " id="">
            <thead class=" text-primary">
              <tr>
                <th class="text-center">Name</th>
                <th class="text-center">email</th>
                <th class="text-center">edit user</th>
              </tr>
            </thead>
            <tbody>
            	@foreach ($users as $user)
              <tr>                
                <td class="text-center">
                  {{ $user->name }}
                </td>
                <td class="text-center">
                  {{ $user->email }}
                </td>
                <td class="text-center">
                	<form action="" method="POST">
                		@csrf
                      @method('')
	                  	<div class="card-footer">	                    	
	                    	<a href="{{ url('/user/'.$user->id.'/edit') }}" class="btn btn-fill btn-primary">{{ __('Edit') }}</a>
	                	  </div>
                	</form>
                </td>
               </tr>
               @endforeach 
            </tbody>
          </table>          
        </div>
        
        
          <ul class="pagination justify-content-center">
            <li class="page-item" >{!! $users->links() !!}</li>
          </ul>
       
     
        
      </div>
    </div>
  </div>
  </div>
  
</div>
@endsection
