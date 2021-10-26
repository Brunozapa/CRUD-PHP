<?php

require '..\..\vendor\autoload.php';

use App\Controller\AutenticaUsuario;
use App\database\Connection;
use App\Model\Loja;
use App\Model\Produto;

//$t = new Connection();

$t = new Produto();
$t->deletarProduto(1);