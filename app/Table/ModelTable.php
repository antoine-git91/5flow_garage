<?php

namespace App\Table;

use Core\Table\Table;
use \PDO;


class ModelTable extends Table {

    public function getModelsByMarque()
    {
        $model = $this->db_connect->prepare("SELECT * FROM models WHERE marque_id = :id", [':id' => $_GET['id']]);
        $res = $model->fetchAll(PDO::FETCH_OBJ);

        return $res;
    }

}
