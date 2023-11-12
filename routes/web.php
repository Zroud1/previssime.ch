<?php

use App\Http\Controllers\RecupererController;
use App\Models\Recuperer;
use Illuminate\Support\Facades\Route;


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
 //   return Recuperer::all();
     return view('landing');
});


route::view('recuperer','recuperer')->name("recuperer");

Route::get('/login', function () {
    return view('login');
})->name('login');
Route::post('/login',  [RecupererController::class,'login'])->name('loginuser');

Route::get('/loading', function () {
    return view('loading');
})->name("loading");

Route::post("/signaturepad",[RecupererController::class,'store'])->name('signaturepad');
Route::get("/invoice/{id}",[RecupererController::class,'show']);
