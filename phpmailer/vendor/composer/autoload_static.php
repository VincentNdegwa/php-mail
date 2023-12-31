<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0731f7e479aff5aa7ac86f9cc07e9df4
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit0731f7e479aff5aa7ac86f9cc07e9df4::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0731f7e479aff5aa7ac86f9cc07e9df4::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit0731f7e479aff5aa7ac86f9cc07e9df4::$classMap;

        }, null, ClassLoader::class);
    }
}
