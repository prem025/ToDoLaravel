<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\AuthController;


Route::post('login', [AuthController::class,'login']);
Route::post('register', [AuthController::class,'register']);

Route::group(['middleware'=>'api'],function(){
    Route::post('logout', [AuthController::class,'logout']);
    Route::post('refresh', [AuthController::class,'refresh']);
    Route::post('me', [AuthController::class,'me']);
});

Route::get('/item', [ItemController::class, 'index']);

Route::prefix('/item')->group(function(){
    Route::post('/store',[ItemController::class, 'store']);
    Route::put('/{id}' , [ItemController::class, 'update']);
    Route::delete('/{id}', [ItemController::class, 'destroy'] );
});
