<?php

namespace Core;

use \PDO;

class Database
{

    private $db_name;
    private $db_host;
    private $db_user;
    private $db_pass;
    private $pdo;

    public function __construct($db_name, $db_host, $db_pass, $db_user)
    {
        $this->db_name = $db_name;
        $this->db_host = $db_host;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
    }

    private function getPdo(): PDO
    {
        if($this->pdo === null){
            $this->pdo = new \PDO("mysql:host=" . $this->db_host . ";dbname=". $this->db_name .";charset=utf8mb4", $this->db_user, $this->db_pass);
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }

        return $this->pdo;
    }

    public function query($statement){
        $query = $this->getPdo()->query($statement);

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function prepare($statement, $attributes){
        $query_edit = $this->getPdo()->prepare($statement);
        $query_edit->execute($attributes);

        return $query_edit;
    }

}