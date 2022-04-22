<?php

define("ROOT", dirname(__DIR__));
require  dirname(__DIR__, 3) . '/vendor/autoload.php';

$models = new \App\Controller\ModelController();
$res = $models->index();

$data = [
    'ok' => true,
    'models' =>$res
];

echo json_encode($data);