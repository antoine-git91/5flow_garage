<?php

namespace App\Controller;

class MarqueController extends AppController
{

    public function __construct()
    {
        parent::__construct();
        $this->loadModel("Marque");
    }

    public function index(){
        return $this->Marque->all();
    }

}