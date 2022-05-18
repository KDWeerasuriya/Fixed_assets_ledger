<?php

use App\Http\Controllers\AuthController;
use App\Http\Middleware\Authenticate;
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
Route::get("/",[fixedAssetLedge::class,"viewdashboard"]);

Route::get('/', function () {
    return view('welcome');
});





    Route::group(['middleware' =>Authenticate::class ], function () {
    Route::get('/dashboard', [AuthController::class,"dashboard"]);
    Route::get('/logout', [AuthController::class,"logout"]);
});

Route::get('/login', [AuthController::class,"loginView"])->name("login");
Route::get('/register', [AuthController::class,"registerView"]);
Route::post('/do-login', [AuthController::class,"doLogin"]);
Route::post('/do-register', [AuthController::class,"doRegister"]);

Route::post("/conformord",[AuthController::class,"conformord"]);
Route::get("/delete/{id}",[AuthController::class,"delete"]);
Route::get("/edit/{id}",[AuthController::class,"edit"]);

