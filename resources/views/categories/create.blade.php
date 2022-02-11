@extends('layouts.app', ['page' => __('User Profile'), 'pageSlug' => 'profile'])

@section('content')
    <div class="row">
        <div class="col-md-10">            
            <div class="card">                
                <div class="card-header">
                    <h5 class="title">{{ __('New Category') }}</h5>
                </div> 
                <div class="card">
                  <div class="card-body">


                    <form method="post" action="{{ route('storecategory') }}" autocomplete="off">
                        @csrf
                            
                    <div class="card-body">

                            

                            @include('alerts.success')

                        
                          <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label>{{ __('Name') }}</label>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" >
                                @include('alerts.feedback', ['field' => 'name'])
                            </div>
                          <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                <label>{{ __('description') }}</label>
                                <input type="text" name="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="{{ __('description') }}" name="description" value="{{ old('description') }}">
                                @include('alerts.feedback', ['field' => 'description'])
                            </div>


                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-fill btn-primary">{{ __('Save') }}</button>
                    </div>
                </form>
                  </div>
                </div>               
                
            </div>

            <div style="text-align: right;width;margin-right: 30px">
              <a href="{{ route('categories')  }}" class="btn btn-primary btn-link">to get back</a>
            </div>
            <br>
        </div>


    </div>
@endsection
