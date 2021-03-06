<?php

// dependency binding
App::bind(
    'SpinMedia\\ExampleBlog\\Interfaces\\ArticleInterface',
    'SpinMedia\\ExampleBlog\\Articles\\Article'
);

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get(
    'articles/{id}',
    [
        'as' => 'articles.show',
        'uses' => 'SpinMedia\\ExampleBlog\\Articles\\ArticleController@show'

    ]
);

Route::get(
    'articles',
    [
        'as' => 'articles.index',
        'uses' => 'SpinMedia\\ExampleBlog\\Articles\\ArticleController@index'
    ]
);

Route::post(
    'comments',
    [
        'as' => 'comments.store',
        'uses' => 'SpinMedia\\ExampleBlog\\Comments\\CommentController@store'
    ]
);
