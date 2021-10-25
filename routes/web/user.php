<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController as MainController;

Route::prefix('/utility/user')->name('user.')->group(function(){

    Route::get('',[MainController::class,'index'])->name('index');

    Route::get('create',[MainController::class,'create'])->name('create');

    Route::post('store',[MainController::class,'store'])->name('store');

    Route::get('edit/{id}',[MainController::class,'edit'])->name('edit');

    Route::put('update/{id}',[MainController::class,'update'])->name('update');

    Route::delete('delete/{id}',[MainController::class,'delete'])->name('delete');

});
