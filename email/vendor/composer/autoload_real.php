<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit989ef7a29e6e5af334e326709e12ccbc
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

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInit989ef7a29e6e5af334e326709e12ccbc', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit989ef7a29e6e5af334e326709e12ccbc', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit989ef7a29e6e5af334e326709e12ccbc::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
