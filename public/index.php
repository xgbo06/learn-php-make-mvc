<?php
	/**
	 * This is front controller
	 */
	require '../core/Router.php';

	$router = new Router();
	echo get_class($router);

?>