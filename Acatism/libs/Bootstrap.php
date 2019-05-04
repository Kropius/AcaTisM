<?php

class Bootstrap
{
    function __construct()
    {
        $url = (isset ($_GET['url'])) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);
        $file = 'controllers/' . $url[0] . '.php';
        if(file_exists($file)) {
            require $file;
        }
        else {
            echo "Non-existent file: $file!<br>";
            require 'controllers/manageErrors.php';
            $controller = new ManageErrors();
            return false;
        }
        $controller = new $url[0];
        $controller->loadModel($url[0]);

        if (isset($url[2]))
            $controller->{$url[1]}($url[2]);
        else if (isset($url[1]))
            $controller->{$url[1]}();
    }
}