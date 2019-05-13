<?php
	/**
	 * This is front controller
	 */
	// require '../app/controllers/Posts.php';
	// require '../core/Router.php';

	/**
	 * using composer as dependency mgmt
	 * using twing for templating engine
	 */
	require_once '../vendor/autoload.php';

	/** using composer autoload */
	// spl_autoload_register(function($className){
	// 	$root = __DIR__;
	// 	$root = dirname(__DIR__); //get parent directory
	// 	$file = $root . "/". str_replace('\\','/', $className).".php";
	// 	$file = ($file);
	// 	if(is_readable($file)){
	// 		require $file;
	// 	}
	// });

	$router = new Core\Router();

	$router->add('', ['controller' => 'Home', 'action' => 'index']);
	$router->add('posts', ['controller' => 'Posts', 'action' => 'index']);
	$router->add('{controller}/{action}');
	$router->add('{controller}/{id:\d+}/{action}');
	$router->add('admin/{controller}/{action}', ['namespace' => 'Admin']);
	
/*
	$url = $_SERVER['QUERY_STRING'];
	if( $router->match($url)){
		print_r($router->getParams());
	}else{
		print_r ("route not found");
	}
*/
	$router->dispatch($_SERVER['QUERY_STRING']);

?>