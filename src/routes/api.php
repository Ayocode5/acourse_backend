<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

Route::group(["prefix" => "course"], function() {
    Route::get('/', function() {
        //
        return \App\Models\Course::all();
    })->middleware('auth:sanctum');
});


Route::group(["prefix" => "v1/auth"], function() {
    require __DIR__ . '/auth.php';

    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
        // if(Auth::user()->hasRole('user')) {
        //     return 'Normal User > 2';
        // }
        // //return Auth::user();
        return $request->user();
    });
});
