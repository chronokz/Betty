<?php

Route::get('/', 'Modules\Main\Http\Controllers\MainController@index');
Route::get('{alias}', 'Modules\Main\Http\Controllers\MainController@page');

App::missing(function() {
	return Response::make(View::make('main::error.404'), 404);
});

View::composer('main::inc.menu', 'Modules\Main\Composers\MenuComposer');
View::composer('main::*', 'Modules\Main\Composers\ConfigComposer');