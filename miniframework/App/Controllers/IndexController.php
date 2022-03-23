<?php

namespace App\Controllers; //Apelido gerado para ser localizado pelo autoload do composer

//Os recursos do Miniframework
use MF\Controller\Action;
use MF\Model\Container;

//Os Models
use App\Models\Produto;
use App\Models\Info;


class IndexController extends Action
{

    function index() //função que vai retornar a página index
    {
        //$this->view->dados = array('Sofá', 'Cadeira', 'Cama'); //atribui ao Objeto view os dados do array

        $produto = Container::getModel('Produto');

        $produtos = $produto->getProduto(); //Atribui o retorno da função a variavel 'produtos'

        $this->view->dados = $produtos; //atribui o valor do array 'produtos' ao objeto 'view'

        $this->render('index', 'layout1');
    }

    function sobreNos() //função que vai retornar a página sobre_nos
    {
        $info = Container::getModel('Info');

        $informacoes = $info->getInfo();

        $this->view->dados = $informacoes; //atribui o valor do array 'produtos' ao objeto 'view'


        //$this->view->dados = array('Notebook', 'Smartphone');//atribui ao Objeto view os dados do array
        $this->render('sobreNos', 'layout1');
    }


}

?>