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

                        

                        
                        <div class="form-group{{ $errors->has('id') ? ' has-danger' : '' }}">
                            <label>{{ __('Id') }}</label><br>
                            <label>&nbsp;&nbsp;&nbsp; {{ $pedido->id }}</label>
                            <input type="hidden" name="id_product" value="{{ $pedido->id }}" class="form-control{{ $errors->has('id') ? ' is-invalid' : '' }}" placeholder="{{ __('') }}" >
                            @include('alerts.feedback', ['field' => 'id'])
                        </div>
                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <label>{{ __('Name') }}</label>
                            <br>
                            <label>&nbsp;&nbsp;&nbsp; {{ $pedido->name }}</label>
                            <input type="hidden" name="name" value="{{ $pedido->name }}" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" >
                            @include('alerts.feedback', ['field' => 'name'])
                        </div>
                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <label>{{ __('Category') }}</label><br>
                            <label>&nbsp;&nbsp;&nbsp; {{ $pedido->categoryProd_id }}</label>
                            <input type="hidden" name="categoryProd_id" value="{{ $pedido->categoryProd_id }}" class="form-control{{ $errors->has('categoryProd_id') ? ' is-invalid' : '' }}" placeholder="{{ __('') }}" >
                            @include('alerts.feedback', ['field' => 'categoryProd_id'])
                        </div>
                        <div class="form-group{{ $errors->has('estado') ? ' has-danger' : '' }}">
                            <input type="hidden" name="estado" value="Iniciado" class="form-control{{ $errors->has('estado   ') ? ' is-invalid' : '' }}" placeholder="{{ __('') }}" >
                            @include('alerts.feedback', ['field' => 'estado'])
                        </div>
                        <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                            <label>{{ __('Description') }}</label><br>
                            <label>&nbsp;&nbsp;&nbsp; {{ $pedido->description }}</label>
                            <input type="hidden" name="description" value="{{ $pedido->description }}" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="{{ __('Description') }}" >
                            @include('alerts.feedback', ['field' => 'description'])
                        </div> 
                        <div class="form-group{{ $errors->has('precio') ? ' has-danger' : '' }}">
                            <label>{{ __('Precio') }}</label><br>
                            <label>&nbsp;&nbsp;&nbsp; {{ $pedido->precio }}</label>
                            <input type="hidden" name="precio" class="form-control{{ $errors->has('precio') ? ' is-invalid' : '' }}" placeholder="{{ __('Precio') }}" name="precio" value="{{ $pedido->precio }}">
                            @include('alerts.feedback', ['field' => 'precio'])
                        </div>                                               
                        <div class="form-group{{ $errors->has('cantidad') ? ' has-danger' : '' }}">
                            <label>{{ __('Cantidad') }}</label><br>
                            <input type="number" name="cantidad" class="form-control{{ $errors->has('cantidad') ? ' is-invalid' : '' }}" placeholder="{{ __('cantidad') }}" name="cantidad" value="">
                            @include('alerts.feedback', ['field' => 'cantidad'])
                        </div>


                        <div class="form-group{{ $errors->has('image') ? ' has-danger' : '' }}">

                            </div>

                            @include('alerts.feedback', ['field' => 'image'])
                        </div>          
                                                                     


                    </div>
                    <div class="card-footer">
                        <button href="storepedido" type="submit" class="btn btn-fill btn-primary">{{ __('Save') }}</button>
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
            <br>
        </div>


    </div>
@endsection
