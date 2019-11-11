<?php

namespace Controllers\Main;

use Views\View;
use Controllers\Controller as MainController;

class Controller extends MainController
{
    public function method()
    {
        $params = ['h1'=>'efewrgdfgsdgs'];   
        $view = new View();
        $html = $view->render($_SERVER['DOCUMENT_ROOT'].'/classes/Views/templates/main.tpl',$params);
        die($html);
    }
}
