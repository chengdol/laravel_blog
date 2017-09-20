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

Route::get('/', 'PostController@getPostIndex')->name('post.index');
Route::get('/post/{post_id}', 'PostController@getSinglePost')->name('post.single');

Route::get('/about', function () {
    return view("frontend.others.about");
})->name('about');

Route::get('/contact', 'ContactMessageController@getContactIndex')->name('contact');




Route::group(['prefix' => '/admin'], function () {

    Route::get('/', 'AdminController@getIndex')->name('admin.index');
    // same name for get and post
    Route::get('/post/create', 'PostController@getCreatePost')->name('admin.post.create');
    Route::post('/post/create', 'PostController@postCreatePost')->name('admin.post.create');

});
