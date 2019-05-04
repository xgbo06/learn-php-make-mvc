<?php

class Router{
    /**
     * associative array that will contain routing table
     */
    protected $routes = [];

    /**
     * add routes to the routing table
     * 
     * @param $route The route URL
     * @param $params Parameters (controller, action ..etc)
     * 
     * @return void
     */
    public function add($route, $params){
        $this->routes[$route] = $params;
    }

    /** 
     * Returns the routing table
     * 
     * @return array
     */
    public function getRoutes(){
        return $this->routes;
    }
}