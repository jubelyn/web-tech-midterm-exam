<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\InventoryControllerAPI;
use App\Http\Controllers\API\InventoryPostController;
use Illuminate\Validation\Rules\In;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login',[InventoryControllerAPI::class,'login']);


Route::get('get-all-posts',[InventoryPostController::class,'getAllPosts']);
Route::get('get-post',[InventoryPostController::class,'getPost']);
Route::get('search-post',[InventoryPostController::class,'searchPost']);
