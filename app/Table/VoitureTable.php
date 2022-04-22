<?php

namespace App\Table;

use Core\Table\Table;


Class VoitureTable extends Table {

    public function all()
    {
        return $this->db_connect->query(
            "SELECT ma.name AS marque, ma.id AS marque_id, m.name AS model, m.id AS model_id, v.immatriculation, f.name AS fuel, f.id AS fuel_id, v.price AS price, v.type_sale, v.booked, v.id FROM voitures AS v
                LEFT JOIN models AS m ON m.id = v.model_id
                LEFT JOIN marques AS ma ON ma.id = m.marque_id
                LEFT JOIN fuel AS F ON f.id = v.fuel_id
            ORDER BY v.id"
        );
    }
}