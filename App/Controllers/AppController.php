<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

class AppController extends Action
{

    public function telaInicial()
    {
        session_start();
        //recuperação das publicacoes
        $publicacao = Container::getModel('Publicacao');

        if (isset($_SESSION['id'])){

        //recuperação dos usuarios
        $usuario = Container::getModel('Usuario');
        $usuario->__set('id', $_SESSION['id']);
        $usuario = $usuario->getUsuarioPorId();
        $this->view->usuario = $usuario;

        }

        //Caso queira filtrar as publicacoes para serem somente a do usuario cadastrado (posteriormente adicionar em Perfil)
        //$publicacao->__set('id_usuario', $_SESSION['id']);
        if (isset($_GET['busca']) && $_GET['busca'] != "") {
            $pesquisa = $_GET['busca'];
        } else {
            $pesquisa = "";
        }

        //variaveis de páginação 
        $total_registros_pagina = 10;
        $pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
        $deslocamento = ($pagina - 1) * $total_registros_pagina;

        //$publicacoes = $publicacao->getAll();
        // echo '<br><br><br> ';
        $publicacoes = $publicacao->getPorPaginaSearch($pesquisa, $total_registros_pagina, $deslocamento);
        $total_publicacoes = $publicacao->getTotalRegistros($pesquisa);

        $this->view->total_de_paginas = ceil($total_publicacoes['total'] / $total_registros_pagina);
        $this->view->pagina_ativa = $pagina;

        $this->view->publicacoes = $publicacoes;
        $this->view->total_publicacoes = $total_publicacoes;

        $this->view->busca = $pesquisa;

        $this->render('telaInicial');


    }
    public function fazerPublicacao()
    {

        $this->validaAutenticacao();

        $usuario = Container::getModel('Usuario');
        $usuario->__set('id', $_SESSION['id']);
        $usuario = $usuario->getUsuarioPorId();
        $this->view->usuario = $usuario;
        
        //recuperar estados
        $objEstados = Container::getModel('ClassEstados');
        $estados = $objEstados->getAll();
        $this->view->estados = $estados;

        $this->render('fazerPublicacao');

    }
    public function publicar()
    {

        $this->validaAutenticacao();

        $publicacao = Container::getModel('Publicacao');

        $publicacao->__set('titulo', $_POST['titulo']);
        $publicacao->__set('texto', $_POST['texto']);
        $publicacao->__set('id_usuario', $_SESSION['id']);
        $publicacao->__set('contato', $_POST['contato']);
        // $publicacao->__set('estado', $_POST['estado']);

        if (isset($_FILES['arquivo']) && $_FILES['arquivo']['name'] != "") {
            $arquivo = $_FILES['arquivo'];
            if ($arquivo['size'] > 2097152) {
                header('Location: /telaInicial?arquivo=grande');
            }
            if ($arquivo['error']) {
                header('Location: /telaInicial?arquivo=error');
            }
            $pasta = "arquivos/";
            $nomeArquivo = $arquivo['name'];
            $novoNomeArquivo = uniqid();
            $extensao = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION));

            if ($extensao != 'jpg' && $extensao != 'png' && $extensao != 'jpeg') {
                header('Location: /telaInicial?arquivo=tipoNaoAceito');
            }

            $path = $pasta . $novoNomeArquivo . "." . $extensao;

            $deu_certo = move_uploaded_file($arquivo["tmp_name"], $path);

            if ($deu_certo) {
                $publicacao->__set('path', $path);
            }
        }

        $publicacao->salvar();

        header('Location: /telaInicial');

    }

    public function excluirPublicacao()
    {

        $this->validaAutenticacao();
        $id = isset($_GET['id']) ? $_GET['id'] : '';

        $publicacao = Container::getModel('Publicacao');
        $publicacao->__set('id', $id);
        $publicacao->deletar();

        header('Location: /perfil?id=' . $_SESSION['id']);

    }

    public function atualizarPerfil()
    {
        $this->validaAutenticacao();
        $usuario = Container::getModel('Usuario');
        $usuario->__set('id', $_SESSION['id']);
        $usuario_id = $usuario->getUsuarioPorId();

        if (isset($_POST['nome']) && $_POST['nome'] != "") {
            $usuario->__set('nome', $_POST['nome']);
            $usuario->atualizarDados_nome();
        }
        try {
            if (isset($_POST['email']) && $_POST['email'] != "") {
                $usuario->__set('email', $_POST['email']);
                $usuario->atualizarDados_email();
            }
        } catch (\PDOException $e) {
            header('Location: /perfil?email=cadastrado');
        }
       

        if (isset($_POST['estado']) && $_POST['estado'] != "") {
            $usuario->__set('estado', $_POST['estado']);
            $usuario->atualizarDados_estado();
        }


        if (isset($_POST['senha']) && $_POST['senha'] != "") {
            $usuario->__set('senha', md5($_POST['senha']));
            $usuario->atualizarDados_senha();
        }

        if (isset($_FILES['avatar']) && $_FILES['avatar']['name'] != "") {
            $arquivo = $_FILES['avatar'];
            if ($arquivo['size'] > 2097152) {
                header('Location: /perfil?arquivo=grande');
            }
            if ($arquivo['error']) {
                header('Location: /perfil?arquivo=error');
            }
            $pasta = "arquivos/";
            $nomeArquivo = $arquivo['name'];
            $novoNomeArquivo = uniqid();
            $extensao = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION));

            if ($extensao != 'jpg' && $extensao != 'png') {
                header('Location: /perfil?arquivo=tipoNaoAceito');
            }

            $path = $pasta . $novoNomeArquivo . "." . $extensao;

            $deu_certo = move_uploaded_file($arquivo["tmp_name"], $path);

            if ($deu_certo) {
                $usuario->__set('path', $path);
                $usuario->atualizarDados_imagem();
            }
        }
        header('Location: /perfil?att=sucess&id='. $usuario_id[0]['id']);
    }

    public function publicacao()
    {
        $this->validaAutenticacao();

        //recuperação das publicacoes
        $publicacao = Container::getModel('Publicacao');
        $id = $_GET['id'];

        $usuario = Container::getModel('Usuario');
        $usuario->__set('id', $_SESSION['id']);
        $usuario = $usuario->getUsuarioPorId();
        $this->view->usuario = $usuario;

        $publicacao->__set('id', $id);
        $publicacao = $publicacao->getPublicacaoPorId();
        $this->view->publicacao = $publicacao;

        $this->render('publicacao');

    }

    public function validaAutenticacao()
    {

        session_start();

        if (!isset($_SESSION['id']) || empty($_SESSION['id']) || !isset($_SESSION['nome']) || empty($_SESSION['nome'])) {
            header('Location: /login?login=semLogin');
        }
    }


    public function perfil()
    {
        $this->validaAutenticacao();

        $usuario = Container::getModel('Usuario');
        $usuario->__set('id', $_GET['id']);
        $usuario = $usuario->getUsuarioPorId();
        $this->view->usuario = $usuario;

        //recuperar estados
        $objEstados = Container::getModel('ClassEstados');
        $estados = $objEstados->getAll();
        $this->view->estados = $estados;

        $publicacao = Container::getModel('Publicacao');
        //variaveis de páginação 
        $total_registros_pagina = 10;
        $pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
        $deslocamento = ($pagina - 1) * $total_registros_pagina;

        //$publicacoes = $publicacao->getAll();
        // echo '<br><br><br> ';
        $publicacoes = $publicacao->getPublicacaoPorUsuario($_SESSION['id'], $total_registros_pagina, $deslocamento);
        $total_publicacoes = $publicacao->getTotalRegistros("");

        $this->view->total_de_paginas = ceil($total_publicacoes['total'] / $total_registros_pagina);
        $this->view->pagina_ativa = $pagina;

        $this->view->publicacoes = $publicacoes;
        $this->view->total_publicacoes = $total_publicacoes;


        $this->render('perfil');
    }

    public function mensagens()
    {
        $this->validaAutenticacao();

        $usuario = Container::getModel('Usuario');
        $usuario->__set('id', $_SESSION['id']);
        $usuario = $usuario->getUsuarioPorId();
        $this->view->usuario = $usuario;

        $mensagem = Container::getModel('Mensagem');
        $mensagem->__set('outgoing_msg_id', $usuario[0]['id_unico']); 

        if (isset($_GET['usuario']) && $_GET['usuario'] != "") {
            $pesquisa = $_GET['usuario'];
        } else {
            $pesquisa = "NOME_DE_USUARIO_QUE_NAO_EXISTE";
        }

        //recuperação dos usuarios
        $usuarioPesquisado = Container::getModel('Usuario');

        $usuarioPesquisado->__set('nome', $pesquisa);
        $this->view->usuarioPesquisado = $usuarioPesquisado->getUsuarioPorNome();
        $this->view->ultimasMensagens =  $mensagem->pegarUltimo();;

        $this->render('mensagens');
    }

    public function chat()
    {
        $this->validaAutenticacao();

        if (isset($_GET['user_id']) && $_GET['user_id'] != "") {
            $user_id = $_GET['user_id'];
        } else {
            $user_id = "NOME_DE_ID_QUE_NAO_EXISTE";
        }

        $usuario = Container::getModel('Usuario');
        $usuario->__set('id', $_SESSION['id']);
        $usuario = $usuario->getUsuarioPorId();
        $this->view->usuario = $usuario;
        
        $usuario_mensagem = Container::getModel('Usuario');
        $usuario_mensagem->__set('id_unico', $user_id);
        $usuario_mensagem = $usuario_mensagem->getUsuarioPorIdUnico();
        $this->view->usuario_mensagem = $usuario_mensagem;

        $this->render('chat');
    }

    public function insert_chat()
    {
        $this->validaAutenticacao();


        $outgoing_id = $_SESSION['id_unico'];
        $incoming_id =  $_POST['incoming_id'];
        $msg =  $_POST['message'];

        $mensagem = Container::getModel('Mensagem');

        $mensagem->__set('outgoing_msg_id', $outgoing_id );
        $mensagem->__set('incoming_msg_id', $incoming_id );
        $mensagem->__set('msg', $msg );

        $mensagem->inserir();

        
    }

    public function get_chat()
    {
        $this->validaAutenticacao();


        $outgoing_id = $_SESSION['id_unico'];
        $incoming_id =  $_POST['incoming_id'];
        $output = "";

        $mensagem = Container::getModel('Mensagem');

        $mensagem->__set('outgoing_msg_id', $outgoing_id );
        $mensagem->__set('incoming_msg_id', $incoming_id );

        $mensagem = $mensagem->ler();

        $numLinhas = count($mensagem);
        

        if($numLinhas > 0){
            foreach ($mensagem as $row){
                if($row['outgoing_msg_id'] === $outgoing_id){
                    $output .= '<div class="chat outgoing">
                                <div class="details">
                                    <p>'. $row['msg'] .'</p>
                                </div>
                                </div>';
                }else{
                    $output .= '<div class="chat incoming">
                                <div class="details">
                                    <p>'. $row['msg'] .'</p>
                                </div>
                                </div>';
                }  
            }
        }else{
            $output .= '<div class="text">Sem mensagens disponíveis. Assim que você enviar uma mensagem, ela aparecerá aqui.</div>';
        }echo $output;

        
    }
}
?>