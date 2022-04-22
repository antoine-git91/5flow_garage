<?php

namespace Core;

class Config
{

    private $settings = [];
    private static $instance;

    public function __construct()
    {
        $this->settings = require dirname(__DIR__) . "/config/config.php";
    }

    public static function getInstance(){
        if(self::$instance === null){
            self::$instance = new Config();
        }
        return self::$instance;
    }

    public function get($key){
        if(!isset($this->settings[$key])){
            return null;
        }
        return $this->settings[$key];
    }

}