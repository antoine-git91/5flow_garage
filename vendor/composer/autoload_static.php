<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitcc3be012c9f828ab9e82de02d993f9e8
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Core\\' => 5,
        ),
        'A' => 
        array (
            'App\\Controller\\' => 15,
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/core',
        ),
        'App\\Controller\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app/Controller',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitcc3be012c9f828ab9e82de02d993f9e8::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitcc3be012c9f828ab9e82de02d993f9e8::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitcc3be012c9f828ab9e82de02d993f9e8::$classMap;

        }, null, ClassLoader::class);
    }
}