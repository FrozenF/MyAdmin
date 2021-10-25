<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Builder\ControllerCrud;

Route::prefix('builder/crud')->group(function(){

    Route::get('',[ControllerCrud::class,'index']);

    Route::post('store',[ControllerCrud::class,'store'])->name('crud.store');
});
