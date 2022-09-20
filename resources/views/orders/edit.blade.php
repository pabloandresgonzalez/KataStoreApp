@extends('layouts.app', ['page' => __('User Profile'), 'pageSlug' => 'profile'])

@section('content')
    <div class="row">
        <div class="col-md-8">            
            <div class="card">                
                <div class="card-header">
                    <h5 class="title">{{ __('New Order') }}</h5>
                </div> 
                <div class="card">
                  <div class="card-body">


                    <form method="post" action="{{ route('products') }}" enctype="multipart/form-data" autocomplete="off">

                    <div class="card-body">  
                        @csrf
                        @method('put')

                        @include('alerts.success')

                        

                 
                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <label>{{ __('Name') }}</label>
                            <input type="text" name="name" value="{{ $pedido->name }}" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" >
                            @include('alerts.feedback', ['field' => 'name'])
                        </div>
                        <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                            <label>{{ __('Description') }}</label>
                            <input type="text" name="description" value="{{ $pedido->description }}" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="{{ __('Description') }}" >
                            @include('alerts.feedback', ['field' => 'description'])
                        </div> 
                        <div class="form-group{{ $errors->has('precio') ? ' has-danger' : '' }}">
                            <label>{{ __('Precio') }}</label>
                            <input type="number" name="precio" class="form-control{{ $errors->has('precio') ? ' is-invalid' : '' }}" placeholder="{{ __('Precio') }}" name="precio" value="{{ $pedido->precio }}">
                            @include('alerts.feedback', ['field' => 'precio'])
                        </div>                                               
                        <div class="form-group{{ $errors->has('cantidad') ? ' has-danger' : '' }}">
                            <label>{{ __('Cantidad') }}</label>
                            <input type="number" name="cantidad" class="form-control{{ $errors->has('cantidad') ? ' is-invalid' : '' }}" placeholder="" name="cantidad" value="">
                            @include('alerts.feedback', ['field' => 'cantidad'])
                        </div>


                        </div>         
                                                                     


                    </div>
                    <div class="card-footer">
                        <button href="" type="submit" class="btn btn-fill btn-primary">{{ __('Save') }}</button>
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
                                <img src="{{ route('pedido.avatar',['filename'=>$pedido->image]) }}"/> 
                                <br><br>
                                <h5 class="title">{{ $pedido->name}}</h5>
                            </a>
                            <p class="description">
                                {{ $pedido->description}}
                            </p>
                        </div>
                    </p>
                    <div class="card-description" style="text-align: center;">
                        Codigo producto #  {{ $pedido->id}}
                    </div>
                </div>
                <div class="card-footer">
                    <div style="text-align: right;width;margin-right: 30px">
              <a href="" class="btn btn-primary btn-link">to get back</a>
            </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
