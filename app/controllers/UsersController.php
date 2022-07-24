<?php

class UsersController extends \Phalcon\Mvc\Controller {
    public function indexAction() {
        $this->view->setVars([
            'single' => Users::findFirstById(1),
            'all' => Users::find(
                [
                    'deleted IS NULL'
                ]
            )
        ]);
    }

    public function createAction() {
        $user = new Users();
        $user->name = 'Diego Delgado';
        $user->email = 'diegodelgado_96@hotmail.com';
        $user->password = '1234567890';
        $result = $user->save();

        if(!$result) {
            print_r($user->getMessages());
        }
    }

    public function createAssocAction($id) {
        $user = Users::findFirst($id);

        if (!$user) {
            die("User doesn't exists");
        }

        $project = new Project();
        $project->user = $user;
        $project->title = "El mejor";

        $result = $project->save();
        if (!$result) {
            print_r($project->getMessages());
        }
    }

    public function updateAction($id) {
        $user = Users::findFirstById($id);
        if (!$user) {
            echo "User does not exists";
            die();
        }

        $user->email = "nuevo@email.com";
        $result = $user->update();

        if (!$result) {
            print_r($user->getMessages());
        }
    }

    public function deleteAction($id) {
        $user = Users::findFirstById($id);
        if (!$user) {
            echo "User not found";
            die();
        }

        $result = $user->delete();
        if (!$result) {
            print_r($user->getMessages());
        }
    }
}