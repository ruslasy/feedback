<?php

namespace App;

use App\Router;
use App\DataBase;

class App 
{

    public static $router;
    public static $database;

    public function __construct()
    {
        self::$database = new DataBase();
        $router = new Router($_SERVER['REQUEST_URI']);
        $router->run();
    }
}
