<?php

namespace Controller;

use \Silex\Application;
use \Silex\ControllerProviderInterface;
use \Symfony\Component\HttpFoundation\Request;

class TaskController extends BaseController {
	public function connect(Application $app) {
		$controllers = parent::connect($app);
		$controllers->get('/', array($this, 'index'));
		return $controllers;
	}

	public function index(Request $request, Application $app) {
		return $app['twig']->render('task/index.twig');
	}
}