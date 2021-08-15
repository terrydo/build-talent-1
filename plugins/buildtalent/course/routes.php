<?php
Route::get('api/v1/courses', ['uses' => '\Buildtalent\Course\Controllers\Course@listCourse']);
Route::get('api/v1/courses/{id}', ['uses' => '\Buildtalent\Course\Controllers\Course@showCourse']);
Route::get('api/v1/search-courses', ['uses' => '\Buildtalent\Course\Controllers\Course@searchCourse']);
Route::get('api/v1/categories', ['uses' => '\Buildtalent\Course\Controllers\Category@listCategory']);
Route::get('api/v1/categories/{id}', ['uses' => '\Buildtalent\Course\Controllers\Category@showCategory']);

Route::group(['middleware' => '\Tymon\JWTAuth\Middleware\GetUserFromToken'], function () {
    Route::post('api/v1/courses/buy-course', ['uses' => '\Buildtalent\Course\Controllers\Payment@buyCourse']);
    Route::post('api/v1/courses/my-course', ['uses' => '\Buildtalent\Course\Controllers\Payment@myCourse']);
});
