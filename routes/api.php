<?php

use App\Http\Controllers\Api\Auth\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/
//auth routes
Route::controller(AuthController::class )->group(function (){
    Route::post('/register','register')->name('register');
    Route::get('/login' , 'login')->name('login');
    Route::post('/logout' , 'logout')->name('logout');
    Route::get('/me' , 'me')->name('me');
});
