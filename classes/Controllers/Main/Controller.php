<?php

namespace Controllers\Main;

use Views\View;
use Controllers\Controller as MainController;
use App\DataBase;
use Models\Model;
use App\App;
use Models\Message;

class Controller extends MainController
{
    public function method()
    {
        $model = new Message();
        $params = $model->getMessages(); 
        
        $view = new View();
        $html = $view->render($_SERVER['DOCUMENT_ROOT'].'/classes/Views/templates/messages.tpl',$params);
        //$html = $view->render($_SERVER['DOCUMENT_ROOT'].'/classes/Views/templates/main.tpl',$params);
        die($html);
    }
}
