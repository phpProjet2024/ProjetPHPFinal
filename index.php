<?php
session_start();
define("URI", "http://localhost/Ecom2/Cumpter/");
define("RACINE", str_replace("index.php", "", $_SERVER["SCRIPT_FILENAME"]));
require_once RACINE . "autoload.php";
$params = explode("/", $_GET['p']);
if (!empty($params[0])) {
    $controller = ucfirst($params[0]);
    if (file_exists(RACINE . "controllers/$controller.php")) {
        $controller = new $controller();

        $action = (isset($params[1])) ? $params[1] : 'index';
        if (method_exists($controller, $action)) {
            array_shift($params);
            array_shift($params);
            call_user_func_array([$controller, $action], $params);
        } else {
            header("Location: " . URI . "Cumpters/index");
            return;
        }
    } else {
        header("Location: " . URI . "Cumpters/index");
        return;
    }
} else {
    header("Location: " . URI . "Cumpters/index");
    return;
}