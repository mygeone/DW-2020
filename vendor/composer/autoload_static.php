<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbdba2807b5c577b34a5dc2cc6ad6b16c
{
    public static $files = array (
        '3a37ebac017bc098e9a86b35401e7a68' => __DIR__ . '/..' . '/mongodb/mongodb/src/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'MongoDB\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'MongoDB\\' => 
        array (
            0 => __DIR__ . '/..' . '/mongodb/mongodb/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitbdba2807b5c577b34a5dc2cc6ad6b16c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitbdba2807b5c577b34a5dc2cc6ad6b16c::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
