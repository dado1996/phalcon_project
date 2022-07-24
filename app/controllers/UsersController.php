<?php

class UsersController extends \Phalcon\Mvc\Controller {
    public function indexAction() {

    }

    public function createAction() {
        $user = new Users();
        $user->name = 'Diego Delgado';
        $user->email = 'diegodelgado_96@hotmail.com';
        $user->password = '1234567890';
        $user->created_at = date("Y-m-d H:i:s");
        $result = $user->save();

        if(!$result) {
            print_r($user->getMessages());
        }
    }

    public function updateAction() {

    }
}