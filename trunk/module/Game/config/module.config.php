<?php

return array(
    'controllers' => array(
        'invokables' => array(
            'test/index' => 'Game\Controller\GameController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'game' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/game[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'test/index',
                        'action' => 'index',
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'game' => __DIR__ . '/../view',
        ),
    ),
);