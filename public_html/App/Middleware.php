<?php

namespace App;

/**
 * Class Middleware
 * @package App
 */
class Middleware
{
    /**
     * Define your methods' custom middlewares for the web routes
     *
     * @var array
     */
    private static $WEBmiddlewares = [
        'BlogController@create' => 'WEBauthentication',
        'BlogController@store' => 'WEBauthentication',
        'BlogController@edit' => 'WEBauthentication',
        'BlogController@update' => 'WEBauthentication',
        'BlogController@delete' => 'WEBauthentication',

        'AuthController@logout' => 'WEBauthentication',
    ];

    /**
     * Define your methods' custom middlewares for the api routes
     *
     * @var array
     */
    private static $APImiddlewares = [
        'BlogController@store' => 'APIauthentication',
        'BlogController@update' => 'APIauthentication',
        'BlogController@delete' => 'APIauthentication',

        'AuthController@logout' => 'APIauthentication',
    ];

    /**
     * Assign related middleware method to the each controller's method
     *
     * @param string class method name $classMethod
     * @return void
     */
    public static function init($classMethod)
    {
        $classMethod = str_replace('Controllers\\', '', $classMethod);
        $classMethod = str_replace('::', '@', $classMethod);
        if (strpos($classMethod, 'API\\')) {
            $classMethod = str_replace('API\\', '', $classMethod);
            if (array_key_exists($classMethod, self::$APImiddlewares)) return self::{self::$APImiddlewares[$classMethod]}();
        } else {
            if (array_key_exists($classMethod, self::$WEBmiddlewares)) return self::{self::$WEBmiddlewares[$classMethod]}();
        }
    }
}
