<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthenticateWithOkta;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/login', 'authController@login');
Route::post('/logout', 'authController@logout');
Route::post('/register','RegisterController@register');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/stock', 'StockController@store');
    
});
Route::get('/stock', 'StockController@show');

    //Route::get('/users', 'StockController@index');
   // Route::post('/stock', 'StockController@store');
   // Route::get('/stock/{id}', 'StockController@show');
 

    
    


