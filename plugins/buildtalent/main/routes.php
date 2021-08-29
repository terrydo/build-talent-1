<?php

Route::get('api/v1/enterprise', ['uses' => '\Buildtalent\Main\Controllers\Enterprise@getAllEnterprise']);
Route::get('api/v1/expert', ['uses' => '\Buildtalent\Main\Controllers\Expert@getAllExpert']);
