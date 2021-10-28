<?php

require 'vendor\autoload.php';

use App\Controller\AutenticaUsuario;
use App\Database\Connection;
use App\Model\Loja;
use App\Model\Produto;

//$t = new Connection();

$t = new Produto();
$t->adicionarProduto(array('Perfume', 100, 70.50));