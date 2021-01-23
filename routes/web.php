<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\BuildingsController;
use App\Http\Controllers\EntriesOutController;
use App\Http\Controllers\BlockListController;


Route::resource('/users', UserController::class);
Route::resource('/buildings', BuildingsController::class);
//Route::resource('/blocklist', 'BlockListController');
Route::resource('/entries-out', EntriesOutController::class);


Route::get('/', function () {
    return view('welcome');
});
