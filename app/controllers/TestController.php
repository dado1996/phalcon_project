<?php

class TestController extends BaseController {

    public function jumpAction() {
        echo __FUNCTION__;
    }

    public function flyAction($id, $name = '') {
        echo __FUNCTION__;
        echo $id;
    }
}