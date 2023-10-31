<?php

namespace App\Models;

use MF\Model\Model;

class Mensagem extends Model
{

    private $msg_id;
    private $incoming_msg_id;
    private $outgoing_msg_id;
    private $msg;

    public function __get($atributo)
    {
        return $this->$atributo;
    }

    public function __set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }

    public function inserir()
    {
        $query = "insert into mensagem(incoming_msg_id, outgoing_msg_id,msg)values(?, ?,?)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(1, $this->__get('incoming_msg_id'));
        $stmt->bindValue(2, $this->__get('outgoing_msg_id'));
        $stmt->bindValue(3, $this->__get('msg'));

        $stmt->execute();

        return $this;
    }

    public function ler()
    {
        $query = "SELECT * FROM mensagem LEFT JOIN usuarios ON usuarios.id_unico = mensagem.outgoing_msg_id
    WHERE (outgoing_msg_id = :outgoing_msg_id_1 AND incoming_msg_id = :incoming_msg_id_1)
            OR (outgoing_msg_id = :outgoing_msg_id_2 AND incoming_msg_id = :incoming_msg_id_2) ORDER BY msg_id";
        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':outgoing_msg_id_1', $this->__get('outgoing_msg_id'));
        $stmt->bindValue(':incoming_msg_id_1', $this->__get('incoming_msg_id'));
        $stmt->bindValue(':outgoing_msg_id_2', $this->__get('incoming_msg_id'));
        $stmt->bindValue(':incoming_msg_id_2', $this->__get('outgoing_msg_id'));

        $stmt->execute();

        return  $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function pegarUltimo(){
        $query = "SELECT mensagem.*, usuarios.*
          FROM mensagem
          LEFT JOIN usuarios ON usuarios.id_unico = mensagem.incoming_msg_id
          WHERE (outgoing_msg_id = :outgoing_msg_id)
          GROUP BY incoming_msg_id
          ORDER BY mensagem.msg_id DESC
          LIMIT 5;";
            $stmt = $this->db->prepare($query);
    
            $stmt->bindValue(':outgoing_msg_id', $this->__get('outgoing_msg_id'));

           
            $stmt->execute();
    
            return  $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

}


?>