@extends('layouts.app', ['page' => __('User Profile'), 'pageSlug' => 'profile'])

@section('content')
    <div class="row">
        <div class="col-md-8">            
            <div class="card">                
                <div class="card-header">
                    <h5 class="title">{{ __('New Product') }}</h5>
                </div> 
                <div class="card">
                  <div class="card-body">


                    <form method="post" action="{{ route('products') }}" enctype="multipart/form-data" autocomplete="off">

                    <div class="card-body">  
                        @csrf
                        @method('put')

                        @include('alerts.success')

                        <input type="hidden" value="{{$product->id}}" name="id">

                          <div class="form-group">
                              <label>{{ __('Category') }}</label>
                              <select id="id" style="background-color: #1e1e2f;" name="categoryProd_id" class="form-control" >
                                @foreach($categories as $category)
                                  <option value="{{ $category->id }}"> {{ $category->id }} - {{ $category->name}}</option>
                                @endforeach
                              </select>                              
                          </div>
                 
                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <label>{{ __('Name') }}</label>
                            <input type="text" name="name" value="{{ $product->name }}" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" >
                            @include('alerts.feedback', ['field' => 'name'])
                        </div>
                        <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                            <label>{{ __('Description') }}</label>
                            <input type="text" name="description" value="{{ $product->description }}" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="{{ __('Description') }}" >
                            @include('alerts.feedback', ['field' => 'description'])
                        </div> 
                        <div class="form-group{{ $errors->has('precio') ? ' has-danger' : '' }}">
                            <label>{{ __('Precio') }}</label>
                            <input type="number" name="precio" class="form-control{{ $errors->has('precio') ? ' is-invalid' : '' }}" placeholder="{{ __('Precio') }}" name="precio" value="{{ $product->precio }}">
                            @include('alerts.feedback', ['field' => 'precio'])
                        </div>                                               
                        <div class="form-group{{ $errors->has('cantidad') ? ' has-danger' : '' }}">
                            <label>{{ __('Cantidad') }}</label>
                            <input type="number" name="cantidad" class="form-control{{ $errors->has('cantidad') ? ' is-invalid' : '' }}" placeholder="{{ __('cantidad') }}" name="cantidad" value="{{ $product->cantidad }}">
                            @include('alerts.feedback', ['field' => 'cantidad'])
                        </div>
                        <div class="form-group{{ $errors->has('inventario') ? ' has-danger' : '' }}">
                            <label>{{ __('Inventory') }}</label>
                            <input type="number" name="inventario" class="form-control{{ $errors->has('inventario') ? ' is-invalid' : '' }}" placeholder="{{ __('inventario') }}" name="inventario" value="{{ $product->inventario }}">
                            @include('alerts.feedback', ['field' => 'inventario'])
                        </div>

                        <div class="form-group{{ $errors->has('image') ? ' has-danger' : '' }}">
                            <label>{{ __('Image') }}</label>
                            </div>
                            <input class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" placeholder="{{ __('image') }}"  type="file" name="image"  autocomplete="image" value="{{ $product->image }}">
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

        <div class="col-md-4">
            <div class="card card-user">
                <div class="card-body">
                    <p class="card-text">
                        <div class="author">
                            <div class="block block-one"></div>
                            <div class="block block-two"></div>
                            <div class="block block-three"></div>
                            <div class="block block-four"></div>
                            <a href="#">
                                <img src="{{ route('product.avatar',['filename'=>$product->image]) }}"/> 
                                <br><br>
                                <h5 class="title">{{ $product->name}}</h5>
                            </a>
                            <p class="description">
                                {{ $product->description}}
                            </p>
                        </div>
                    </p>
                    <div class="card-description" style="text-align: center;">
                        ID  {{ $product->id}}
                    </div>
                </div>
                <div class="card-footer">
                    <div style="text-align: right;width;margin-right: 30px">
              <a href="{{ route('products')  }}" class="btn btn-primary btn-link">to get back</a>
            </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
