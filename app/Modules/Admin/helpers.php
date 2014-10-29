<?php

function admin_view($view, $data = [], $mergeData = [])
{
    return View::make('admin::' . $view, $data, $mergeData);
}

function admin_redirect($route = null)
{
	if( ! is_null($route)) return Redirect::route('admin.' . $route);

	return app('redirect');
}

function admin_style($url, array $attributes = [], $secure = false)
{
    return Module::style('admin', $url, $attributes, $secure);
}

function admin_script($url, array $attributes = [], $secure = false)
{
    return Module::script('admin', $url, $attributes, $secure);
}