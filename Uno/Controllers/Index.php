<?php
/**
 * Created by PhpStorm.
 * User: molodtsov
 * Date: 01.10.15
 * Time: 20:35
 */

namespace Uno\Controllers;


use Uno\App;

class Index
{

    public static function indexAction()
    {
        ob_start();
        require App::getTpl() . 'index.php';
        return ob_get_clean();
    }
}
