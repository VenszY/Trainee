<?php

    class BaseController {

        public function __construct() {
        }


        public function chosenView($view) {
            require_once VIEW_PATH . "MenuView.html";
            $path = VIEW_PATH . $view . 'View.php';
            require_once $path;

        }
    }