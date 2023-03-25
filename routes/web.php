<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BasicController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SingleController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\ResourceController;
use App\Models\Customer;
use Illuminate\Http\Request;
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

// Route::get('/about', function () {
//     return view('layouts.about');
// });
// Route::get("/home", function () {

//     return view('layouts.home');
// });

// Route::get("/demo/{name}/{id?}", function ($name, $id = null) {
//     $data = compact('name', 'id');
//     return view("demo")->with($data);
// });
// Route::get("/first/{name?}", function ($name = null) {
//     $data1 = "  <h2>sazzad</h2>";
//     $data2 = compact('name', 'data1');
//     return view("first")->with($data2);
// });

//3 types of controller route is shown here
Route::get('/', [BasicController::class, 'index']);
Route::get('/course', SingleController::class);
Route::resource('/photo', ResourceController::class);

//form route
Route::get('/', function () {
    return view('index');
});

Route::get('/register', [FormController::class, 'index']);
Route::post('/register', [FormController::class, 'register']);

//controller data  insert using form
Route::get('/customer/create', [CustomerController::class, 'create'])->name('customer.create');
Route::get('/customer/delete/{id}', [CustomerController::class, 'delete'])->name('customer.delete');
Route::get('/customer/forceDelete/{id}', [CustomerController::class, 'forceDelete'])->name('customer.forceDelete');
Route::get('/customer/restore/{id}', [CustomerController::class, 'restore'])->name('customer.restore');
Route::get('/customer/edit/{id}', [CustomerController::class, 'edit'])->name('customer.edit');
Route::post('/customer/update/{id}', [CustomerController::class, 'update'])->name('customer.update');
Route::get('/customer', [CustomerController::class, 'view']);
Route::get('/customer/trash', [CustomerController::class, 'trash'])->name('customer.trash');;
Route::post('/customer', [CustomerController::class, 'store']);


//for session
Route::get('get-all-session', function () {
    $session = session()->all();
    p($session); //helper function a call jasse oi format a print korbe
});

//if we want to set a session
Route::get('set-session', function (Request $request) {
    $request = session()->put('name', 'sazzad');
    $request = session()->put('id', '1234');
    return redirect('get-all-session');
});

//destroying all session
Route::get('destroy-session', function () {
    session()->forget(['name', 'id']);
    return redirect('get-all-session');
});
