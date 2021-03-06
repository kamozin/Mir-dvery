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
Route::get('/catalog/{url}', ['as' => 'main', 'uses' => 'CatalogController@catalog']);
Route::get('/products/{url}', ['as' => 'main', 'uses' => 'CatalogController@product']);
Route::get('/e-catalog', ['as' => 'main', 'uses' => 'MainController@ecatalog']);
Route::get('/page/{name}', ['as' => 'main', 'uses' => 'MainController@page']);
Route::get('/actions/{name}', ['as' => 'main', 'uses' => 'ActionsController@index']);
Route::get('/news/{name}', ['as' => 'main', 'uses' => 'NewsController@index']);






//
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
//// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

//    Route::auth();

    Route::get('/admin/main', 'HomeController@index');
//    Новости
    Route::get('/admin/news', 'Admin\NewsController@index');
    Route::get('/admin/news/store', 'Admin\NewsController@store');
    Route::get('/admin/news/edit/{id}', 'Admin\NewsController@edit');
    Route::get('/admin/news/photo/{id}', 'Admin\NewsController@editPhoto');
    Route::post('/admin/news/create', 'Admin\NewsController@create');
    Route::post('/admin/news/update', 'Admin\NewsController@update');
    Route::post('/admin/news/update/photo', 'Admin\NewsController@updatePhoto');
    Route::get('/admin/news/destroy/{id}', 'Admin\NewsController@destroy');

    //    Акции
    Route::get('/admin/actions', 'Admin\ActionsController@index');
    Route::get('/admin/actions/store', 'Admin\ActionsController@store');
    Route::get('/admin/actions/edit/{id}', 'Admin\ActionsController@edit');
    Route::get('/admin/actions/photo/{id}', 'Admin\ActionsController@editPhoto');
    Route::post('/admin/actions/create', 'Admin\ActionsController@create');
    Route::post('/admin/actions/update', 'Admin\ActionsController@update');
    Route::post('/admin/actions/update/photo', 'Admin\ActionsController@updatePhoto');
    Route::get('/admin/actions/destroy/{id}', 'ActionsController@destroy');

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
    Route::post('/admin/products/create', 'Admin\ProductsController@productCreate');
    Route::post('/admin/products/update', 'Admin\ProductsController@update');
    Route::get('/admin/products/destroy/{id}', 'Admin\ProductsController@destroy');
    Route::get('/admin/products/edit/photos/{id}', 'Admin\ProductsController@editPhotos');
    Route::post('/admin/products/update/photos', 'Admin\ProductsController@updatePhotos');

    //    справочники
    Route::get('/admin/directory', 'Admin\DirectoryController@index');
    Route::get('/admin/directory/store', 'Admin\DirectoryController@store');
    Route::get('/admin/directory/edit/{id}', 'Admin\DirectoryController@edit');
    Route::post('/admin/directory/create', 'Admin\DirectoryController@create');
    Route::post('/admin/directory/update', 'Admin\DirectoryController@update');
    Route::get('/admin/directory/destroy/{id}', 'Admin\DirectoryController@destroy');
//Характеристики к справочникам

    Route::get('/admin/directory/characteristics/{id}/store', 'Admin\DirectoryController@StoreHar');
    Route::get('/admin/directory/characteristics/{id}', 'Admin\DirectoryController@ShowHar');
    Route::post('/admin/directory/characteristics/create', 'Admin\DirectoryController@CreateHar');
    Route::get('/admin/characteristics/edit/{id}', 'Admin\DirectoryController@EditHar');
    Route::get('/admin/characteristics/update', 'Admin\DirectoryController@UpdateHar');
    Route::get('/admin/characteristics/destroy/{id}', 'Admin\DirectoryController@DestroyHar');

  //    Страницы
    Route::get('/admin/page', 'Admin\PageController@index');
    Route::get('/admin/page/store', 'Admin\PageController@store');
    Route::get('/admin/page/edit/{id}', 'Admin\PageController@edit');
    Route::post('/admin/page/create', 'Admin\PageController@create');
    Route::post('/admin/page/update', 'Admin\PageController@update');
    Route::post('/admin/page/destroy/{id}', 'Admin\PageController@destroy');




