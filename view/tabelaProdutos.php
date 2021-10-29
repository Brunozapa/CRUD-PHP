<?php

use App\Controller\SessionController;
use App\Model\Produto;

require_once './vendor/autoload.php';

$instanciaSessao = new SessionController();
$sessao = $instanciaSessao->recuperarSessoes();


var_dump($sessao);

$instanciaProduto = new Produto();
$arrayProdutos = $instanciaProduto->recuperarProdutos($sessao['id']);
unset($arrayProdutos['idProduto'], $arrayProdutos['fkLoja']);
array_push($arrayProdutos, $sessao['id']);
var_dump($arrayProdutos);
/* 
foreach($arrayProdutos as $values){
    echo $values['nome'] . $values['quantidade'] . $values['preco'];
} */
