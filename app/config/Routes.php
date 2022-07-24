<?php

use \Phalcon\Mvc\Router\Group as RouterGroup;

class Routes extends RouterGroup {

    public function initialize() {
        $this->add(
            '/superhero/jump',
            [
                'controller' => 'test',
                'action' => 'jump'
            ]
        );

        $this->add(
            '/superhero/fly/{id}',
            [
                'controller' => 'test',
                'action' => 'fly',
                'id' => 1
            ]
        );
    }
}