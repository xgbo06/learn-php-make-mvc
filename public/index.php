<?php
	/**
	 * This is front controller
	 */
	require '../core/Router.php';

	$router = new Router();

	$router->add('', ['controller' => 'Home', 'action' => 'index']);
	$router->add('posts', ['controller' => 'Posts', 'action' => 'index']);
	$router->add('{controller}/{action}');
	$router->add('{controller}/{id:\d+}/{action}');
	

	$url = $_SERVER['QUERY_STRING'];
	if( $router->match($url)){
		print_r($router->getParams());
	}else{
		print_r ("route not found");
	}
?>