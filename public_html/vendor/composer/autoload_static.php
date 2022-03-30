<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0bc30bd1a52e8cf5736cce22bcead984
{
    public static $files = array (
        '693dba326b8a9bc93c72d145b18c9d8d' => __DIR__ . '/../..' . '/env.php',
        'ae833998af8b0d0df18e06f39700931c' => __DIR__ . '/../..' . '/routes.php',
    );

    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'App\\Database' => __DIR__ . '/../..' . '/App/Database.php',
        'App\\Event' => __DIR__ . '/../..' . '/App/Event.php',
        'App\\Helper' => __DIR__ . '/../..' . '/App/Helper.php',
        'App\\Middleware' => __DIR__ . '/../..' . '/App/Middleware.php',
        'App\\Router' => __DIR__ . '/../..' . '/App/Router.php',
        'App\\UserInfo' => __DIR__ . '/../..' . '/App/UserInfo.php',
        'ComposerAutoloaderInit0bc30bd1a52e8cf5736cce22bcead984' => __DIR__ . '/..' . '/composer/autoload_real.php',
        'Composer\\Autoload\\ClassLoader' => __DIR__ . '/..' . '/composer/ClassLoader.php',
        'Composer\\Autoload\\ComposerStaticInit0bc30bd1a52e8cf5736cce22bcead984' => __DIR__ . '/..' . '/composer/autoload_static.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Controllers\\AuthentificationController' => __DIR__ . '/../..' . '/Controllers/AuthentificationController.php',
        'Controllers\\HomeController' => __DIR__ . '/../..' . '/Controllers/HomeController.php',
        'Models\\Auth' => __DIR__ . '/../..' . '/Models/Auth.php',
        'Models\\Common' => __DIR__ . '/../..' . '/Models/Common.php',
        'Models\\Users' => __DIR__ . '/../..' . '/Models/Users.php',
        'PHPMailer\\PHPMailer\\Exception' => __DIR__ . '/..' . '/phpmailer/phpmailer/src/Exception.php',
        'PHPMailer\\PHPMailer\\OAuth' => __DIR__ . '/..' . '/phpmailer/phpmailer/src/OAuth.php',
        'PHPMailer\\PHPMailer\\OAuthTokenProvider' => __DIR__ . '/..' . '/phpmailer/phpmailer/src/OAuthTokenProvider.php',
        'PHPMailer\\PHPMailer\\PHPMailer' => __DIR__ . '/..' . '/phpmailer/phpmailer/src/PHPMailer.php',
        'PHPMailer\\PHPMailer\\POP3' => __DIR__ . '/..' . '/phpmailer/phpmailer/src/POP3.php',
        'PHPMailer\\PHPMailer\\SMTP' => __DIR__ . '/..' . '/phpmailer/phpmailer/src/SMTP.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0bc30bd1a52e8cf5736cce22bcead984::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0bc30bd1a52e8cf5736cce22bcead984::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit0bc30bd1a52e8cf5736cce22bcead984::$classMap;

        }, null, ClassLoader::class);
    }
}
