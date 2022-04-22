<?php

namespace Core\Controller;

class Controller
{

    public $view_path;

    public function render($data = []){
        ob_start();
        extract($data);
        $content = ob_get_clean();
        require("../../app/index.php");


    }

}