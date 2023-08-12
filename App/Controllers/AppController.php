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

    //Caso queira filtrar as publicacoes para serem somente a do usuario cadastrado (posteriormente adicionar em Perfil)
        //$publicacao->__set('id_usuario', $_SESSION['id']);

    

        //variaveis de páginação 
        $total_registros_pagina = 10;
        $pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
        $deslocamento = ($pagina -1) * $total_registros_pagina ;

        //$publicacoes = $publicacao->getAll();
        echo '<br><br><br> ';
        $publicacoes = $publicacao->getPorPagina($total_registros_pagina, $deslocamento);
        $total_publicacoes = $publicacao->getTotalRegistros();
        $this->view->total_de_paginas = ceil($total_publicacoes['total'] / $total_registros_pagina);
        $this->view->pagina_ativa = $pagina;

        $this->view->publicacoes = $publicacoes;
        

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
        $publicacao->__set('estado', $_POST['estado']);

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

            if($extensao != 'jpg' && $extensao != 'png'){
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

    public function validaAutenticacao(){

        session_start();

        if (!isset($_SESSION['id']) || empty($_SESSION['id']) || !isset($_SESSION['nome']) || empty($_SESSION['nome'])){
            header('Location: /?login=erro');
        } 
    }

    public function barraNavegacao(){
        echo '<nav class="navbar navbar-expand-lg menu">
		<div class="container">
			<div class="navbar-nav">
				<a class="menuItem" href="/sair">
					Sair
				</a>
				<a class="menuItem" href="/telaInicial"><img src="/img/twitter_logo.png" class="menuIco" /></a>
			</div>
		</div>
	</nav>';
    }

    
}

?>