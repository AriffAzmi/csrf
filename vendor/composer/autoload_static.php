<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3975e1a3b49372d0ccff2298397fe8ec
{
    public static $prefixesPsr0 = array (
        'C' => 
        array (
            'CSRF' => 
            array (
                0 => __DIR__ . '/../..' . '/Src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInit3975e1a3b49372d0ccff2298397fe8ec::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
