<?php

use Phalcon\Mvc\Model\Behavior\SoftDelete;

class BaseModel extends \Phalcon\Mvc\Model {

    public function initialize() {

        // Local field, referenced model, referenced field
        $this->hasMany('id', 'Project', 'user_id');

        $this->addBehavior(
            new SoftDelete(
                [
                    'field' => 'deleted',
                    'value' => 1
                ]
            )
        );
    }

    public function beforeCreate() {
        $this->created_at = date('Y-m-d H:i:s');
    }

    public function beforeUpdate() {
        $this->updated_at = date('Y-m-d H:i:s');
    }
}