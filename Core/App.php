<?php
/**
 * Created by PhpStorm.
 * User: molodtsov
 * Date: 01.10.15
 * Time: 19:36
 */

namespace Core;


class App
{
    public static function getRoot()
    {
        return __DIR__ . '/../';
    }

    public static function getCoreRoot()
    {
        return self::getRoot() . 'Core/';
    }

    public static function getTmpRoot()
    {
        return self::getRoot() . 'tmp/';
    }

    public static function getPublicRoot()
    {
        return self::getRoot() . 'Public/';
    }

    public static function initVendors()
    {
        require_once self::getRoot() . 'vendor/autoload.php';
    }

    public static function autoload()
    {
        spl_autoload_register(function ($class) {
            include_once self::getRoot() . strtr($class, '\\', '/') . '.php';
        });
    }
}
