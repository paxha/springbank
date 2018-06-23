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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/categories', 'MainCategoryController@index')->name('categories')->middleware('auth');
Route::get('/sub-categories', 'SubCategoryController@index')->name('sub-categories')->middleware('auth');

Route::get('/new-file', 'FileInfoController@index')->name('new-file')->middleware('auth');
Route::post('/new-file', 'FileInfoController@store')->name('new-file')->middleware('auth');

Route::get('/edit-file/{file_id}', 'FileInfoController@edit_file')->name('edit-file')->middleware('auth');
Route::post('/edit-file/', 'FileInfoController@edit')->name('edit-file')->middleware('auth');

Route::get('/delete-file/{file_id}', 'FileInfoController@destroy')->name('delete-file')->middleware('auth');


// categories
Route::get('/new-category', 'MainCategoryController@new_category')->name('new-category')->middleware('auth');
Route::post('/new-category', 'MainCategoryController@store')->name('new-category')->middleware('auth');

Route::get('/delete-category/{category_id}', 'MainCategoryController@destroy')->name('delete-category')->middleware('auth');

Route::get('/edit-category/{category_id}', 'MainCategoryController@edit_category')->name('edit-category')->middleware('auth');
Route::post('/edit-category', 'MainCategoryController@edit')->name('edit-category')->middleware('auth');

//sub categories
Route::get('/new-sub-category', 'SubCategoryController@new_sub_category')->name('new-sub-category')->middleware('auth');
Route::post('/new-sub-category', 'SubCategoryController@store')->name('new-sub-category')->middleware('auth');

Route::get('/delete-sub-category/{sub_category_id}', 'SubCategoryController@destroy')->name('delete-sub-category')->middleware('auth');

Route::get('/edit-sub-category/{sub_category_id}', 'SubCategoryController@edit_sub_category')->name('edit-sub-category')->middleware('auth');
Route::post('/edit-sub-category', 'SubCategoryController@edit')->name('edit-sub-category')->middleware('auth');

// apis
Route::get('/get-categories', 'MainCategoryController@show')->name('get-categories')->middleware('auth');
Route::get('/get-sub-categories/{category_id}', 'SubCategoryController@show')->name('get-sub-categories')->middleware('auth');
Route::get('/get-all-files', 'HomeController@allFiles')->name('get-all-files')->middleware('auth');
Route::get('/get-filtered-files/{sub_category_id}', 'HomeController@filterBySubCategory')->name('get-filtered-files')->middleware('auth');
Route::get('/get-filtered-files-by-category/{category_id}', 'HomeController@filterByCategory')->name('get-filtered-files-by-category')->middleware('auth');

