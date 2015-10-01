<?php

namespace Uno\Models;

use Core\Storage\AbstractStorage;

class Game
{
    public function create(array $users, AbstractStorage $storage)
    {
        $game = new \stdClass();

        $game->id = date('YmdHis');
        $game->players = [];
        foreach ($users as $player) {
            $userid = md5($player);
            $game->players[$userid]['name'] = $player;
            $game->players[$userid]['id'] = $userid;
            $game->players[$userid]['moves'] = [];
        }
        sort($users);

        $storage->save($game);
        return $game;
    }

    public function get($id, AbstractStorage $storage)
    {
        return $storage->get($id);
    }

    public function update($id, $score, AbstractStorage $storage)
    {
        $gameData = $storage->get($id);
        foreach ($score as $playerid => $value) {
            $gameData->players->{$playerid}->moves[] = $value;
        }
        $storage->update($gameData);
        return $gameData;
    }
}
