<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite4ed6d19d4ab5a6866337120b1a5d054
{
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
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite4ed6d19d4ab5a6866337120b1a5d054::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite4ed6d19d4ab5a6866337120b1a5d054::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInite4ed6d19d4ab5a6866337120b1a5d054::$classMap;

        }, null, ClassLoader::class);
    }
}
