@extends('layouts.app', ['page' => __('User Profile'), 'pageSlug' => 'profile'])

@section('content')
    <div class="row">
        <div class="col-md-8">            
            <div class="card">                
                <div class="card-header">
                    <h5 class="title">{{ __('Cambiar el estado del pedido') }}</h5>
                </div> 
                <div class="card">
                  <div class="card-body">


                    <form method="post" action="{{ route('pedidos') }}" enctype="multipart/form-data" autocomplete="off">

                    <div class="card-body">  
                        @csrf
                        @method('put')

                        @include('alerts.success')

                        <input type="hidden" value="{{$pedido->id}}" name="id">

                        Pedido  <label>&nbsp; {{ $pedido->id }}</label><br>
                        Product  <label>&nbsp; {{ $pedido->id_product }}</label><br>
                        Name <label>&nbsp; {{ $pedido->name }}</label><br>                        
                        Precio x Und. <label>&nbsp; {{ $pedido->precio }}</label><br>
                        Cantidad <label>&nbsp; {{ $pedido->cantidad }}</label><br>
                        Valor total del pedido <label>&nbsp; {{ $pedido->cantidad * $pedido->precio }}</label><br>
                        Descripción <label>&nbsp; {{ $pedido->description }}</label><br>  
                        <hr>                      

                        <div class="form-group{{ $errors->has('estado') ? ' has-danger' : '' }}">   
                            <label>{{ __('Estado') }}</label>                         
                            @if($pedido->estado === 'Cerrado')                                
                                <label>&nbsp; <strong> {{ $pedido->estado }} </strong>, ya no es &nbsp;posible hacer mas cambios al estado del pedido&nbsp; &nbsp; </label>
                                  @else
                            <select style="background-color:#1e1e2f" id="estado" name="estado" class="form-control" required>
                              <option value="{{ $pedido->estado }}">Estado actual {{ $pedido->estado }}</option>
                              <option value="Activo"  >Activo</option>
                              <option value="Cerrado"  >Cerrado</option>
                            </select>
                            @include('alerts.feedback', ['field' => 'description'])
                            @endif
                        </div>
                        <?php
                        if ($pedido->estado === 'Cerrado') {
                          echo '';
                        } else {
                          echo '<button type="submit" class="btn btn-fill btn-primary">Save</button>';
                        }
                        ?>                        
                    </div>
                 </div>
                    
                </form>
                <div class="card-footer">
                    <div style="text-align: right;width;margin-right: 30px">
                        <a href="{{ route('pedidos') }}" class="btn btn-primary btn-link">to get back</a>
                    </div>
                </div>
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
                                <img style="width:100px; height:200px" src="{{ route('pedido.avatar',['filename'=>$pedido->image]) }}"/> 
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
                        <a href="{{ route('pedidos') }}" class="btn btn-primary btn-link">to get back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
