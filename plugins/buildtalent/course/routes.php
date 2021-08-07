<?php
Route::get('api/v1/courses', ['uses' => '\Buildtalent\Course\Controllers\Course@listCourse']);
Route::get('api/v1/courses/{id}', ['uses' => '\Buildtalent\Course\Controllers\Course@showCourse']);

Route::group(['middleware' => '\Tymon\JWTAuth\Middleware\GetUserFromToken'], function () {

});
