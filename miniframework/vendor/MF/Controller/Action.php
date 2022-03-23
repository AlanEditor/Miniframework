<?php

namespace MF\Controller;

abstract class Action 
{
    protected $view; //variavel global

    function __construct()
    {
        $this->view = new \stdClass(); //Essa classe nativa do PHP cria um objeto vazio
    }

    protected function render($view, $layout) //Carrega o require das views
    {
        $this->view->page = $view; //atribui um novo valor para um novo atributo dentro do objeto

        if(file_exists("../App/Views/".$layout.".phtml")) //verifica se o arquivo existe
        {
            require_once "../App/Views/".$layout.".phtml";
        }

        else
        {
            $this->content();
        }
    }

    protected function content() //Renderiza as páginas
    {
        $classeAtual = get_class($this);//pega o nome da classe

        $classeAtual = str_replace('App\\Controllers', '', $classeAtual);//Substitui o primeiro termo pelo segundo na variavel indicada

        $classeAtual = strtolower(str_replace('Controller', '', $classeAtual)); 

        require_once "../App/Views/".$classeAtual."/".$this->view->page.".phtml";
    }
}



?>