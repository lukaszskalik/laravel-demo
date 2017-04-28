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

//Route::get('/', function () {
 //   return view('welcome');
//});

Route::get('/', 'SitesController@index');

Route::get('admin/sites/add', [
    'uses' => 'SitesController@add',
    'as' => 'sites.add'
]);
Auth::routes();

Route::get('/admin', 'AdminController@index');
Route::post('/admin/sites/save', [
    'uses' => 'SitesController@save',
    'as' => 'sites.save'
]);
Route::get('storage/{filename}', function ($filename)
{
    return Response::download(storage_path('app/upload/images/' . $filename));
});