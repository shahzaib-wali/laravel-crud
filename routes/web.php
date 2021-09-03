<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;
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

//Route::get('/', function () {
//    return view('welcome');
//});


Route::get('show',[StudentsController::class,'show'])->name('show');
Route::get('create',[StudentsController::class,'create'])->name('create');
Route::post('store',[StudentsController::class,'store'])->name('store');
Route::get('edit/{id}',[StudentsController::class,'edit'])->name('edit');
Route::post('update/{id}',[StudentsController::class,'update'])->name('update');
Route::get('delete/{id}',[StudentsController::class,'destroy'])->name('delete');