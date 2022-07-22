<?php

use \Phalcon\Mvc\Controller;

class SignUpController extends Controller {
    public function indexAction() {}

    public function registerAction() {
        $user = new Users();

        $user->assign(
            $this->request->getPost(),
            [
                "name",
                "email"
            ]
        );

        $success = $user->save();

        $this->view->success = $success;

        if ($success) {
            echo "Good";
        } else {
            echo "Bad<br />";
            $messages = $user->getMessages();

            foreach($messages as $m) {
                echo $m->getMessage() . "<br />";
            }
        }

        $this->view->disable();
    }
}