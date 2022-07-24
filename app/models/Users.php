<?php

class Users extends BaseModel {
    public $id;
    public $name;
    public $email;
    public $password;

    public function beforeValidationOnCreate() {
        if ($this->email == "test@test.com") {
            die("This email is too common");
        }
    }

    // public function getSource() {
    //     return "users";
    // }
}