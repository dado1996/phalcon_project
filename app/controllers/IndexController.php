<?php

use \Phalcon\Mvc\Controller;

class IndexController extends Controller {
    public function indexAction() {
        $this->view->users = Users::find();
        $this->assets->addCss('assets/css/styles.css');
        $this->assets->addJs('assets/js/scripts.js');
    }

    public function startSessionAction() {
        $this->session->set('name', 'Diego Delgado Ota');
    }

    public function getSessionAction() {
        return $this->session->get('name');
    }

    public function removeSessionAction() {
        echo $this->session->remove('name');
    }

    public function destroySessionAction() {
        $this->session->destroy();
    }
}