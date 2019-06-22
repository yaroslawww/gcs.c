<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Tool API Routes
|--------------------------------------------------------------------------
|
| Here is where you may register API routes for your tool. These routes
| are loaded by the ServiceProvider of your tool. They are protected
| by your tool's "Authorize" middleware by default. Now, go build!
|
*/

Route::group([
    'namespace' => 'Yaroslawww\NovaCmsPages\Http\Controllers',
    'as' => 'nova_cms_pages.'
], function () {
    Route::get('/templates', 'TemplateController@index')->name('templates.index');
});
