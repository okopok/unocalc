<?php
/**
 * Created by PhpStorm.
 * User: molodtsov
 * Date: 01.10.15
 * Time: 20:36
 */

namespace Uno\Controllers;


use Core\Storage\Json;
use Uno\App;

class Game
{
    public static function getAction($id)
    {
        $storage = new Json();
        $game = new \Uno\Models\Game();
        $gameData = $game->get($id, $storage);

        ob_start();
        require App::getTpl() . 'game.php';
        return ob_get_clean();
    }

    public static function saveAction()
    {

    }

    public static function createAction()
    {
        $storage = new Json();
        $game = new \Uno\Models\Game();
        $gameData = $game->create($_POST['players'], $storage);
        if ($gameData->id) {
            Header('Location: /'. $gameData->id);
        }
    }

    public static function updateAction($id)
    {
//        $storage = new Json();
//        $game = new \Uno\Models\Game();
//        $game->update();
//        var_dump($_POST['score'], $id);

        $storage = new Json();
        $game = new \Uno\Models\Game();
        $gameData = $game->update($id, $_POST['score'], $storage);
        if ($gameData->id) {
            Header('Location: /'. $gameData->id);
        }
    }
}
