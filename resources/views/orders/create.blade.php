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


                    <form method="post" action="{{ route('storepedido') }}" enctype="multipart/form-data" autocomplete="off">
                        @csrf

                            
                    <div class="card-body">
                            

                            @include('alerts.success') 
        <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
            <div class="card card-user">
                <div class="card-body">
                    <p class="card-text">
                        <div class="author">
                                <a href="#">
                                    <img src="{{ asset('img/imgnequiqr.PNG') }}"/> 
                                    <br><br>
                                    <h5 class="title">Pagar con Nequi</h5>
                                </a>
                                <p class="description">
                                    3008905764
                                </p>
                            </div>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
            <div class="card card-user">
                <div class="card-body">
                    <p class="card-text">
                        <div class="author">
                                <a href="#">
                                    <img src="{{ asset('img/imgnequiqr.PNG') }}"/> 
                                    <br><br>
                                    <h5 class="title">Pagar con Nequi</h5>
                                </a>
                                <p class="description">
                                    3008905764
                                </p>
                            </div>
                        </p>
                    </div>
                </div>
            </div>
        </div> 
    </div>
    <hr>                       

                        Product  <label>&nbsp; {{ $product->id }}</label><br>
                        Name <label>&nbsp; {{ $product->name }}</label><br>
                        Description <label>&nbsp; {{ $product->description }}</label><br>
                        Precio <label>&nbsp; {{ $product->precio }}</label><br>
                            
                        <div class="form-group{{ $errors->has('id') ? ' has-danger' : '' }}">
                            <input hidden="true" name="id" value="{{ $product->id }}" class="form-control{{ $errors->has('categoryProd_id') ? ' is-invalid' : '' }}" placeholder="{{ __('') }}" readonly=»readonly»>
                            @include('alerts.feedback', ['field' => 'id'])
                        </div>
                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <input hidden="true" name="name" value="{{ $product->name }}" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" >
                            @include('alerts.feedback', ['field' => 'name'])
                        </div>
                            <input type="hidden" name="categoryProd_id" value="{{ $product->categoryProd_id }}">

                        <div class="form-group{{ $errors->has('estado') ? ' has-danger' : '' }}">
                            <input hidden="true" name="estado" value="Iniciado" class="form-control{{ $errors->has('estado   ') ? ' is-invalid' : '' }}" placeholder="{{ __('') }}" >
                            @include('alerts.feedback', ['field' => 'estado'])
                        </div>
                        <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                            <input type="hidden" name="description" value="{{ $product->description }}" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="{{ __('Description') }}" >
                            @include('alerts.feedback', ['field' => 'description'])
                        </div> 
                        <div class="form-group{{ $errors->has('precio') ? ' has-danger' : '' }}">
                            <input type="hidden" name="precio" class="form-control{{ $errors->has('precio') ? ' is-invalid' : '' }}" placeholder="{{ __('Precio') }}" name="precio" value="{{ $product->precio }}">
                            @include('alerts.feedback', ['field' => 'precio'])
                        </div>                                               
                        <div class="form-group{{ $errors->has('cantidad') ? ' has-danger' : '' }}">
                            <label>{{ __('Quantity') }}</label><br>
                            <input type="number" name="cantidad" class="form-control{{ $errors->has('cantidad') ? ' is-invalid' : '' }}" placeholder="{{ __('cantidad') }}" name="cantidad" value="">
                            @include('alerts.feedback', ['field' => 'cantidad'])
                        </div>
                        <div class="form-group{{ $errors->has('address') ? ' has-danger' : '' }}">
                            <label>{{ __('Address') }}</label><br>
                            <input type="text" name="address" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" placeholder="{{ __('address') }}" name="address" value="">
                            @include('alerts.feedback', ['field' => 'address'])
                        </div>
                        <div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
                            <label>{{ __('Phone') }}</label><br>
                            <input type="number" name="phone" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" placeholder="{{ __('phone') }}" name="phone" value="">
                            @include('alerts.feedback', ['field' => 'phone'])
                        </div>
                        <div class="form-group{{ $errors->has('observation') ? ' has-danger' : '' }}">
                            <label>{{ __('Observation') }}</label><br>
                            <input type="text" name="observation" class="form-control{{ $errors->has('observation') ? ' is-invalid' : '' }}" placeholder="{{ __('observation') }}" name="observation" value="">
                            @include('alerts.feedback', ['field' => 'observacion'])
                        </div>                        
                        <div class="card-footer">
                        <label>{{ __('Add proof of payment') }}</label>

                        <input class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" placeholder="{{ __('image') }}" type="file" name="image"  autocomplete="image" value="{{ old('image') }}">
                        @include('alerts.feedback', ['field' => 'image'])
                            <button href="storepedido" type="submit" class="btn btn-fill btn-primary">{{ __('add payment') }}</button>

                        </div>
                        <hr>
    
</div>

    <br><p>Pagar con PayPal</p>
    <!-- Set up a container element for the button -->
    <div id="paypal-button-container"></div>       

    <!-- Include the PayPal JavaScript SDK -->
    <script src="https://www.paypal.com/sdk/js?client-id={{ env('PAYPAL_CLIENT_ID') }}&currency=USD"></script>

    <script>

        paypal.Buttons({

            // Set up the transaction
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '50.00'
                        }
                    }]
                });
            },

            // Finalize the transaction
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(orderData) {
                    // Successful capture! For demo purposes:
                    console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                    var transaction = orderData.purchase_units[0].payments.captures[0];
                    alert('Transaction '+ transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');

                    // Replace the above to show a success message within this page, e.g.
                    // const element = document.getElementById('paypal-button-container');
                    // element.innerHTML = '';
                    // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                    // Or go to another URL:  actions.redirect('thank_you.html');
                });
            }


        }).render('#paypal-button-container');

    </script>
            </form>
        </div>
    </div>              
        </div>
            <p>Si lo deseas puedes comunicarte con nosotros</p>
          <a type="button" href="https://wa.me/573008905764?text=%20Hola! %20estoy%20interezado%20en%20este%20producto%20:%20{{  $product->name }}%20id:%20{{  $product->id }}" class="btn btn-info" target="_blank" >Message</a>
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
                                <img src="{{ route('pedido.avatar',['filename'=>$product->image1]) }}"/> 
                                <br><br>
                                <h5 class="title">{{ $product->name}}</h5>
                            </a>
                            <p class="description">
                                {{ $product->description}}
                            </p>
                        </div>
                    </p>
                    <div class="card-description" style="text-align: center;">
                        Codigo producto #  {{ $product->id}}
                    </div>
                </div>
                <div class="card-footer">
                    <div style="text-align: right;width;margin-right: 30px">
              <a href="" class="btn btn-primary btn-link">to get back</a>
            </div>
                </div>
            </div>
        </div>
            <br>
        </div>



    </div>
@endsection
