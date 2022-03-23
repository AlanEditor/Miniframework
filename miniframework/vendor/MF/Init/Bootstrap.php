<?php

namespace MF\Init; //Apelido gerado para ser localizado pelo autoload do composer

abstract class Bootstrap //Classe abstrata só pode ser herdada
{

    private $routes; //variavel que vai receber as rotas

    abstract protected function initRoutes();

    function __construct()
    {
        $this->initRoutes(); //inicia o método de rotas

        $this->run($this->getUrl()); //atribui ao método 'run()' a url da página
    }

    function getRoutes()
    {
        return $this->routes;
    }

    function setRoutes(array $rotas) //seta a rota através do tipo definido como array
    {
        $this->routes = $rotas;
    }

    protected function run($url) //Recebe a URL como parâmetro para disparar uma possivel rota / é um método protegido mas pode ser herdado
    {

        foreach($this->getRoutes() as $key => $route) //Faz uma varredura no Array Route que contém as informações das páginas
        {
            if($url == $route['route']) //Verifica se a URL é igual a rota definida no parâmetro 'router' do array
            {
                $class = "App\\Controllers\\".ucfirst($route['controller']); //Vai ditar uma classe de acordo com o valor do controller da rota; primeira letra em maiusculo

                $controller = new $class; //instancia a classe dinâmica

                $action = $route['action']; //Recebe o action que tem de ser executado

                $controller->$action(); //executa o action
            }
        }
    }

    protected function getUrl() //Pega a URL / é um método protegido mas pode ser herdado
    {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); //Pega a URL depois da barra
    }
}

?>