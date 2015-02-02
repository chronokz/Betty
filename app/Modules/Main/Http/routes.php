<?php

Route::get('/', 'Modules\Main\Http\Controllers\MainController@index');
Route::post('feedback', ['as' => 'feedback', 'uses' => 'Modules\Main\Http\Controllers\MainController@feedback']);
Route::get('{alias}', 'Modules\Main\Http\Controllers\MainController@page');