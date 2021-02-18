<?php

    class DefaultController extends BaseController {

        public function __construct() {
            $this->loadDefaultView();
        }

        public function loadDefaultView() {
            require_once VIEW_PATH . "MenuView.html";
            require_once VIEW_PATH . "HomePageView.php";
        }


    }
