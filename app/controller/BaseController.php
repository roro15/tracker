<?php
namespace Controller;
use \Silex\Application;
use \Silex\ControllerProviderInterface;

class BaseController implements ControllerProviderInterface {
	public function connect(Application $app) {
		return $app['controllers_factory'];
	}
}