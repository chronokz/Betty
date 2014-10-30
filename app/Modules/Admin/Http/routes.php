<?php

Route::group(['prefix' => 'admin', 'namespace' => 'Modules\Admin\Http\Controllers'], function()
{
    Route::group(['before' => 'admin.guest'], function ()
    {
        Route::controller('login', 'Auth\\LoginController');
        Route::controller('register', 'Auth\\RegisterController');
    });

    Route::group(['before' => 'admin.auth'], function ()
    {
        Route::controller('logout', 'Auth\\LogoutController');
        Route::get('/', ['as' => 'admin.home', 'uses' => 'HomeController@index']);
    });
});


Route::group([
    'prefix' => 'admin',
    'namespace' => 'Modules\Admin\Http\Controllers\Pages',
    'before' => 'admin.auth'
    ], function ()
{
    Route::controller('pages', 'PageController');
});