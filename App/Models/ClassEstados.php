<?php

namespace App\Models;
use MF\Model\Model;

class ClassEstados extends Model{

    public function getAll(){
        $query = "select * from estados";
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }
}

?>


