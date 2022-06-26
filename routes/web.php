<?php

use App\Http\Controllers\Admin\NewsController;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(NewsController::class)->prefix('admin')->middleware('auth')->group(function(){
  Route::get('news/create', 'add');
  Route::post('news/create', 'create');
});

use App\Http\Controllers\Admin\ProfileController;

Route::controller(ProfileController::class)->prefix('admin')->middleware('auth')->group(function() {
  Route::get('profile/create', 'add');
  Route::post('profile/create', 'create');
  Route::get('profile/edit', 'edit');
  Route::post('profile/edit', 'update');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();
