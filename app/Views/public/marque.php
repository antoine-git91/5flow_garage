<?php

define("ROOT", dirname(__DIR__));
require  dirname(__DIR__, 3) . '/vendor/autoload.php';

$marques = new \App\Controller\MarqueController();
$res = $marques->index();

echo json_encode($res);