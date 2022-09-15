<?php
    namespace application;
    class Router{
        protected static $routes = [];
        protected static $route = [];

        public static function AddRoute($regexp, $route = []){
            self::$routes[$regexp] = $route;
            //debug($regexp);
        }
        public static function matchRoute($url){
            foreach (self::$routes as $pattern => $match) {
                if (preg_match("#$pattern#i", $url, $matches)) {
                    foreach ($matches as $key => $value) {
                        $match[$key] = $value;
                        //debug($matches); 
                        //debug($match);  
                    }
                    self::$route = $match;
                    //debug(self::$route);
                    return true;
                    //self::$route[$matches["controller"]] = $matches["action"];
                    //return self::$route;
                }
            }
            return false;   
        }
        public static function dispatch($url){
            if (self::matchRoute($url)) {   
                $controller = "\\application\\controllers\\".self::$route["controller"]."Controller";
                $action = self::$route["action"];
                if (method_exists($controller, $action)) {
                    $obj =  new $controller(self::$route);
                    $obj->$action();
                    if (method_exists($obj, 'getView')) {
                        $obj->getView();
                    }
                }
            }
        }
    }
?>