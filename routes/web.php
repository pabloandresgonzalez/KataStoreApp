<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
use App\Http\Controllers\DiscountController;
use App\Models\Product;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
Route::get('/', function () {
    return view('welcome');    
});
*/

// Tiemda
Route::get('/', 'App\Http\Controllers\Controller@indexstore')->name('indexstore');
Route::get('/avatar/{filename?}', [App\Http\Controllers\Controller::class, 'getImage'])->name('/.avatar');
//Route::get('/welcome/avatar/{filename?}', 'App\Http\Controllers\Controller@getImage')->name('product.avatar');

Route::get('/discount', function(){
    return 'some discount code here';//return view('register');
})->name('discountCode')->middleware('signed');

Route::get('/generate-signature', [DiscountController::class, 'discount']);
//Route::get('/generate-signature', 'App\Http\Controllers\DiscountController@discount');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');


Route::group(['middleware' => 'auth'], function () {
		Route::get('icons', ['as' => 'pages.icons', 'uses' => 'App\Http\Controllers\PageController@icons']);
		Route::get('maps', ['as' => 'pages.maps', 'uses' => 'App\Http\Controllers\PageController@maps']);
		Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'App\Http\Controllers\PageController@notifications']);
		Route::get('rtl', ['as' => 'pages.rtl', 'uses' => 'App\Http\Controllers\PageController@rtl']);
		Route::get('tables', ['as' => 'pages.tables', 'uses' => 'App\Http\Controllers\PageController@tables']);
		Route::get('typography', ['as' => 'pages.typography', 'uses' => 'App\Http\Controllers\PageController@typography']);
		Route::get('upgrade', ['as' => 'pages.upgrade', 'uses' => 'App\Http\Controllers\PageController@upgrade']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('/users', 'App\Http\Controllers\UserController@indexusers')->name('homeusers');
	Route::get('/user/{user}/edit', [App\Http\Controllers\UserController::class, 'edit']);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);

	Route::get('/categories', 'App\Http\Controllers\CategoryController@index')->name('categories');	
	Route::get('/categories/{categorie}/edit', 'App\Http\Controllers\CategoryController@edit')->name('editcategory');
	Route::put('/categories', [App\Http\Controllers\CategoryController::class, 'update']);
	Route::get('/categories/create', [App\Http\Controllers\CategoryController::class, 'create'])->name('createcategory');
	Route::post('/categories', [App\Http\Controllers\CategoryController::class, 'store'])->name('storecategory');

	Route::get('/products', 'App\Http\Controllers\ProductController@index')->name('products');
	Route::get('/products/{product}/edit', 'App\Http\Controllers\ProductController@edit')->name('editproduct');	
	Route::get('/products/{product}/detail', 'App\Http\Controllers\ProductController@detail')->name('detailproduct');
	Route::put('/products', [App\Http\Controllers\ProductController::class, 'update']);
	Route::get('/products/create', [App\Http\Controllers\ProductController::class, 'create'])->name('createproduct'); 
	Route::post('/products', 'App\Http\Controllers\ProductController@store')->name('storeproduct'); 
	Route::get('/products/avatar/{filename?}', [App\Http\Controllers\ProductController::class, 'getImage'])->name('product.avatar');

	Route::get('/services', 'App\Http\Controllers\ServiceController@index')->name('services');
	Route::get('/services/{service}/edit', 'App\Http\Controllers\ServiceController@edit')->name('editservice');
	Route::put('/services', [App\Http\Controllers\ServiceController::class, 'update']);
	Route::get('/services/create', [App\Http\Controllers\ServiceController::class, 'create'])->name('createservice'); 
	Route::post('/services', 'App\Http\Controllers\ServiceController@store')->name('storeservice'); 
	Route::get('/services/avatar/{filename?}', [App\Http\Controllers\ServiceController::class, 'getImage'])->name('service.avatar');

	Route::get('/pedidos', 'App\Http\Controllers\PedidoController@index')->name('pedidos');
	Route::get('/pedidos/{pedido?}/edit', 'App\Http\Controllers\PedidoController@edit')->name('editpedido');
	Route::put('/pedidos{pedido?}', [App\Http\Controllers\PedidoController::class, 'update']);
	Route::get('/pedidos/{product}/create', [App\Http\Controllers\PedidoController::class, 'create'])->name('createpedido'); 
	Route::post('/pedidos', 'App\Http\Controllers\PedidoController@store')->name('storepedido'); 
	Route::get('/pedidos/avatar/{filename?}', [App\Http\Controllers\PedidoController::class, 'getImage'])->name('pedido.avatar');
	Route::get('/pedidos/misorders', [App\Http\Controllers\PedidoController::class, 'indexMisOrders'])->name('misorders');

	//Route::get('/paypal/pay', 'PaymentController@payWithPayPal');
	Route::get('/paypal/pay', [App\Http\Controllers\PaymentController::class, 'payWithPayPal']);
	//Route::get('/paypal/status', 'PaymentController@payPalStatus');
	Route::get('/paypal/status', [App\Http\Controllers\PaymentController::class, 'payPalStatus']);


	
});


