<?php

namespace Controllers\Main;

use Views\View;
use Controllers\Controller as MainController;
use App\DataBase;
use Models\Model;
use App\App;

class Controller extends MainController
{
    public function method()
    {
        $sql = "SELECT * FROM message ORDER BY id DESC";

        
        $data = App::$database->getAll($sql);            
        var_dump($data);    
        
        $params = ['h1'=>$data['fio']];   
        $view = new View();
        $html = $view->render($_SERVER['DOCUMENT_ROOT'].'/classes/Views/templates/main.tpl',$params);
        die($html);
    }
}
