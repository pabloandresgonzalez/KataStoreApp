@extends('layouts.app', ['page' => __('User Profile'), 'pageSlug' => 'profile'])

@section('content')
    <div class="row">
        <div class="col-md-10">            
            <div class="card">                
                <div class="card-header">
                    <h5 class="title">{{ __('New Product') }}</h5>
                </div> 
                <div class="card">
                  <div class="card-body">


                    <form method="post" action="{{ route('storeproduct') }}" enctype="multipart/form-data" autocomplete="off">
                        @csrf

                            
                    <div class="card-body">
                            

                            @include('alerts.success')

                        

                          <div class="form-group">
                              <label>{{ __('Category') }}</label>
                              <select id="id" style="background-color: #1e1e2f;" name="categoryProd_id" class="form-control" >
                                @foreach($categories as $user)
                                  <option value="{{ $user->id }}"> {{ $user->id }} - {{ $user->name}}</option>
                                @endforeach
                              </select>                              
                          </div>
                 
                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <label>{{ __('Name') }}</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" >
                            @include('alerts.feedback', ['field' => 'name'])
                        </div>
                        <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                            <label>{{ __('Description') }}</label>
                            <input type="text" name="description" value="{{ old('description') }}" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="{{ __('Description') }}" >
                            @include('alerts.feedback', ['field' => 'description'])
                        </div> 
                        <div class="form-group{{ $errors->has('precio') ? ' has-danger' : '' }}">
                            <label>{{ __('Precio') }}</label>
                            <input type="number" name="precio" class="form-control{{ $errors->has('precio') ? ' is-invalid' : '' }}" placeholder="{{ __('Precio') }}" name="precio" value="{{ old('precio') }}">
                            @include('alerts.feedback', ['field' => 'precio'])
                        </div>                                               
                        <div class="form-group{{ $errors->has('cantidad') ? ' has-danger' : '' }}">
                            <label>{{ __('Cantidad') }}</label>
                            <input type="number" name="cantidad" class="form-control{{ $errors->has('cantidad') ? ' is-invalid' : '' }}" placeholder="{{ __('cantidad') }}" name="cantidad" value="{{ old('cantidad') }}">
                            @include('alerts.feedback', ['field' => 'cantidad'])
                        </div>
                        <div class="form-group{{ $errors->has('inventario') ? ' has-danger' : '' }}">
                            <label>{{ __('Inventory') }}</label>
                            <input type="number" name="inventario" class="form-control{{ $errors->has('inventario') ? ' is-invalid' : '' }}" placeholder="{{ __('inventario') }}" name="inventario" value="{{ old('inventario') }}">
                            @include('alerts.feedback', ['field' => 'inventario'])
                        </div>

                        <div class="form-group{{ $errors->has('image') ? ' has-danger' : '' }}">
                            <label>{{ __('Image') }}</label>
                            </div>
                            <input class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" placeholder="{{ __('image') }}"  type="file" name="image"  autocomplete="image" value="{{ old('image') }}">
                            @include('alerts.feedback', ['field' => 'image'])
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
              <a href="{{ route('products')  }}" class="btn btn-primary btn-link">to get back</a>
            </div>
            <br>
        </div>


    </div>
@endsection
