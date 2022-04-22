<?php

namespace App;

use Core\Config;
use Core\Database;

class App
{

    private static $instance;
    private $db_instance;

    /**
     * @return App
     */
    public static function getInstance(): App
    {
        if(self::$instance === null){
            self::$instance = new App();
        }
        return self::$instance;
    }

    /**
     * @return Database
     */
    public function getDb(): Database
    {
        $config = Config::getInstance();
        if($this->db_instance === null){
            $this->db_instance = new Database(
                $config->get("dbname"),
                $config->get("dbhost"),
                $config->get("dbuser"),
                $config->get("dbpass")
            );
        }
        return $this->db_instance;
    }

    /**
     * @param $name
     * @return mixed
     */
    public function getTable($name)
    {
        $classname = "\\App\\Table\\" . ucfirst($name) . "Table";
        return new $classname($this->getDb());
    }

}