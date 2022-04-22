<?php

use App\Table\VoitureTable;

require '../app/core/Database.php';
require '../app/Table/VoitureTable.php';

$post = json_decode(file_get_contents('php://input'), true);

$voiture = new VoitureTable(new \Core\Database());
$res = $voiture->delete($post['id']);

if($res){
    http_response_code(200);
    header('Content-Type: application/json; charset=utf-8');

    $data = [
        'message' => 'La voiture a bien été supprimée'
    ];

    echo json_encode($data);
}

exit();


