<?php

Auth::routes();
Route::get('/','PostsController@index');
Route::get('/home', 'PostsController@index');
Route::get('/{slug}', 'PostsController@show')->where('slug', '[A-Za-z0-9-_]+');
Route::group(['middleware' => ['auth']], function() {
    Route::post('comment/add','CommentsController@store');
    Route::get('admin/index', 'PostsController@indexDashboard');
    Route::resource('admin/posts/', 'Auth\PostsController');

    Route::get('admin/posts/allposts', 'Auth\PostsController@index');
    // show new post form
    Route::get('admin/posts/new-post', 'Auth\PostsController@create');
    // save new post
    Route::post('admin/posts/createpost', 'Auth\PostsController@store');
    // edit form
    Route::get('admin/posts/editpost/{slug}', 'Auth\PostsController@edit');
    // update data
    Route::post('admin/posts/updatepost', 'Auth\PostsController@update');
    // delete post
    Route::get('admin/posts/deletepost/{id}', 'Auth\PostsController@destroy');

});
