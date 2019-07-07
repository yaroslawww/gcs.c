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

Auth::routes(['verify' => true]);

Route::get('/', function () {
    return view('home');
});

Route::middleware(['verified', 'auth'])
    ->prefix('/app')
    ->group(function () {
        Route::get('/', function () {
            dd('This is app');
        });
    });

// Should Be last
NovaPages::routes();
