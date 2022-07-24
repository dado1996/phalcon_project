<?php

class TestController extends BaseController {

    public function jumpAction($id, $name) {
        echo __FUNCTION__;
        echo $id;
        echo $name;
    }

    public function flyAction() {
        echo __FUNCTION__;
    }
}