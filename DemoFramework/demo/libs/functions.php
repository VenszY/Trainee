<?php

function Autoload($class_name) {
    #imeto na klasa dali sudurja Controllers nakraq ?
  if (preg_match('/Controller$/', $class_name)) {
    $folder = CONTROLLERS_PATH;
  } elseif (preg_match('/Model$/', $class_name)) {
    $folder = MODEL_PATH;
    #e da ama view-tata nqmat klasove ?!?!
  } elseif (preg_match('/View/', $class_name)) {
    $folder = VIEW_PATH;
  }

  if (!empty($folder)) {
    if (file_exists($folder . $class_name . '.php')) {
      require_once $folder . $class_name . '.php';
      return true;
    }
  }

}

function pre($arr, $exit = false) {
  echo '<pre><div style="text-align: left">';
  if (is_array($arr)) {
    print_r($arr);
  } elseif (is_object($arr)) {
    var_dump($arr);
  } else {
    echo $arr;
  }
  echo '</div></pre>';
  if ($exit) {
    exit;
  }
}

function redirect($url = DOMAIN) {
  header("Location: " . $url);
  exit();
}

function redirect404() {
  header($_SERVER["SERVER_PROTOCOL"] . " 404 Page Not Found");
  redirect(DOMAIN . '404.html');
}

function indexBy($array, $key) {
  if (!is_array($array) || empty($array)) {
    return array();
  }
  $newArray = array();
  foreach ($array as $val) {
    if (isset($val[$key])) {
      $newArray[$val[$key]] = $val;
    }
  }
  return $newArray;
}

