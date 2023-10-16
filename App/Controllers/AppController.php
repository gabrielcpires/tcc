<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

class AppController extends Action{

    public function telaInicial(){

        $this->validaAutenticacao();
        //recuperação das publicacoes
        $publicacao = Container::getModel('Publicacao');

        //recuperação dos usuarios
        $usuario = Container::getModel('Usuario');
        $usuario->__set('id', $_SESSION['id']);
        $usuario = $usuario->getUsuarioPorId();
        $this->view->usuario = $usuario;

    //Caso queira filtrar as publicacoes para serem somente a do usuario cadastrado (posteriormente adicionar em Perfil)
        //$publicacao->__set('id_usuario', $_SESSION['id']);
        if(isset($_GET['busca']) && $_GET['busca'] != ""){
            $pesquisa = $_GET['busca'];
        } else{
            $pesquisa ="";
        }
        
        //variaveis de páginação 
        $total_registros_pagina = 10;
        $pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
        $deslocamento = ($pagina -1) * $total_registros_pagina ;

        //$publicacoes = $publicacao->getAll();
        // echo '<br><br><br> ';
        $publicacoes = $publicacao->getPorPaginaSearch($pesquisa,$total_registros_pagina, $deslocamento);
        $total_publicacoes = $publicacao->getTotalRegistros($pesquisa);

        $this->view->total_de_paginas = ceil($total_publicacoes['total'] / $total_registros_pagina);
        $this->view->pagina_ativa = $pagina;

        $this->view->publicacoes = $publicacoes;
        $this->view->total_publicacoes = $total_publicacoes;
        
        $this->view->busca = $pesquisa;

        $this->render('telaInicial');
       

    }
    public function fazerPublicacao(){

        $this->validaAutenticacao();

        //recuperar estados
        $objEstados = Container::getModel('ClassEstados');
        $estados = $objEstados->getAll();
        $this->view->estados = $estados;
        $this->barraNavegacao();
        
        $this->render('fazerPublicacao'); 
        
    }
    public function publicar(){

        $this->validaAutenticacao();
            
        $publicacao = Container::getModel('Publicacao');

        $publicacao->__set('titulo', $_POST['titulo']);
        $publicacao->__set('texto', $_POST['texto']);
        $publicacao->__set('id_usuario', $_SESSION['id']);
        // $publicacao->__set('estado', $_POST['estado']);

        if(isset($_FILES['arquivo']) && $_FILES['arquivo']['name'] != ""){
            $arquivo = $_FILES['arquivo'];
            if($arquivo['size'] > 2097152){
                header('Location: /telaInicial?arquivo=grande');
            }
            if($arquivo['error']){
                header('Location: /telaInicial?arquivo=error');
            }
            $pasta = "arquivos/";
            $nomeArquivo = $arquivo['name'];
            $novoNomeArquivo = uniqid();
            $extensao = strtolower(pathinfo($nomeArquivo,PATHINFO_EXTENSION));

            if($extensao != 'jpg' && $extensao != 'png' && $extensao != 'jpeg'){
                header('Location: /telaInicial?arquivo=tipoNaoAceito');
            }

            $path = $pasta . $novoNomeArquivo . "." . $extensao;

            $deu_certo = move_uploaded_file($arquivo["tmp_name"], $path );

            if($deu_certo){
                $publicacao->__set('path', $path);
            }
        }

        $publicacao->salvar();

        header('Location: /telaInicial');
        
    }

    public function atualizarPerfil(){
        $this->validaAutenticacao();
        $usuario = Container::getModel('Usuario');
        $usuario->__set('id', $_SESSION['id']);
        $usuario->__set('nome', $_POST['nome']);
        $usuario->__set('estado', $_POST['estado']);

        if(isset($_FILES['avatar']) && $_FILES['avatar']['name'] != ""){
            $arquivo = $_FILES['avatar'];
            if($arquivo['size'] > 2097152){
                header('Location: /perfil?arquivo=grande');
            }
            if($arquivo['error']){
                header('Location: /perfil?arquivo=error');
            }
            $pasta = "arquivos/";
            $nomeArquivo = $arquivo['name'];
            $novoNomeArquivo = uniqid();
            $extensao = strtolower(pathinfo($nomeArquivo,PATHINFO_EXTENSION));

            if($extensao != 'jpg' && $extensao != 'png'){
                header('Location: /perfil?arquivo=tipoNaoAceito');
            }

            $path = $pasta . $novoNomeArquivo . "." . $extensao;

            $deu_certo = move_uploaded_file($arquivo["tmp_name"], $path );

            if($deu_certo){
                $usuario->__set('path', $path);
                $usuario->atualizarDados_imagem();
            }
        }
        $usuario->atualizarDados();

        header('Location: /perfil?att=sucess');
    }

    public function publicacao(){
        $this->validaAutenticacao();

        //recuperação das publicacoes
        $publicacao = Container::getModel('Publicacao');
        $id = $_GET['id'];

        $publicacao->__set('id', $id);
        $publicacao = $publicacao->getPublicacaoPorId();
        $this->view->publicacao = $publicacao;

        $this->barraNavegacao();
        
        $this->render('publicacao');
        
    }

    public function validaAutenticacao(){

        session_start();

        if (!isset($_SESSION['id']) || empty($_SESSION['id']) || !isset($_SESSION['nome']) || empty($_SESSION['nome'])){
            header('Location: /?login=erro');
        } 
    }

    public function barraNavegacao(){
        echo '<div id="cabecalho">
        <div class="logo-search">
          <div class="logo">
            <a href="/telaInicial">
              <img src="/img/logo1.png" alt="">
            </a>
          </div>
        </div>
        <div>
          <ul class="list">
            <li class="feed"><a href="/telaInicial" class="a">Feed</a></li>
            <li class="msg"><a href="mensagens.php" class="a">Mensagens</a></li>
            <!-- <li class="notificacoes"><a href="notificacoes.php" class="a">Perfil</a></li> -->
            <li ><a href="\perfil" class="a"><img src="/img/perfil.svg" alt=""></a></li>
          </ul>
        </div>
    </div>';
    }

    public function perfil(){
        $this->validaAutenticacao();

        $usuario = Container::getModel('Usuario');
        $usuario->__set('id', $_SESSION['id']);
        $usuario = $usuario->getUsuarioPorId();
        $this->view->usuario = $usuario;

         //recuperar estados
         $objEstados = Container::getModel('ClassEstados');
         $estados = $objEstados->getAll();
         $this->view->estados = $estados;

        $this->barraNavegacao();
        $this->render('perfil');
    }

    
}

?>