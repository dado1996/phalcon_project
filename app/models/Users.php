<?php

use Phalcon\Mvc\Model;

class Users extends Model {
    public $id;
    public $name;
    public $email;
    public $password;

    public function initialize() {
        $this->setSource('users');
    }

    public function getSource() {
        return "users";
    }
}