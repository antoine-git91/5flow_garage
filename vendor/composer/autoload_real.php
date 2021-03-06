<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitcc3be012c9f828ab9e82de02d993f9e8
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInitcc3be012c9f828ab9e82de02d993f9e8', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitcc3be012c9f828ab9e82de02d993f9e8', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitcc3be012c9f828ab9e82de02d993f9e8::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
