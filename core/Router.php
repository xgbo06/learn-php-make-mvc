<?php

class Router{
    /**
     * associative array that will contain routing table
     */
    protected $routes = [];

    /**
     * save the params for the mached route
     */
    protected $params = [];

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

    /**
     * match the routes in the routing table and set the params property if route is found
     * 
     * @param $url route URL 
     * 
     * @return true if found else false 
     */
    public function match($url){
        /*
        foreach($this->routes as $route => $params){
            if($url == $route){
                $this->params = $params;
                return true;
            }
        }
        */

        // match to fixed pattern /controllelr/action
        $regrex = "/^(?P<controller>[a-z-]+)\/(?P<action>[a-z-]+)$/";
        if(preg_match($regrex, $url, $matches)){
            $params = [];

            foreach($matches as $key => $match){
                if(is_string($key)){
                    $params[$key] = $match;
                }
            }

            $this->params = $params;
            return true;
        }

        return false;
    }

    /**
     * get current params
     * @return array
     */
    public function  getParams(){
        return $this->params;
    }
}