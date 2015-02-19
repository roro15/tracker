<?php

require_once('../vendor/autoload.php');
use \Silex\Application;
use \Symfony\Component\HttpFoundation\Request;

$app = new \Silex\Application();
$config = include(__DIR__ . '/../app/config/config.php');

$app['debug'] = true;

$app->register(new \Silex\Provider\TwigServiceProvider(), array(
	'twig.path' => __DIR__ . '/../app/view',
	'twig.options' => array('cache' => __DIR__ . '/../app/cache/view')
));
$app->register(new \Silex\Provider\FormServiceProvider(), array());
$app->register(new Silex\Provider\ValidatorServiceProvider());
$app->register(new Silex\Provider\TranslationServiceProvider(), array(
    'translator.domains' => array(),
));
$app->register(new \Tracker\DBServiceProvider, array(
	'db.dsn' => $config['db']['dsn'],
	'db.username' => $config['db']['username'],
	'db.password' => $config['db']['password'],
	'db.options'  => $config['db']['options'],
));

$app->mount('/user', new \Controller\UserController);
$app->mount('/task', new \Controller\TaskController);

$app->match('/', function(Application $app, Request $request) {
	echo '<pre>';
	print_r($app['db']);
	echo '</pre>';
	return '';
});

$app->run();