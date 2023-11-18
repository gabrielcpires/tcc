<?php

namespace App\Models;

use MF\Model\Model;

class Usuario extends Model
{

    private $id;
    private $nome;
    private $email;
    private $senha;
    private $path;
    private $estado;

    private $id_unico;

    public function __get($atributo)
    {
        return $this->$atributo;
    }

    public function __set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }

    //salvar
    public function salvar()
    {
        $query = "insert into usuarios(nome, email, senha, id_unico)values(?, ?,?,?)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(1, $this->__get('nome'));
        $stmt->bindValue(2, $this->__get('email'));
        $stmt->bindValue(3, $this->__get('senha')); //md5() -> hash 32 caracteres
        $random_id = rand(time(), 10000000);
        $stmt->bindValue(4, $random_id);
        $stmt->execute();

        return $this;
    }
    //validar se um cadastro pode ser feito
    public function validarCadastro()
    {
        $valido = true;

        if (strlen($this->__get('nome')) < 3) {
            $valido = false;
        }

        if (strlen($this->__get('email')) < 3) {
            $valido = false;
        }

        if (strlen($this->__get('senha')) < 3) {
            $valido = false;
        }

        return $valido;
    }

    //recuperar um usuario por e-mail
    public function getUsuarioPorEmail()
    {
        $query = "select nome, email from usuarios where email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(1, $this->__get('email'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getUsuarioPorId()
    {
        $query = "
        select
            u.nome,u.id, u.email, u.senha, u.pathUsuario, u.id_estado,e.nome_cidade,u.id_unico 
        from 
            usuarios as u 
            left join cidades as e on(u.id_estado = e.id)
        where
            u.id = ?
        ";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(1, $this->__get('id'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getUsuarioPorIdUnico()
    {
        $query = "
        select
            id, id_unico,nome, pathUsuario
        from 
            usuarios 
        where
            id_unico = ?
        ";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(1, $this->__get('id_unico'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getUsuarioPorNome()
    {
        $query = "
        SELECT
            id, nome, pathUsuario,id_unico
        FROM 
            usuarios 
        WHERE
            nome LIKE ?
    ";

        $searchTerm = '%' . $this->__get('nome') . '%'; // Adapte isso para o seu contexto

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(1, $searchTerm, \PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function atualizarDados_nome()
    {
        $query = "UPDATE usuarios SET nome=? WHERE id=?";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(1, $this->__get('nome'));
        $stmt->bindValue(2, $this->__get('id'));
        $stmt->execute();

        return $this;
    }

    public function atualizarDados_email()
    {
        // Verificar se o novo email já existe
        $queryCheckEmail = "SELECT COUNT(*) as count FROM usuarios WHERE email=?";
        $stmtCheckEmail = $this->db->prepare($queryCheckEmail);
        $stmtCheckEmail->bindValue(1, $this->__get('email'));
        $stmtCheckEmail->execute();
        $resultCheckEmail = $stmtCheckEmail->fetch(\PDO::FETCH_ASSOC);

        if ($resultCheckEmail['count'] == 0) {
            // O email não existe, então podemos prosseguir com a atualização
            $queryUpdate = "UPDATE usuarios SET email=? WHERE id=?";
            $stmtUpdate = $this->db->prepare($queryUpdate);
            $stmtUpdate->bindValue(1, $this->__get('email'));
            $stmtUpdate->bindValue(2, $this->__get('id'));

            try {
                $stmtUpdate->execute();
                return $this;
            } catch (\PDOException $e) {
                throw new \PDOException("Erro ao executar a atualização: " . $e->getMessage());
            }
        } else {
            throw new \PDOException("O email já está em uso. Escolha outro email.");
        }
    }

    public function atualizarDados_estado()
    {
        $query = "UPDATE usuarios SET id_estado=? WHERE id=?";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(1, $this->__get('estado'));
        $stmt->bindValue(2, $this->__get('id'));
        $stmt->execute();

        return $this;
    }

    public function atualizarDados_imagem()
    {
        $query = "UPDATE usuarios SET pathUsuario=?WHERE id=?";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(1, $this->__get('path'));
        $stmt->bindValue(2, $this->__get('id'));
        $stmt->execute();

        return $this;
    }

    public function atualizarDados_senha()
    {
        $query = "UPDATE usuarios SET senha=?WHERE id=?";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(1, $this->__get('senha'));
        $stmt->bindValue(2, $this->__get('id'));
        $stmt->execute();

        return $this;
    }

    public function autenticar()
    {
        $query = "select id, nome, email, pathUsuario,id_unico from usuarios where email = ? and senha = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(1, $this->__get('email'));
        $stmt->bindValue(2, $this->__get('senha'));
        $stmt->execute();

        $usuario = $stmt->fetch(\PDO::FETCH_ASSOC);

        if (!empty($usuario['id']) && !empty($usuario['nome'])) {
            $this->__set('id', $usuario['id']);
            $this->__set('nome', $usuario['nome']);
            $this->__set('path', $usuario['pathUsuario']);
            $this->__set('id_unico', $usuario['id_unico']);
        }

        return $usuario;
    }
}

?>