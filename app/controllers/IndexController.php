<?php
class IndexController extends BaseController {
    public function indexAction() {
        $this->view->users = Users::find();
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