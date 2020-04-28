<?php

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

Auth::routes();

// Frontend
Route::get('/', 'FrontendController@indexFrontend')->name('indexFrontend');
Route::get('/add-to-cart/{id}/{type}', 'FrontendController@addToCart')->name('addToCart');
Route::get('/cart', 'FrontendController@cart')->name('cart');
Route::delete('/remove-from-cart', 'FrontendController@removeFromCart')->name('removeFromCart');
Route::post('/save-cart', 'FrontendController@saveCart')->name('saveCart');



// Backend
Route::get('/index', 'BackendController@index')->name('index');
Route::get('/indexUser', 'BackendController@indexUser')->name('indexUser');
Route::get('/pending-orders', 'BackendController@pendingOrders')->name('pendingOrders');
Route::get('/pending-orders-user', 'BackendController@pendingOrdersUser')->name('pendingOrdersUser');
Route::get('/confirmed-orders', 'BackendController@confirmedOrders')->name('confirmedOrders');
Route::get('/confirmed-orders-user', 'BackendController@confirmedOrdersUser')->name('confirmedOrdersUser');
Route::get('/details-order/{id}', 'BackendController@detailsOrder')->name('detailsOrder');
Route::get('/components', 'BackendController@components')->name('components');
Route::get('/sauces', 'BackendController@sauces')->name('sauces');
Route::get('/pizzas', 'BackendController@pizzas')->name('pizzas');
Route::put('/confirm', 'BackendController@confirm')->name('confirm');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
