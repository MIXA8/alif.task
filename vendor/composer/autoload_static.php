<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit179ed937e7ac1fcd20c977f6a1b2e3e4
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Predator\\AlifTask\\' => 18,
            'PHPMailer\\PHPMailer\\' => 20,
        ),
        'C' => 
        array (
            'Core\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Predator\\AlifTask\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
        'Core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/core',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit179ed937e7ac1fcd20c977f6a1b2e3e4::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit179ed937e7ac1fcd20c977f6a1b2e3e4::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit179ed937e7ac1fcd20c977f6a1b2e3e4::$classMap;

        }, null, ClassLoader::class);
    }
}
