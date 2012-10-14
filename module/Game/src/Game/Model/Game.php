<?php
namespace Game\Model;

class Game
{
    public $id;
    public $type;
    public $title;

    public function exchangeArray($data)
    {
        $this->id     = (isset($data['id'])) ? $data['id'] : null;
        $this->type   = (isset($data['type'])) ? $data['type'] : null;
        $this->title  = (isset($data['title'])) ? $data['title'] : null;
    }
}