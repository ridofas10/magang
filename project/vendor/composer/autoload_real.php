<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit503cdfbc79cbb5ce9fcc480016ac0f5e
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

        spl_autoload_register(array('ComposerAutoloaderInit503cdfbc79cbb5ce9fcc480016ac0f5e', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit503cdfbc79cbb5ce9fcc480016ac0f5e', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit503cdfbc79cbb5ce9fcc480016ac0f5e::getInitializer($loader));

        $loader->register(true);

        $includeFiles = \Composer\Autoload\ComposerStaticInit503cdfbc79cbb5ce9fcc480016ac0f5e::$files;
        foreach ($includeFiles as $fileIdentifier => $file) {
            composerRequire503cdfbc79cbb5ce9fcc480016ac0f5e($fileIdentifier, $file);
        }

        return $loader;
    }
}

/**
 * @param string $fileIdentifier
 * @param string $file
 * @return void
 */
function composerRequire503cdfbc79cbb5ce9fcc480016ac0f5e($fileIdentifier, $file)
{
    if (empty($GLOBALS['__composer_autoload_files'][$fileIdentifier])) {
        $GLOBALS['__composer_autoload_files'][$fileIdentifier] = true;

        require $file;
    }
}
