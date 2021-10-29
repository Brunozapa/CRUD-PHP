<?php

namespace App\Controller;

require_once '../../../vendor/autoload.php';

use App\Model\Produto;
use App\Controller\SessionController;

$instanciaSessao = new SessionController();
$sessao = $instanciaSessao->recuperarSessoes();

$produto = new Produto();

$produto->deletarProduto($_COOKIE['idParaAlteracao']);