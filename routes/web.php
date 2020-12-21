<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LogoutController;

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
Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', [LoginController::class,'index']);
Route::post('/login',[LoginController::class,'varify']);
Route::get('/logout',[LogoutController::class,'index']);


Route::group(['middleware'=>['sess']],function(){

    Route::get('/employee',[EmployeeController::class,'index'])->middleware('sess')->name('home.index');
    Route::get('/productlist',[EmployeeController::class,'productlist'])->name('home.productlist');
//    Route::get('/details/{id}',[EmployeeController::class,'show']);
    Route::get('/create',[EmployeeController::class,'create'])->name('home.create');
    Route::post('/create',[EmployeeController::class,'store']);
    Route::get('edit/{id}', [EmployeeController::class,'edit'])->name('home.edit');
    Route::post('edit/{id}', [EmployeeController::class,'update']);
    //Route:Resource('/product',ProductController::class);
    
    });
