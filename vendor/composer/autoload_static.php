<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitcd74a36e19ed77d8602f493538e548b7
{
    public static $prefixLengthsPsr4 = array (
        'K' => 
        array (
            'Kankosal\\User\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Kankosal\\User\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitcd74a36e19ed77d8602f493538e548b7::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitcd74a36e19ed77d8602f493538e548b7::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitcd74a36e19ed77d8602f493538e548b7::$classMap;

        }, null, ClassLoader::class);
    }
}