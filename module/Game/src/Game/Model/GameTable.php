<?php

namespace Game\Model;

use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\AbstractTableGateway;

class GameTable extends AbstractTableGateway
{
    protected $table = 'game';

    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;

        $this->resultSetPrototype = new ResultSet();
        $this->resultSetPrototype->setArrayObjectPrototype(new Game());

        $this->initialize();
    }

    public function fetchAll()
    {
        $resultSet = $this->select();
        return $resultSet;
    }

    public function getGame($id)
    {
        $id  = (int) $id;

        $rowset = $this->select(array(
            'id' => $id,
        ));

        $row = $rowset->current();

        if (!$row) {
            throw new \Exception("Could not find row $id");
        }

        return $row;
    }

    public function saveGame(Game $game)
    {
        $data = array(
            'type' => $game->type,
            'title'  => $game->title,
        );

        $id = (int) $game->id;

        if ($id == 0) {
            $this->insert($data);
        } elseif ($this->getGame($id)) {
            $this->update(
                $data,
                array(
                    'id' => $id,
                )
            );
        } else {
            throw new \Exception("Could not find row $id");
        }
    }

    public function deleteGame($id)
    {
        $this->delete(array(
            'id' => $id,
        ));
    }
}