<?php

use \Phalcon\Mvc\Controller;

class LoginController extends Controller {
    public function indexAction() {
        return "Login!";
    }

    public function processAction($username = false, $password = false) {
        $this->dispatcher->forward([
            'controller' => 'login',
            'action' => 'test'
        ]);
    }
}