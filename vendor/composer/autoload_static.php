<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite15f38f0259fa91167e3d768917a32e4
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'APP\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'APP\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInite15f38f0259fa91167e3d768917a32e4::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite15f38f0259fa91167e3d768917a32e4::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInite15f38f0259fa91167e3d768917a32e4::$classMap;

        }, null, ClassLoader::class);
    }
}
