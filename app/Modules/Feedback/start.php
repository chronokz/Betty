<?php

/*
|--------------------------------------------------------------------------
| Register The Module Namespaces
|--------------------------------------------------------------------------
|
| Here is you can register the namespace for this module.
| You may to edit this namespace if you want.
|
*/

View::addNamespace('feedback', __DIR__ . '/Resources/views/');

Lang::addNamespace('feedback', __DIR__ . '/Resources/lang/');

Config::addNamespace('feedback', __DIR__ . '/Config/');

/*
|--------------------------------------------------------------------------
| Require The Routes file.
|--------------------------------------------------------------------------
|
| Next, this module will load filters and routes file.
|
*/

require __DIR__ . '/Http/routes.php';