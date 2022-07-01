<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9cb9ba48be00106d8b7a93a6ddc319e4
{
    public static $prefixLengthsPsr4 = array (
        'L' => 
        array (
            'League\\HTMLToMarkdown\\' => 22,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'League\\HTMLToMarkdown\\' => 
        array (
            0 => __DIR__ . '/..' . '/league/html-to-markdown/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'P' => 
        array (
            'Parsedown' => 
            array (
                0 => __DIR__ . '/..' . '/erusev/parsedown',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit9cb9ba48be00106d8b7a93a6ddc319e4::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit9cb9ba48be00106d8b7a93a6ddc319e4::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit9cb9ba48be00106d8b7a93a6ddc319e4::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit9cb9ba48be00106d8b7a93a6ddc319e4::$classMap;

        }, null, ClassLoader::class);
    }
}
