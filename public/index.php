<?php
	/**
	 * This is front controller
	 */
	require '../core/Router.php';

	$router = new Router();

	$router->add('',['controller' => 'Home', 'action' => 'index']);

	print_r($router->getRoutes());
?>