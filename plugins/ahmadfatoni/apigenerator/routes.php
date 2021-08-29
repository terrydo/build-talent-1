<?php

Route::post('fatoni/generate/api', array('as' => 'fatoni.generate.api', 'uses' => 'AhmadFatoni\ApiGenerator\Controllers\ApiGeneratorController@generateApi'));
Route::post('fatoni/update/api/{id}', array('as' => 'fatoni.update.api', 'uses' => 'AhmadFatoni\ApiGenerator\Controllers\ApiGeneratorController@updateApi'));
Route::get('fatoni/delete/api/{id}', array('as' => 'fatoni.delete.api', 'uses' => 'AhmadFatoni\ApiGenerator\Controllers\ApiGeneratorController@deleteApi'));
Route::resource('api/v1/posts', 'AhmadFatoni\ApiGenerator\Controllers\API\blogController', ['except' => ['destroy', 'create', 'edit']]);
Route::get('api/v1/posts/get-post-by-type/{type}', 'AhmadFatoni\ApiGenerator\Controllers\API\blogController@getPostByType');
//Route::get('api/v1/blogs/{id}/delete', ['as' => 'api/v1/blogs.delete', 'uses' => 'AhmadFatoni\ApiGenerator\Controllers\API\blogController@destroy']);
Route::post('api/v1/posts/{id}/form-download', '\RainLab\Blog\Controllers\API\FormDownloader@sendDocToUser');
//Route::resource('api/v1/posts', 'AhmadFatoni\ApiGenerator\Controllers\API\Posts APIController', ['except' => ['destroy', 'create', 'edit']]);
Route::resource('api/v1/users', 'AhmadFatoni\ApiGenerator\Controllers\API\UsersAPIController', ['except' => ['index', 'create', 'edit', 'destroy']]);
Route::group(['middleware' => '\Tymon\JWTAuth\Middleware\GetUserFromToken'], function () {
    // Route::get('api/v1/posts/{id}/delete', ['as' => 'api/v1/posts.delete', 'uses' => 'AhmadFatoni\ApiGenerator\Controllers\API\Posts APIController@destroy']);
    // Route::resource('api/v1/users', 'AhmadFatoni\ApiGenerator\Controllers\API\UsersAPIController', ['except' => ['destroy', 'create', 'edit']]);
    // Route::get('api/v1/users/{id}/delete', ['as' => 'api/v1/users.delete', 'uses' => 'AhmadFatoni\ApiGenerator\Controllers\API\UsersAPIController@destroy']);
    Route::get('api/v1/me', ['uses' => 'AhmadFatoni\ApiGenerator\Controllers\API\UsersAPIController@me']);
    Route::post('api/v1/me/update-profile', ['uses' => 'AhmadFatoni\ApiGenerator\Controllers\API\UsersAPIController@updateProfile']);
    Route::post('api/v1/me/update-avatar', ['uses' => 'AhmadFatoni\ApiGenerator\Controllers\API\UsersAPIController@updateAvatar']);
    //    Route::post('api/v1/me/update-password', ['uses' => 'AhmadFatoni\ApiGenerator\Controllers\API\UsersAPIController@updatePassword']);
});
