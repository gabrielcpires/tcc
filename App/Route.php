<?php

namespace App;

use MF\Init\Bootstrap;

class Route extends Bootstrap{

    protected function initRoutes(){

        $routes['index'] = array(
            'route' => '/login',
            'controller' => 'indexController',
            'action' => 'index'
        );

        $routes['home'] = array(
            'route' => '/',
            'controller' => 'AppController',
            'action' => 'telaInicial'
        );

        $routes['cadastrarse'] = array(
            'route' => '/cadastrarse',
            'controller' => 'indexController',
            'action' => 'cadastrarse'
        );

        $routes['registrar'] = array(
            'route' => '/registrar',
            'controller' => 'indexController',
            'action' => 'registrar'
        );

        $routes['autenticar'] = array(
            'route' => '/autenticar',
            'controller' => 'AuthController',
            'action' => 'autenticar'
        );

        $routes['telaInicial'] = array(
            'route' => '/telaInicial',
            'controller' => 'AppController',
            'action' => 'telaInicial'
        );

        $routes['sair'] = array(
            'route' => '/sair',
            'controller' => 'AuthController',
            'action' => 'sair'
        );

        $routes['fazerPublicacao'] = array(
            'route' => '/fazerPublicacao',
            'controller' => 'AppController',
            'action' => 'fazerPublicacao'
        );
        
        $routes['publicar'] = array(
            'route' => '/publicar',
            'controller' => 'AppController',
            'action' => 'publicar'
        );

        $routes['perfil'] = array(
            'route' => '/perfil',
            'controller' => 'AppController',
            'action' => 'perfil'
        );

        $routes['atualizarPerfil'] = array(
            'route' => '/atualizarPerfil',
            'controller' => 'AppController',
            'action' => 'atualizarPerfil'
        );

        $routes['publicacao'] = array(
            'route' => '/publicacao',
            'controller' => 'AppController',
            'action' => 'publicacao'
        );

        $routes['excluirPublicacao'] = array(
            'route' => '/excluirPublicacao',
            'controller' => 'AppController',
            'action' => 'excluirPublicacao'
        );

        $routes['mensagens'] = array(
            'route' => '/mensagens',
            'controller' => 'AppController',
            'action' => 'mensagens'
        );

        $routes['chat'] = array(
            'route' => '/chat',
            'controller' => 'AppController',
            'action' => 'chat'
        );

        $routes['insert_chat'] = array(
            'route' => '/insert_chat',
            'controller' => 'AppController',
            'action' => 'insert_chat'
        );

        $routes['get_chat'] = array(
            'route' => '/get_chat',
            'controller' => 'AppController',
            'action' => 'get_chat'
        );   

        $this->setRoutes($routes);
    }

}

?>