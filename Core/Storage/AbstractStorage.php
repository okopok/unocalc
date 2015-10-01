<?php
/**
 * Created by PhpStorm.
 * User: molodtsov
 * Date: 01.10.15
 * Time: 19:31
 */

namespace Core\Storage;


abstract class AbstractStorage
{
    abstract protected function saveHandle(\stdClass $data);
    abstract protected function updateHandle(\stdClass $data);
    abstract protected function getHandle($id);

    public function save(\stdClass $data)
    {
        $this->saveHandle($data);
    }

    public function get($id)
    {
        return $this->getHandle($id);
    }

    public function update(\stdClass $data)
    {
        $this->updateHandle($data);
    }
}
