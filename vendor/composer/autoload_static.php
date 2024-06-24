<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitfc1df5e08d2f2cb96a00f809c61b2b5a
{
    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'WeboProductButtons\\' => 19,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'WeboProductButtons\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitfc1df5e08d2f2cb96a00f809c61b2b5a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitfc1df5e08d2f2cb96a00f809c61b2b5a::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitfc1df5e08d2f2cb96a00f809c61b2b5a::$classMap;

        }, null, ClassLoader::class);
    }
}