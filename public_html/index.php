<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
    $query = $_SERVER["QUERY_STRING"];
    
    session_start();
    //var_dump($query);
    //var_dump(dirname(__DIR__));
    define("ROOT", dirname(__DIR__));
    define("LAYOUT", "default");
    require_once(ROOT."/public_html/errors/debug.php");
    use application\Router;
    
    spl_autoload_register(function($class){
        $path = ROOT."/".str_replace("\\", "/", $class).".php";
        //debug($path);
        require($path);
    });
    Router::AddRoute("^(?P<parametrs>[a-z|0-9=&]+)?$", ["controller" => "main", "action" => "index"]);
    Router::AddRoute("(?P<controller>[a-z-]+)\/(?P<action>[a-z-]+)\&?(?P<parametrs>[\w=&]+)?");
    Router::matchRoute($query);
    Router::dispatch($query);
    
?>