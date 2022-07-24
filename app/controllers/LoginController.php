<?php

use \Phalcon\Mvc\Controller;

class LoginController extends Controller {
    public function initialize() {
    }

    public function indexAction() {}

    public function processAction($username = 'Diego Delgado', $password = '') {
        $this->view->setVar('username', $username);
        $this->view->setVar('password', $password);

        $this->view->disableLevel(\Phalcon\Mvc\View::LEVEL_AFTER_TEMPLATE);
    }

    public function testAction() {
        echo "-- TEST ACTION --";
    }
}