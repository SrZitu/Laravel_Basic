<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BasicController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SingleController;
use App\Http\Controllers\ResourceController;
use App\Models\Customer;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/about', function () {
    return view('layouts.about');
});
Route::get("/home", function () {

    return view('layouts.home');
});

Route::get("/demo/{name}/{id?}", function ($name, $id = null) {
    $data = compact('name', 'id');
    return view("demo")->with($data);
});
Route::get("/first/{name?}", function ($name = null) {
    $data1 = "  <h2>sazzad</h2>";
    $data2 = compact('name', 'data1');
    return view("first")->with($data2);
});
//3 types of controller route is shown here
Route::get('/', [BasicController::class, 'index']);
Route::get('/course', SingleController::class);
Route::resource('/photo', ResourceController::class);

//form route
Route::get('/register', [FormController::class, 'index']);
Route::post('/register', [FormController::class, 'register']);

//model
// Route::get('/customer',function(){
// $customer=Customer::all();
// echo "<pre>";
// print_r($customer);
// });

//controller data  insert using form
Route::get('/customer', [CustomerController::class, 'index']);
Route::post('/customer',[CustomerController::class,'store']);
