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
// single post detail
Route::get('/post/{post_id}', 'PostController@getSinglePost')->name('post.single');

Route::get('/about', function () {
    return view("frontend.others.about");
})->name('about');

Route::get('/contact', 'ContactMessageController@getContactIndex')->name('contact');
// send contact message
Route::post('/contact/sendemail', 'ContactMessageController@postContactMessage')->name('contact.send');




Route::group(['prefix' => '/admin'], function () {

    Route::get('/', 'AdminController@getIndex')->name('admin.index');
    // same name for get and post. the url should be the same!!
    Route::get('/post/create', 'PostController@getCreatePost')->name('admin.post.create');
    Route::post('/post/create', 'PostController@postCreatePost')->name('admin.post.create');
    // posts list
    Route::get('/posts', 'PostController@getAdminPostIndex')->name('admin.post.index');
    // single post
    Route::get('/post/{post_id}&{side}', 'PostController@getSinglePost')->name('admin.post.single');

    // edit post
    // edit then update
    Route::get('/post/edit/{post_id}', 'PostController@getEditPost')->name('admin.post.edit');
    Route::post('/post/edit', 'PostController@postEditPost')->name('admin.post.update');

    // delete post
    Route::get('/post/delete/{post_id}', 'PostController@getPostDelete')->name('admin.post.delete');

    // category
    Route::get('/category', 'CategoryController@getCategoryIndex')->name('admin.category.index');
    // see categories.js AJAX request
    Route::post('/category/create', 'CategoryController@postCategoryCreate')->name('admin.category.create');
    Route::post('/category/update', 'CategoryController@postCategoryUpdate')->name('admin.category.update');
    Route::get('/category/delete/{category_id}', 'CategoryController@getCategoryDelete')
        ->name('admin.category.delete');
    // contact
});
