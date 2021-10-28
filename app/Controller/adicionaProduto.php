<?php

require '../../vendor/autoload.php';

use App\Model\Produto;

$produto = new Produto();
$produto->adicionarProduto($_POST);
