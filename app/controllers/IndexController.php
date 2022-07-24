<?php

use \Phalcon\Mvc\Controller;

class IndexController extends Controller {
    public function indexAction() {
        $this->view->users = Users::find();
    }

    public function startSessionAction() {
        $this->session->set('name', 'Diego Delgado Ota');
    }

    public function getSessionAction() {
        return $this->session->get('name');
    }
}