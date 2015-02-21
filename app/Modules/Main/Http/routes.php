<?php

Route::get('/', 'Modules\Main\Http\Controllers\MainController@index');
Route::get('{alias}', 'Modules\Main\Http\Controllers\MainController@page');