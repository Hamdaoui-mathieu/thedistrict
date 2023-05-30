<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit625a929919c6bcd0fe3481a3c197d9c6
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Stagiere\\TheDistrict\\' => 21,
        ),
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Stagiere\\TheDistrict\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit625a929919c6bcd0fe3481a3c197d9c6::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit625a929919c6bcd0fe3481a3c197d9c6::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit625a929919c6bcd0fe3481a3c197d9c6::$classMap;

        }, null, ClassLoader::class);
    }
}
