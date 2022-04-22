<?php

define("ROOT", dirname(__DIR__, 3));
require ROOT . '/vendor/autoload.php';

use App\Controller\VoitureController;
use Core\Response\Response;

$controller = new VoitureController();

$post = json_decode(file_get_contents('php://input'), true);
$res = null;
$data = null;

if($post){
    try {
        // Si voiture existante on la modifie
        if(isset($post['id'])){
            $res = $controller->update($post);
            if ($res) {
                $data = [
                    "ok" => true,
                    "status" => 201,
                    "message" => "La voiture à bien été modifiée"
                ];
                Response::send($data);
            } else {
                throw new Exception("Une erreur s'est produite. La voiture n'a pas pu être modifiée.");
            }
            // Sinon on la créée
        } else {
            $res = $controller->create($post);
            if ($res) {
                $data = [
                    "ok" => true,
                    "status" => 201,
                    "message" => "La voiture à bien été créée"
                ];
                Response::send($data);
            } else {
                throw new Exception("Une erreur s'est produite. La voiture n'a pas pu être créée");
            }

        }
    } catch (Exception $e) {
        $data = [
            "ok" => true,
            "status" => $e->getCode(),
            "message" => $e->getMessage()
        ];
        Response::send($data);
    }
} else {
    $data = [
        "ok" => false,
        "status" => 403,
        "message" => "Aucune donnée envoyée."
    ];
    Response::send($data);
}

