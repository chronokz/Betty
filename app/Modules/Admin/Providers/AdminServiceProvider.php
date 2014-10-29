<?php namespace Modules\Admin\Providers;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Pingpong\Modules\Exceptions\ValidationException;

class AdminServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * The filters base class name.
	 * 
	 * @var array
	 */
	protected $filters = [
		'admin.guest'	=> 	'GuestFilter',
		'admin.auth'	=>	'AuthFilter'
	];

	/**
	 * Register the filters.
	 *
	 * @param  Router $router 
	 * @return void 
	 */
	public function registerFilters(Router $router)
	{
		foreach ($this->filters as $name => $filter)
		{
			$class = 'Modules\\Admin\\Http\\Filters\\' . $filter;
			
			$router->filter($name, $class);
		}
	}

	/**
	 * Set auth.model config.
	 */
	public function setAuthModel()
	{
		$this->app['config']->set('auth.model', $this->app['config']->get('admin::auth.model'));
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->booted(function ($app)
		{
			$this->registerFilters($app['router']);

			$this->setAuthModel();

			$this->registerErrorHandlers();
		});
	}

	/**
	 * Register custom error handlers.
	 *
	 * @return void
	 */
	public function registerErrorHandlers()
	{
		$this->app->error(function (ValidationException $e)
		{
			return $this->app['redirect']->back()->withErrors($e->getErrors())->withInput();
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
