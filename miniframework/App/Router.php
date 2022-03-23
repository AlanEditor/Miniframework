<?php

namespace App; //Apelido gerado para ser localizado pelo autoload do composer

use MF\Init\Bootstrap;

class Route extends Bootstrap //Classe de Rota
{

    protected function initRoutes() //Inicia as Rotas
    {
        $routes['home'] = array( //Configuração da Rota 'Home'
            'route' => '/',
            'controller' => 'indexController',
            'action' => 'index'
        );

        $routes['sobre_nos'] = array( //Configuração da Rota 'sobre_nos'
            'route' => '/sobre_nos',
            'controller' => 'indexController',
            'action' => 'sobreNos'
        );

        $this->setRoutes($routes);
    }


}

?>