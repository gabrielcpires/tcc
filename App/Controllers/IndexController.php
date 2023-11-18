<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

class IndexController extends Action
{

    public function index(){

        $this->view->login = isset($_GET['login']) ? $_GET['login'] : '';
        $this->render('index');
    }

    public function cadastrarse(){

        $this->view->usuario = array(
            'nome' => '',
            'email' => '',
            'senha' => ''
        );

        $this->view->erroCadastro = false;
        $this->render('cadastrarse');
    }

    public function registrar(){

        //sucesso
        $usuario = Container::getModel('Usuario');

        if(strlen($_POST['senha']) < 8){    
            $this->view->senhaPequena = true;
            $this->render('cadastrarse');
        } else{

        $usuario->__set('nome',$_POST['nome']);
        $usuario->__set('email',$_POST['email']);
        $usuario->__set('senha',md5($_POST['senha']));
  
        if($usuario->validarCadastro() && count($usuario->getUsuarioPorEmail()) == 0){
            
            $usuario->salvar();
            $this->view->login = isset($_GET['login']) ? $_GET['login'] : '';
            $this->render('index');
     
        } else {

            $this->view->usuario = array(
                'nome' => $_POST['nome'],
                'email' => $_POST['email'],
                'senha' => $_POST['senha']
            );

            $this->view->erroCadastro = true;

            $this->render('cadastrarse');
            
        }
    }

    }

}

?>