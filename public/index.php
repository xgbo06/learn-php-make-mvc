<?php
	/**
	 * This is front controller
	 */
	require '../core/Router.php';

	$router = new Router();

	$router->add('',['controller' => 'Home', 'action' => 'index']);

	$url = $_SERVER['QUERY_STRING'];
	if( $router->match($url)){
		print_r($router->getParams());
	}else{
		print_r ("route not found");
	}
?>