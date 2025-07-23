<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\apiDataProjectController;

Route::middleware('otentikasi')->group(function (){
    Route::group(['prefix'=>'v1'], function(){
        Route::get('/', [apiDataProjectController::class,'index']);
  
});

});