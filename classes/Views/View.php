<?php

namespace Views;

class View 
{
    public static function render(string $file, array $params)
    {	
        ob_start();
        include($file);
        $result = ob_get_clean();
        return $result;
    }
}
