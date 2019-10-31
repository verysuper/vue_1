<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('vue')->group(function () {
    Route::get('_101', function () {
        return view('vue_test.v01');
    });
    Route::get('_102', function () {
        return view('vue_test.v02');
    });
});
