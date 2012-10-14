<?php

namespace Game\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class GameController extends AbstractActionController {

    public $gameTable;

    public function nolayoutAction() {
        // Turn off the layout, i.e. only render the view script.
        $viewModel = new ViewModel();
        $viewModel->setTerminal(true);
        return $viewModel;
    }

    public function indexAction() {

        //$viewModel = $this->nolayoutAction();
        $viewModel = new ViewModel();
        $viewModel->games = $this->getGameTable()->fetchAll();
        $viewModel->title = 'Game Module';
        return $viewModel;
        
    }

    public function getGameTable() {
        if (!$this->gameTable) {
            $sm = $this->getServiceLocator();
            $this->gameTable = $sm->get('Game\Model\GameTable');
        }
        return $this->gameTable;
    }

}