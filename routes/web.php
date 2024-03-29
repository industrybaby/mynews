<?php

use App\Http\Controllers\Admin\NewsController;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(NewsController::class)->prefix('admin')->middleware('auth')->name('news.')->group(function(){
  Route::get('news/create', 'add')->name('add');
  Route::post('news/create', 'create')->name('create');
  Route::get('news', 'index')->name('index');
  Route::get('news/edit', 'edit')->name('edit');
  Route::post('news/edit', 'update')->name('update');
  Route::get('news/delete', 'delete')->name('delete');
});

use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\NewsController as ControllersNewsController;

Route::controller(ProfileController::class)->prefix('admin')->middleware('auth')->name('profile.')->group(function() {
  Route::get('profile/create', 'add')->name('add');
  Route::post('profile/create', 'create')->name('create');
  Route::get('profile/edit', 'edit')->name('edit');
  Route::post('profile/edit', 'update')->name('update');
  Route::get('profile', 'index')->name('index');
  Route::get('profile/delete', 'delete')->name('delete');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/', [App\Http\Controllers\NewsController::class, 'index']);


