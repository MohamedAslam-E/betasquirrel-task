<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\studentController;
use App\Models\student;

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

Route::get('/', function () {
    return view('homePage');
});
Route::get('/wel', function () {
    return view('welcome');
});

Route::resource('/student',studentController::class);

Route::get('/user/{id}',[studentController::class,'show']);