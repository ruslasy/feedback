<?php

namespace App;

Class Router
{
   private $controller;
   private $method;
   private $params;
   
   public function __construct(string $url)
   {
       $arr = explode('/',substr(parse_url($url, PHP_URL_PATH),1));
       $this->controller = '\\Controllers\\Main\\Controller';
       if(isset($arr[0]) && $arr[0])
       {
           $this->controller = '\\Controllers\\'.$arr[0].'\\Controller';
       }
       unset($arr[0]);
       $this->method = 'method';
       if(isset($arr[1]) && $arr[1])
       {
          $this->method = $arr[1];
       }
       unset($arr[1]);
       $params = $arr;
   }

   public function run()
   {
       if(!class_exists($this->controller))
       {
            $this->show404('no controller');
       }

       $controller = new $this->controller();
       if(!method_exists($controller,$this->method))
       {
           $this->show404('no method'); 
       }
       $method = $this->method;
       $controller->$method();
   }

   private function show404($err)
   {
       echo '404 - '.$err;
       die();
   }
}
