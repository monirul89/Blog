<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita00bfbc8e35cc5951085fa1f4cef2238
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita00bfbc8e35cc5951085fa1f4cef2238::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita00bfbc8e35cc5951085fa1f4cef2238::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
