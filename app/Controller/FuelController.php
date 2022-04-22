<?php

namespace App\Controller;

class FuelController extends AppController
{

    public function __construct()
    {
        parent::__construct();
        $this->loadModel("Fuel");
    }

    public function index(){
        return $this->Fuel->all();
    }

}