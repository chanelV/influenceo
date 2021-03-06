<?php
namespace App;

class Router
{
    public static $halts = false;
    public static $routes = [];
    public static $methods = [];
    public static $callbacks = [];
    public static $maps = [];
    public static $patterns =
        [
            ':any' => '[^/]+',
            ':num' => '[0-9]+',
            ':all' => '.*'
        ];
    public static $error_callback;

    public static function __callstatic($method, $params)
    {
        if ($method === 'map') {
            $maps = array_map('strtoupper', $params[0]);
            $uri = substr( $params[1], 0, 1 ) === "/" ? $params[1] : '/' . $params[1];
            $callback = $params[2];
        } else {
            $maps = null;
            $uri = substr( $params[0], 0, 1 ) === "/" ? $params[0] : '/' . $params[0];
            $callback = $params[1];
        }
        array_push(self::$maps, $maps);
        array_push(self::$routes, $uri);
        array_push(self::$methods, strtoupper($method));
        array_push(self::$callbacks, $callback);
    }

    
    public static function error($callback)
    {
        self::$error_callback = $callback;
    }

   
    public static function haltOnMatch($flag = true)
    {
        self::$halts = $flag;
    }

    
    public static function dispatch()
    {
        /**
         * Adding CONTROLLER_FOLDER to all callbacks
         */
        self::$callbacks = array_map(fn($v) => CONTROLLER_FOLDER . $v, self::$callbacks);

        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];
        $searches = array_keys(static::$patterns);
        $replaces = array_values(static::$patterns);
        $found_route = false;
        $matched = [];

        self::$routes = (array)preg_replace('/\/+/', '/', self::$routes);

        /**
         * Check if route is defined without regex
         */
        if (in_array($uri, self::$routes)) {

            $route_pos = array_keys(self::$routes, $uri);
            foreach ($route_pos as $route) {

                /**
                 * Using an ANY option to match both GET and POST requests
                 */
                if (self::$methods[$route] == $method || self::$methods[$route] == 'ANY' || (!empty(self::$maps[$route]) && in_array($method, self::$maps[$route]))) {
                    $found_route = true;

                    /**
                     * If route is not an object
                     */

                     if (!is_object(self::$callbacks[$route])) {
                        $parts = explode('/', self::$callbacks[$route]);
                        $last = end($parts);
                        $segments = explode('@', $last);
                        $controller = new $segments[0]();
                        $controller->{$segments[1]}();
                    } else {
                        call_user_func(self::$callbacks[$route]);
                    }
                    if (self::$halts) return;
                }
            }
        } else {

            /**
             * Check if defined with regex
             */
            $pos = 0;
            foreach (self::$routes as $route) {
                if (strpos($route, ':')) {
                    $route = str_replace($searches, $replaces, $route);
                }

                if (preg_match('#^' . $route . '$#', $uri, $matched)) {
                    if (self::$methods[$pos] == $method || self::$methods[$pos] == 'ANY' || (!empty(self::$maps[$pos]) && in_array($method, self::$maps[$pos]))) {
                        $found_route = true;
                        array_shift($matched);
                        if (!is_object(self::$callbacks[$pos])) {
                            $parts = explode('/', self::$callbacks[$pos]);
                            $last = end($parts);
                            $segments = explode('@', $last);
                            $controller = new $segments[0]();
                            if (!method_exists($controller, $segments[1])) {
                                echo "controller and action not found";
                            } else {
                                call_user_func_array([$controller, $segments[1]], $matched);
                            }
                        } else {
                            call_user_func_array(self::$callbacks[$pos], $matched);
                        }
                        if (self::$halts) return;
                    }
                }
                $pos++;
            }
        }

        /**
         * Run the error callback if the route was not found
         */
        if (!$found_route) {
            if (!self::$error_callback) {
                self::$error_callback = function () {
                    header($_SERVER['SERVER_PROTOCOL'] . " 404 Not Found");
                    echo '404 Page not found';
                    exit();
                };
            } elseif (is_string(self::$error_callback)) {
                self::get($_SERVER['REQUEST_URI'], self::$error_callback);
                self::$error_callback = null;
                self::dispatch();
                return;
            }
            call_user_func(self::$error_callback);
        }
    }
}
