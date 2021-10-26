<?php
require 'vendor\autoload.php';

use App\Model\Loja;

include ('view/cadastro.php');

$usuario = new Loja();
$usuario->cadastrarUsuario($_POST);