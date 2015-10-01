<?php
/**
 * Created by PhpStorm.
 * User: molodtsov
 * Date: 01.10.15
 * Time: 20:41
 */

namespace Uno;


class App extends \Core\App
{
    public static function getAppRoot()
    {
        return __DIR__ . '/';
    }

    public static function getTpl()
    {
        return self::getAppRoot() . 'Tmpl/';
    }
}
