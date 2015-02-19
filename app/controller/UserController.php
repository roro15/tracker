<?php

namespace Controller;


use \Silex\Application;
use \Silex\ControllerProviderInterface;
use \Symfony\Component\HttpFoundation\Request;
use \Symfony\Component\Validator\Constraints as Assert;

class UserController extends BaseController  {
	public function connect(Application $app) {
		$controllers = parent::connect($app);
		$controllers->get('/', array($this, 'index'));
		$controllers->get('/{id}', array($this, 'view'))->assert('id', '\\d+');
		$controllers->match('/create', array($this, 'create'));
		$controllers->match('/update', array($this, 'update'))->assert('id', '\\d+');
		$controllers->get('/delete/{id}', array($this, 'delete'))->assert('id', '\\d+');
		return $controllers;
	}

	public function index(Request $request, Application $app) {
		return $app['twig']->render('user/index.twig', array('status' => 'works'));
	}

	public function view(Request $request, Application $app, $id) {
		return $app['twig']->render('user/view.twig', array('status' => 'works', 'id' => $id));
	}

	public function create(Request $request, Application $app) {
		$user = array();
		$form = $app['form.factory']->createBuilder('form', $user)
			->add('name', 'text', array(
				'label' => 'Имя',
				'constraints' => array(
					new Assert\NotBlank(array('message' => 'Это поле не может быть пустым.')),
				)
			))
			->add('login', 'text', array(
				'label' => 'Логин',
				'constraints' => array(
					new Assert\NotBlank(array('message' => 'Это поле не может быть пустым.')),
					new Assert\Length(array('minMessage' => 'Это моле не может содержать менее 5 символов', 'min' => 5))
				)
			))
			->add('save', 'submit', array('label' => 'Отправить'))
			->getForm();
		$form->handleRequest($request);

		return $app['twig']->render('user/create.twig', array('form' => $form->createView()));
	}

	public function update(Request $request, Application $app, $id) {
		return $app['twig']->render('user/update.twig', array('status' => 'works', 'id' => $id));
	}

	public function delete(Request $request, Application $app, $id) {
		return $app['twig']->render('user/view.twig', array('status' => 'works', 'id' => $id));
	}
}