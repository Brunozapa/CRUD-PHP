<?php

require_once '../../vendor/autoload.php';

use App\Model\Loja;

include('view/cadastro.php');

$usuario = new Loja();
$usuario->cadastrarLoja($_POST);

