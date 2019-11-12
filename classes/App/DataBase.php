<?php
namespace App;

use PDO;

class DataBase 
{
    private $dbConnect;
    
    public function __construct()
    {
        $this->dbConnect = new PDO("mysql:host=m.0.mysql.websm.io;dbname=test_feedback.ru;charset=utf8",'feedback.ru','E8bgTXXErZD4qjQlYzkSGMJfLfW3dPOdTHNkfQOG');
    }

    public function get()
    {
        return $this->dbConnect;
    }

    public function query(string $sql, array $params = [])
    {
       $stmt = $this->dbConnect->prepare($sql);
       $stmt->execute($params);
       return $stmt;
    }
    public function getAll(string $sql, array $params = [] )
    {
        $stmt = $this->query($sql,$params);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function insertMessage()
    {

    }
}


