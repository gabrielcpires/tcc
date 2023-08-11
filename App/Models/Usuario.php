<?php

namespace App\Models;
use MF\Model\Model;

class Usuario extends Model {

    private $id;
    private $nome;
    private $email;
    private $senha;

    public function __get($atributo){
        return $this->$atributo;
    }

    public function __set( $atributo, $valor){
        $this->$atributo = $valor;
    }

    //salvar
    public function salvar(){
        $query = "insert into usuarios(nome, email, senha)values(?, ?,?)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(1,$this->__get('nome'));
        $stmt->bindValue(2,$this->__get('email'));
        $stmt->bindValue(3,$this->__get('senha')); //md5() -> hash 32 caracteres
        $stmt->execute();

        return $this;
    }
    //validar se um cadastro pode ser feito
    public function validarCadastro(){
        $valido = true;

        if(strlen($this->__get('nome')) < 3){
            $valido = false;
        }

        if(strlen($this->__get('email')) < 3){
            $valido = false;
        }

        if(strlen($this->__get('senha')) < 3){
            $valido = false;
        }

        return $valido;
    }

    //recuperar um usuario por e-mail
    public function getUsuarioPorEmail(){
        $query = "select nome, email from usuarios where email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(1, $this->__get('email'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function autenticar(){
        $query = "select id, nome, email from usuarios where email = ? and senha = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(1, $this->__get('email'));
        $stmt->bindValue(2, $this->__get('senha'));
        $stmt->execute();

        $usuario = $stmt->fetch(\PDO::FETCH_ASSOC);

        if(!empty($usuario['id'])  && !empty($usuario['nome'])){
            $this->__set('id', $usuario['id']);
            $this->__set('nome', $usuario['nome']);
        }

        return $usuario;
    }
}

?>