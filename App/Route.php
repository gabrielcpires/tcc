<?php

namespace App;

use MF\Init\Bootstrap;

class Route extends Bootstrap{

    protected function initRoutes(){

        $routes['home'] = array(
            'route' => '/',
            'controller' => 'indexController',
            'action' => 'index'
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
        

        $this->setRoutes($routes);
    }

}

?>