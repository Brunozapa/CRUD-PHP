<?php

namespace App\Controller;

require '../../../vendor/autoload.php';

use App\Model\Produto;
use App\Controller\SessionController;

$instanciaSessao = new SessionController();
$sessao = $instanciaSessao->recuperarSessoes();

$produto = new Produto();
$produto->adicionarProduto($_POST, $sessao['id']);
