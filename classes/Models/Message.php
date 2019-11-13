<?php

namespace Models;

use App\App;

class Message extends Model
{
    public function getMessages()
    {
        $sql = "SELECT * FROM message ORDER BY id DESC";        
        $data = App::$database->getAll($sql);           
        return $data;
    }

    public function getMessagesJSON()
    {
        return json_encode($this->getMessages());
    }

    public function appendMessage($fio, $email, $message)
    {
        $sql = "INSERT INTO message (fio, email, message) VALUES (?,?,?)";
        App::$database->query($sql,$this->putInOrder([$fio,$email,$message]));
    }

    public function putInOrder(array $params)
    {
        for($i=0; $i < count($params); $i++)
        {
            $params[$i] = htmlentities($params[$i]);
        }
        return $params;
    }
}
