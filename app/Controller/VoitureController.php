<?php

namespace App\Controller;

class VoitureController extends AppController
{

    public function __construct()
    {
        parent::__construct();
        $this->loadModel("Voiture");
    }

    public function index(){
        $voitures = $this->Voiture->all();
        require "../Views/public/home.php";
    }

    public function update($post){
        return $this->Voiture->update("immatriculation = :immatriculation, price = :price, fuel_id = :fuel_id, type_sale = :type_sale, booked = :booked, model_id = :model_id",
            [
                ":id" => htmlspecialchars($post['id']),
                ":model_id" => htmlspecialchars($post['model']),
                ":immatriculation" => htmlspecialchars($post['immatriculation']),
                ":fuel_id" => htmlspecialchars($post['fuel']),
                ":price" => htmlspecialchars($post['price']),
                ":type_sale" => htmlspecialchars($post['type_sale']),
                ":booked" => htmlspecialchars($post['booked']),
            ]);
    }

    public function create($post){
        return $this->Voiture->create("immatriculation, price, fuel_id, type_sale, booked, model_id",
            ":immatriculation, :price, :fuel_id, :type_sale, :booked, :model_id",
            [
                ":model_id" => htmlspecialchars($post['model']),
                ":immatriculation" => htmlspecialchars($post['immatriculation']),
                ":fuel_id" => htmlspecialchars($post['fuel']),
                ":price" => htmlspecialchars($post['price']),
                ":type_sale" => htmlspecialchars($post['type_sale']),
                ":booked" => htmlspecialchars($post['booked'])
            ]);
    }

}