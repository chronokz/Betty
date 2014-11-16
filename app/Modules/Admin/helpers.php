<?php

function admin_view($view, $data = [], $mergeData = [])
{
    return View::make('admin::' . $view, $data, $mergeData);
}

function admin_redirect($route = null)
{
	if( ! is_null($route))
		return Redirect::route('admin.' . $route);

	return app('redirect');
}



function admin_img($url, $alt = '', array $attributes = [])
{
	return HTML::Image(admin_asset($url), $alt, $attributes);
}

function admin_asset($url)
{
	return Module::asset('admin', $url);
}

function admin_css($url, array $attributes = [], $secure = false)
{
    return Module::style('admin', $url, $attributes, $secure);
}

function admin_js($url, array $attributes = [], $secure = false)
{
    return Module::script('admin', $url, $attributes, $secure);
}