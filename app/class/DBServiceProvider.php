<?php

namespace Tracker;

use \Silex\Application;
use \Silex\ServiceProviderInterface;

class DBServiceProvider implements ServiceProviderInterface {
	function register(Application $app) {
		$app['db'] = $app->share(function($app) {
			$options = array();
			if(isset($app['db.options'])) {
				$options = $app['db.options'];
			}
			$db = new DB($app['db.dsn'], $app['db.username'], $app['db.password'], $options);
			return $db;
		});
	}

	function boot(Application $app) {

	}
}