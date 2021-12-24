<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Manager;

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
Route::get('/admin', function () {
    return view('admin');
});

Route::get('/seller', function () {
    return view('seller');
});

Route::get('/client', function () {
    return view('client');
});


Route::get('/', function () {
    return view('welcome');
});
Route::get('/cos', function () {
    return view('cos');
});
Route::get('/favorite', function () {
    return view('favorite');
});
Route::get('/login', function () {
    return view('login');
});

Route::get('/products/{id}', function ($id) {
    return view('products',['id' => $id, 'name'=> 'undercat']);
});

Route::get('/products', function () {
    return view('products');
});

Route::get('/products/t', function () {
    return view('products');
});

Route::get('/products/r', function () {
    return view('products');
});




Route::get('/prodpage/{id}', function ($id) {
    return view('prodpage',['id' => $id]);
});
// Route::post('admin/addundcat',[Manager::class , 'addundcategory']);
Route::post('admin/addcat',[Manager::class , 'addcategory']);
Route::post('admin/addundcat',[Manager::class , 'addundcategory']);
Route::post('admin/addsg',[Manager::class , 'addspecg']);
Route::post('admin/adds',[Manager::class , 'addspec']);
Route::post('admin/addnewproduct',[Manager::class , 'addNewProduct']);
Route::post('/addcos',[Manager::class , 'addCos']);
Route::post('admin/delcat',[Manager::class , 'delcategory']);
Route::post('admin/updateuser',[Manager::class , 'updateUser']);
Route::post('/comadaproc',[Manager::class , 'comandaProcesing']);
Route::post('/sendorder',[Manager::class , 'sendOrder']);
Route::post('/finishorder',[Manager::class , 'finishOrder']);

Route::get('auth/google',[LoginController::class,'redirectToGoogle']);
Route::get('auth/google/callback',[LoginController::class,'handleGoogleCallback']);


Route::get('auth/facebook',[LoginController::class,'redirectToFacebook']);
Route::get('auth/facebook/callback',[LoginController::class,'handleFacebookCallback']);
Route::get('/logout', '\App\Http\Controllers\LoginController@logout');


