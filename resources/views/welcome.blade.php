@extends('layouts.app')

@section('content')
    <div class="header py-7 py-lg-8">
        <div class="container">
            <div class="header-body text-center mb-7">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-6">
                        <h1 class="text-white">{{ __('Kata Store') }}</h1>
                        <h3 class="text-lead text-light">
                            {{ __('Hello, welcome to the best page you can buy online!') }}
                        </h3>

                    </div>
                  </div>
                </div>

        <div class="container-fluid">
          <div class="header-body">
            <div class="row-fluid ">
              <div class="row">
                @foreach($products as $product)
                    <!-- Card stats -->
                    <div class="col-xl-4 col-lg-6">
                      
                      <div class="card" style="width: 15rem;">
                        <img class="card-img-top" src="{{ route('/.avatar',['filename'=>$product->image]) }}" alt="Card image cap">
                        <div class="card-body" style="text-align: center;">
                          <h3 class="card-title"></h3> 
                          <span> <p class="card-text">
                          {{ $product->name }}<br></p></span><br>
                          <h4 class="card-title">{{ $product->description }}</h4>
                          <h5 class="card-title">$ {{ $product->precio }}</h5>               
                          <a data-toggle="modal"  data-target="#modal-form1{{ $loop->iteration }}" href="#modal-form1{{ $loop->iteration }}" class="badge badge-warning"><i class="ni ni-cart" ></i>&nbsp; Comprar</a>
                        </div>
                        </div>
                        <hr>   
                    </div>
                    @endforeach


                     @foreach($products as $product)                    
                    <div class="modal show" tabindex="-1" role="dialog" id="modal-form1{{ $loop->iteration }}">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Resumen</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                              <i class="tim-icons icon-simple-remove"></i>
                            </button>
                          </div>
                          <div class="modal-body">

                            <ul>
                            
                              <table>                                  
                                <tbody>
                                  <td class="storetr">Precio:</td>
                                    <td>{{ $product->precio }}</td>
                                  </tr>
                                    <td class="storetr">Total:</td>
                                    <td>{{ $product->precio }}</td>
                                  <tr>                                                                   
                                </tbody>
                              </table>
                              <p>Detalle: {{ $product->description }}</p>
                              <a type="button" href="{{ url('/pedidos/'.$product->id.'/create') }}" class="btn btn-primary">Pay</a>
                              
                                  <hr>
                                  <p>Puedes comprar con Nequi al # 3008905764</p>
                                  <tr>                                    
                                    <td><img  src="{{ asset('img/imgnequiqr.PNG') }}"></td>
                                  </tr>
                                  <hr>
                                    <p>Con Daviplata al # 3008905764</p>
                                    <td><img  src="{{ asset('img/imgnequiqr.PNG') }}"></td>
                                  <tr> 
                                    <hr>
                                    <p>Si lo deseas puedes comunicarte con nosotros</p>
                                  <a type="button" href="https://wa.me/573008905764?text=%20Hola! %20estoy%20interezado%20en%20este%20producto%20:%20{{  $product->name }}%20id:%20{{  $product->id }}" class="btn btn-info" target="_blank" >Message</a>
                          </div>
                          <div class="modal-footer">
                            <a href="">Términos y condiciones.</a>
                           <br>

                          </div>
                        </div>
                      </div>
                    </div>

                @endforeach                 

              </div>
            </div>
          </div>
        </div>
             
        </div>
    </div>
@endsection


