<?php
/**
 * Created by PhpStorm.
 * User: molodtsov
 * Date: 01.10.15
 * Time: 22:02
 */

namespace Uno;


class Game
{
    public $id;
    public $players;

    public function setPlayers(array $players)
    {
        foreach ($players as $player) {
            $userid = md5($player);
            $this->players[$userid]['name'] = $player;
            $this->players[$userid]['id'] = $userid;
            $this->players[$userid]['moves'] = [];
        }
    }
}
