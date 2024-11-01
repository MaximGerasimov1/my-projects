<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit58a88d394e020072e6c2d7847edf0e0e
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit58a88d394e020072e6c2d7847edf0e0e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit58a88d394e020072e6c2d7847edf0e0e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit58a88d394e020072e6c2d7847edf0e0e::$classMap;

        }, null, ClassLoader::class);
    }
}
