@extends('layouts.app', ['page' => __('User Profile'), 'pageSlug' => 'profile'])

@section('content')
    <div class="row">
        <div class="col-md-8">            


        <div class="col-md-12">
            <div class="card card-user">
                <div class="card-body">
                    <div  style="text-align: center;">
                        <h4>{{ $product->name}}</h4>
                    </div>                     
                    <p class="card-text">
                        <div class="author">
                            <div class="block block-one"></div>
                            <div class="block block-two"></div>
                            <div class="block block-three"></div>
                            <div class="block block-four"></div>

                            <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                              <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="3" aria-label="Slide 4"></button>
                              </div>
                              <div class="carousel-inner">
                                <div class="carousel-item active" data-bs-interval="10000">
                                  <img src="{{ route('product.avatar',['filename'=>$product->image1]) }}" rounded mx-auto d-block  alt="...">                                  
                                </div>
                                <div class="carousel-item" data-bs-interval="2000">
                                  <img src="{{ route('product.avatar',['filename'=>$product->image2]) }}" rounded mx-auto d-block  alt="...">
                                  
                                </div>
                                <div class="carousel-item">
                                  <img src="{{ route('product.avatar',['filename'=>$product->image3]) }}" rounded mx-auto d-block  alt="...">
                                  
                                </div>
                                <div class="carousel-item">
                                  <img src="{{ route('product.avatar',['filename'=>$product->image4]) }}" rounded mx-auto d-block  alt="...">                                  
                                </div>
                              </div>
                            </div>                            
                            <br>                            
                                <strong>$ {{ $product->precio}}</strong><br><br>
                        <a type="button" href="{{ url('/pedidos/'.$product->id.'/create') }}" class="btn btn-primary">buy product</a>                       
                        </div>
                    </p>

                </div>
                <div class="card-footer">
                    <div style="text-align: right;width;margin-right: 10px">
              <a href="{{ route('home') }}" class="btn btn-primary btn-link">Dashboard</a>
            </div>
                </div>
            </div>
        </div>

    </div>
            <div class="col-md-3">
            <div class="card card-user">
                <div class="card-body">
                    <p class="card-text">
                        <div class="author">
                                @foreach ($category as $categorys)
                                Categoria: <strong>{{ $categorys->name}}</strong> <br><br>
                                @endforeach                                
                                Vendidos: <strong>{{ $product->cantidad}}</strong><br><br>
                                Disponibles <strong>{{ $product->cantidad}}</strong><br><br>
                                Codigo del producto: <strong>{{ $product->id}}</strong><br><br>
                            
                        </div>
                    </p>
                    <div  style="text-align: center;">
                        Descripcion: <strong>{{ $product->description}}</strong><br><br>
                        <a type="button" href="{{ url('/pedidos/'.$product->id.'/create') }}" class="btn btn-primary">buy product</a>  
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
@endsection
