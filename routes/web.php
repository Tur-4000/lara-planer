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
//    return view('welcome');
//});

Auth::routes();

Route::resource('', 'Planer\ToDoListController')
    ->names('planer');

Route::get('/home', 'HomeController@index')->name('home');

//Админка
$groupData = [
    'namespace' => 'Planer\Admin',
    'prefix' => 'admin/planer',
];

Route::group($groupData, function () {
    $methods = ['index', 'edit', 'store', 'update', 'create'];

    Route::resource('colors', 'WebColorController')
        ->only($methods)
        ->names('planer.admin.colors');

    Route::resource('categories', 'CategoryController')
        ->only($methods)
        ->names('planer.admin.categories');
});
