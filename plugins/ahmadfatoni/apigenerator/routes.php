<?php

Route::post('fatoni/generate/api', array('as' => 'fatoni.generate.api', 'uses' => 'AhmadFatoni\ApiGenerator\Controllers\ApiGeneratorController@generateApi'));
Route::post('fatoni/update/api/{id}', array('as' => 'fatoni.update.api', 'uses' => 'AhmadFatoni\ApiGenerator\Controllers\ApiGeneratorController@updateApi'));
Route::get('fatoni/delete/api/{id}', array('as' => 'fatoni.delete.api', 'uses' => 'AhmadFatoni\ApiGenerator\Controllers\ApiGeneratorController@deleteApi'));

Route::resource('api/v1/posts', 'AhmadFatoni\ApiGenerator\Controllers\API\Posts APIController', ['except' => ['destroy', 'create', 'edit']]);

Route::group(['middleware' => '\Tymon\JWTAuth\Middleware\GetUserFromToken'], function () {
    // Route::get('api/v1/posts/{id}/delete', ['as' => 'api/v1/posts.delete', 'uses' => 'AhmadFatoni\ApiGenerator\Controllers\API\Posts APIController@destroy']);
    // Route::resource('api/v1/users', 'AhmadFatoni\ApiGenerator\Controllers\API\UsersAPIController', ['except' => ['destroy', 'create', 'edit']]);
    // Route::get('api/v1/users/{id}/delete', ['as' => 'api/v1/users.delete', 'uses' => 'AhmadFatoni\ApiGenerator\Controllers\API\UsersAPIController@destroy']);
    Route::get('api/me', ['uses' => 'AhmadFatoni\ApiGenerator\Controllers\API\UsersAPIController@me']);
});
