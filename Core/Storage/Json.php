<?php
/**
 * Created by PhpStorm.
 * User: molodtsov
 * Date: 01.10.15
 * Time: 19:31
 */

namespace Core\Storage;


use Core\App;

class Json extends AbstractStorage
{
    private static $_filename = 'storage.json';

    protected function saveHandle(\stdClass $data)
    {
        $json = json_decode(file_get_contents($this->getFilename()));
        if (!$json) {
            $json = new \stdClass();
            $json->data = new \stdClass();
        }

        $json->data->{$data->id} = $data;
        file_put_contents($this->getFilename(), json_encode($json));
    }

    protected function getHandle($id)
    {
        $json = json_decode(file_get_contents($this->getFilename()));
        if (isset($json->data->{$id})) {
            return $json->data->{$id};
        }
        return false;
    }

    protected function updateHandle(\stdClass $data)
    {
        $json = json_decode(file_get_contents($this->getFilename()));
        if (isset($json->data->{$data->id})) {
            $json->data->{$data->id} = $data;
            file_put_contents($this->getFilename(), json_encode($json));
        }
    }


    protected function getFilename()
    {
        return App::getTmpRoot() . self::$_filename;
    }
}
