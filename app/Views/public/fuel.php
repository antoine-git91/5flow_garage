<?php

define("ROOT", dirname(__DIR__));
require  dirname(__DIR__, 3) . '/vendor/autoload.php';

$fuels = new \App\Controller\FuelController();
$res = $fuels->index();

echo json_encode($res);