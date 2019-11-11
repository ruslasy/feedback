<?php

namespace Models;

class Model
{
    public static function getMessages($link)
    {
        $sql = "SELECT * FROM message ORDER BY id DESC";
        $stmt= $link->prepare($sql);
        $stmt->execute();
        return $stmt;
   }
}


