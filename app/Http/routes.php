<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Роуты открытая часть
Route::get('/', ['as' => 'main', 'uses' => 'MainController@index']);
Route::get('/catalog', ['as' => 'main', 'uses' => 'CatalogController@index']);
Route::get('/e-catalog', ['as' => 'main', 'uses' => 'MainController@ecatalog']);
Route::get('/{name}', ['as' => 'main', 'uses' => 'MainController@page']);
Route::get('/actions/{name}', ['as' => 'main', 'uses' => 'ActionsController@index']);
Route::get('/news/{name}', ['as' => 'main', 'uses' => 'NewsController@index']);




//
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
//// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

//Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/admin/main', 'HomeController@index');
//    Новости
    Route::get('/admin/news', 'Admin\NewsAdminController@index');
    Route::get('/admin/news/store', 'Admin\NewsAdminController@store');
    Route::get('/admin/news/edit/{id}', 'Admin\NewsAdminController@edit');
    Route::post('/admin/news/create', 'Admin\NewsAdminController@create');
    Route::post('/admin/news/update', 'Admin\NewsAdminController@update');
    Route::post('/admin/news/destroy/{id}', 'Admin\NewsAdminController@destroy');

    //    Акции
    Route::get('/admin/actions', 'Admin\ActionsController@index');
    Route::get('/admin/actions/store', 'Admin\ActionsController@store');
    Route::get('/admin/actions/edit/{id}', 'Admin\ActionsController@edit');
    Route::post('/admin/actions/create', 'Admin\ActionsController@create');
    Route::post('/admin/actions/update', 'Admin\ActionsController@update');
    Route::post('/admin/actions/destroy/{id}', 'ActionsController@destroy');

//    Категории
    Route::get('/admin/category', 'Admin\CategoryController@index');
    Route::get('/admin/category/store', 'Admin\CategoryController@store');
    Route::get('/admin/category/edit/{id}', 'Admin\CategoryController@edit');
    Route::get('/admin/category/photo/{id}', 'Admin\CategoryController@editPhoto');
    Route::post('/admin/category/create', 'Admin\CategoryController@create');
    Route::post('/admin/category/update', 'Admin\CategoryController@update');
    Route::post('/admin/category/update/photo', 'Admin\CategoryController@updatePhoto');
    Route::get('/admin/category/destroy/{id}', 'Admin\CategoryController@destroy');

    //    товары
    Route::get('/admin/products', 'Admin\ProductsController@index');
    Route::get('/admin/products/store', 'Admin\ProductsController@store');
    Route::get('/admin/products/edit/{id}', 'Admin\ProductsController@edit');
    Route::post('/admin/products/create', 'Admin\ProductsController@create');
    Route::post('/admin/products/update', 'Admin\ProductsController@update');
    Route::post('/admin/products/destroy/{id}', 'Admin\ProductsController@destroy');

    //    справочники
    Route::get('/admin/directory', 'Admin\DirectoryController@index');
    Route::get('/admin/directory/store', 'Admin\DirectoryController@store');
    Route::get('/admin/directory/edit/{id}', 'Admin\DirectoryController@edit');
    Route::post('/admin/directory/create', 'Admin\DirectoryController@create');
    Route::post('/admin/directory/update', 'Admin\DirectoryController@update');
    Route::post('/admin/directory/destroy/{id}', 'Admin\DirectoryController@destroy');


//});

