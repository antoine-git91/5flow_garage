<?php

namespace App\Controller;

class ModelController extends AppController
{

    public function __construct()
    {
        parent::__construct();
        $this->loadModel("Model");
    }

    public function index(){
        return $this->Model->getModelsByMarque();
    }

}