<?php

class UsersController extends BaseController {

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

    public function loginAction() {

        $data = $this->request->get();              // $_REQUEST
        $query = $this->request->getQuery('demo');  // $_GET Requests
        $request = $this->request->getPost();       // $_POST Requests
        print_r($request);

        $this->request->hasPost('username');
        $this->request->hasQuery('city');

        $this->request->isAjax();
        $this->request->isSecureRequest();
        $this->request->isPost();
        $this->request->isGet();
        $this->request->isPut();
        $this->request->isDelete();
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