<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5b63138adc77efec4dc666e74e2f4d09
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
        'F' => 
        array (
            'Firebase\\JWT\\' => 13,
        ),
        'C' => 
        array (
            'Chatkit\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
        'Firebase\\JWT\\' => 
        array (
            0 => __DIR__ . '/..' . '/firebase/php-jwt/src',
        ),
        'Chatkit\\' => 
        array (
            0 => __DIR__ . '/..' . '/pusher/pusher-chatkit-server/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit5b63138adc77efec4dc666e74e2f4d09::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5b63138adc77efec4dc666e74e2f4d09::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
