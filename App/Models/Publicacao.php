<?php

namespace App\Models;
use MF\Model\Model;

class Publicacao extends Model {

    private $id;
    private $titulo;
    private $texto;
    private $path;
    private $data;
    private $estado;

    private $contato;

    public function __get($atributo){
        return $this->$atributo;
    }

    public function __set( $atributo, $valor){
        $this->$atributo = $valor;
    }

    //salvar
    public function salvar(){
        $query = "insert into publicacoes(id_usuario, titulo, texto,path,contato)values(?,?,?,?,?)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(1, $this->__get('id_usuario'));
        $stmt->bindValue(2, $this->__get('titulo'));
        $stmt->bindValue(3, $this->__get('texto'));
        $stmt->bindValue(4, $this->__get('path'));
        $stmt->bindValue(5, $this->__get('contato'));
        $stmt->execute();

        return $this;
    }

    public function deletar(){
        $query = "delete from 
                    publicacoes
                where
                    id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(1, $this->__get('id'));
        $stmt->execute();
    }

    //recuperar
    public function getAll(){

        $query = "
            select 
                p.id, p.id_usuario,p.titulo, u.nome, p.texto,p.path, u.id_estado,e.nome_cidade, DATE_FORMAT(p.data, '%d/%m/%Y %H:%i') as data
            from 
                publicacoes as p
                left join usuarios as u on (p.id_usuario = u.id)
                left join cidade as e on(u.id_estado = e.id)
            order by
                p.data desc    
        ";

        //Caso queira filtrar as publicacoes para serem somente a do usuario cadastrado (posteriormente adicionar em Perfil)
        // $query = "
        //     select id, id_usuario, texto, data from publicacoes where id_usuario = ?
        // ";
        //Colocar abaixo de  $stmt = $this->db->prepare($query);
        //$stmt->bindValue(1, $this->__get('id_usuario'));

        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    //recuperar com paginação
    public function getPorPagina($limit, $offset){

        $query = "
            select 
                p.id, p.id_usuario,p.titulo, u.nome, p.texto,p.path, u.id_estado,e.nome_cidade, u.pathUsuario, DATE_FORMAT(p.data, '%d/%m/%Y %H:%i') as data
            from 
                publicacoes as p
                left join usuarios as u on (p.id_usuario = u.id)
                left join cidades as e on(u.id_estado = e.id)
            order by
                p.data desc 
            limit
                $limit 
            offset
                $offset    
        ";

        //Caso queira filtrar as publicacoes para serem somente a do usuario cadastrado (posteriormente adicionar em Perfil)
        // $query = "
        //     select id, id_usuario, texto, data from publicacoes where id_usuario = ?
        // ";
        //Colocar abaixo de  $stmt = $this->db->prepare($query);
        //$stmt->bindValue(1, $this->__get('id_usuario'));

        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getPorPaginaSearch($pesquisa,$limit, $offset){

        if($pesquisa != ""){

        $query = "
            select 
                p.id, p.id_usuario,p.titulo, u.nome, p.texto,p.path, u.id_estado,e.nome_cidade, u.pathUsuario, DATE_FORMAT(p.data, '%d/%m/%Y %H:%i') as data
            from 
                publicacoes as p
                left join usuarios as u on (p.id_usuario = u.id)
                left join cidades as e on(u.id_estado = e.id)
            where
                titulo like '%$pesquisa%'
            order by
                p.data desc 
            limit
                $limit 
            offset
                $offset    
        ";
        } else{
            $query = "
            select 
                p.id, p.id_usuario,p.titulo, u.nome, p.texto,p.path, u.id_estado,e.nome_cidade, u.pathUsuario, DATE_FORMAT(p.data, '%d/%m/%Y %H:%i') as data
            from 
                publicacoes as p
                left join usuarios as u on (p.id_usuario = u.id)
                left join cidades as e on(u.id_estado = e.id)
            order by
                p.data desc 
            limit
                $limit 
            offset
                $offset    
        ";
        }

        //Caso queira filtrar as publicacoes para serem somente a do usuario cadastrado (posteriormente adicionar em Perfil)
        // $query = "
        //     select id, id_usuario, texto, data from publicacoes where id_usuario = ?
        // ";
        //Colocar abaixo de  $stmt = $this->db->prepare($query);
        //$stmt->bindValue(1, $this->__get('id_usuario'));

        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }


    
    //recuperar total de publicacoes com filtro
    public function getTotalRegistros($pesquisa){

        if($pesquisa != ""){
            $query = "
            select 
               count(*) as total
            from 
                publicacoes as p
                left join usuarios as u on (p.id_usuario = u.id)
                left join cidades as e on(p.id_estado = e.id)
            where
                titulo like '%$pesquisa%'   
        ";

        } else{
            $query = "
            select 
               count(*) as total
            from 
                publicacoes as p
                left join usuarios as u on (p.id_usuario = u.id)
                left join cidades as e on(p.id_estado = e.id)
        ";
        }

        

        //Caso queira filtrar as publicacoes para serem somente a do usuario cadastrado (posteriormente adicionar em Perfil)
        // $query = "
        //     select id, id_usuario, texto, data from publicacoes where id_usuario = ?
        // ";
        //Colocar abaixo de  $stmt = $this->db->prepare($query);
        //$stmt->bindValue(1, $this->__get('id_usuario'));

        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function getPublicacaoPorId(){
        $query = "
    select 
        p.id, p.id_usuario,p.titulo, u.nome, p.texto,p.path, p.contato, u.id_estado,e.nome_cidade, u.pathUsuario, DATE_FORMAT(p.data, '%d/%m/%Y %H:%i') as data
    from 
        publicacoes as p
        left join usuarios as u on (p.id_usuario = u.id)
        left join cidades as e on(u.id_estado = e.id)
    where p.id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(1, $this->__get('id'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getPublicacaoPorUsuario($id_usuario,$limit, $offset){
        $query = "
    select 
        p.id, p.id_usuario,p.titulo, u.nome, p.texto,p.path, p.contato, u.id_estado,e.nome_cidade, u.pathUsuario, DATE_FORMAT(p.data, '%d/%m/%Y %H:%i') as data
    from 
        publicacoes as p
        left join usuarios as u on (p.id_usuario = u.id)
        left join cidades as e on(u.id_estado = e.id)
    where 
        p.id_usuario = ?
    order by
        p.data desc 
    limit
        $limit 
    offset
        $offset    ";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(1,$id_usuario);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);

    }
}

?>