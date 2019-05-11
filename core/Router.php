<?php

namespace Core;

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
    public function add($route, $params = []){
        $route = preg_replace('/\//', '\\/', $route);

        // Convert variables e.g. {controller}
        $route = preg_replace('/\{([a-z]+)\}/', '(?P<\1>[a-z-]+)', $route);

        // Convert variables with custom regular expressions e.g. {id:\d+}
        $route = preg_replace('/\{([a-z]+):([^\}]+)\}/', '(?P<\1>\2)', $route);

        // Add start and end delimiters, and case insensitive flag
        $route = '/^' . $route . '$/i';

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
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                foreach ($matches as $key => $match) {
                    if (is_string($key)) {
                        $params[$key] = $match;
                    }
                }

                $this->params = $params;
                return true;
            }
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

    /**
     * Dispatch the route, creating the controller object and running the
     * action method
     *
     * @param string $url The route URL
     *
     * @return void
     */
    public function dispatch($url)
    {
        $url = $this->removeQueryStringVariables($url);

        if ($this->match($url)) {
            $controller = $this->params['controller'];
            $controller = $this->convertToStudlyCaps($controller);
            $controller = "App\Controllers\\$controller";

            if (class_exists($controller)) {
                $controller_object = new $controller($this->params);

                $action = $this->params['action'];
                $action = $this->convertToCamelCase($action);

                if (preg_match('/action$/i', $action) == 0) {
                    $controller_object->$action();

                } else {
                    throw new \Exception("Method $action in controller $controller cannot be called directly - remove the Action suffix to call this method");
                }
            } else {
                echo "Controller class $controller not found";
            }
        } else {
            echo 'No route matched.';
        }
    }

    protected function convertToStudlyCaps($string)
    {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $string)));
    }

    protected function convertToCamelCase($string)
    {
        return lcfirst($this->convertToStudlyCaps($string));
    }

    /**
     * We have used .htaccess to remove ? from the url
     * our URL format is controller/action now if we want to pass some query string it will be considred as action
     * ctrl/action?id=909082kx
     * our normal function will treat as method to call on controller (action?id=909082kx)
     * so we need to remove this
     */

     protected function removeQueryStringVariables($url){
         if($url != ''){
            $parts = explode('&',$url, 2);
            if( strpos($parts[0], '=') === false){
                $url = $parts[0];
            }else{
                $url = '';
            }
         }

         return $url;
     }
}