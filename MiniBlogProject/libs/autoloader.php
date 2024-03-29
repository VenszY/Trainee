<?php

    function Autoload($class_name) {
        if (preg_match('/Controller$/', $class_name)) {
            $folder = CONTROLLERS_PATH;
        } elseif (preg_match('/Model$/', $class_name)) {
            $folder = MODEL_PATH;
        } elseif (preg_match('/View$/', $class_name)) {
            $folder = VIEW_PATH;
        }

        if (!empty($folder)) {
            if (file_exists($folder . $class_name . '.php')) {
                require_once $folder . $class_name . '.php';
                return true;
            }
        }
    }
