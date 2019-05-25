<?php
class Bootstrap
{
    function __construct()
    {
        $url = $_GET['url'];
        $url = rtrim($url, '/');
        $url = explode('/', $url);
       // print_r($url);

        $file = 'controllers/' . $url[0] . '.php';
        //echo $file;
        if (file_exists($file)) {
            require $file;
        } else {
            require 'controllers/error.php';
            $controller=new Errors();
            return false;
            //throw  new Exception("The file: $file Does not exists");
        }

        $controller = new $url[0];
        $controller->loadModel($url[0]);

        if (isset($url[2])) {
            $controller->{$url[1]}($url[2]);
        } else if (isset($url[1])) {
            $controller->{$url[1]}();
        }
    }
}
?>