<?php
require 'vendor\autoload.php';

use App\Model\Loja;

include ('view\login.php');

$usuario = new Loja();
$usuario->autenticarUsuario(array($_POST['email'],$_POST['senha']));
