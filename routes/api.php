<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;


Route::get('/item', [ItemController::class, 'index']);

Route::prefix('/item')->group(function(){
    Route::post('/store',[ItemController::class, 'store']);
    Route::put('/{id}' , [ItemController::class, 'update']);
    Route::delete('/{id}', [ItemController::class, 'destroy'] );
});