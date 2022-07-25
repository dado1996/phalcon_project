<?php

use \Phalcon\Mvc\Controller;

class BaseController extends Controller {
    
    public function initialize() {
        $this->assets->addCss('assets/css/styles.css');
        $this->assets->addJs('assets/js/scripts.js');
    }
}