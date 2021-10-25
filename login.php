<?php
require 'vendor\autoload.php';

use App\Model\Usuario;

include ('view\login.php');

$usuario = new Usuario();
$usuario->autenticarUsuario(array($_POST['email'],$_POST['senha']));
