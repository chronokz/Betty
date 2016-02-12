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

View::addNamespace('blog', __DIR__ . '/Resources/views/');

Lang::addNamespace('blog', __DIR__ . '/Resources/lang/');

Config::addNamespace('blog', __DIR__ . '/Config/');

/*
|--------------------------------------------------------------------------
| Require Routes File.
|--------------------------------------------------------------------------
|
| Next, this module will load routes file.
|
*/

require __DIR__ . '/Http/routes.php';