<?php

namespace App\Controller;

use App\App;
use Core\Controller\Controller;

class AppController extends Controller
{

    public function __construct()
    {
        $this->view_path = "../../Views/public/";
    }

    public function loadModel($model_name)
    {
        $this->$model_name = App::getInstance()->getTable($model_name);
    }

}