<?php
require 'vendor\autoload.php';

use App\Model\Usuario;

include ('view/cadastro.php');

$usuario = new Usuario();
$usuario->cadastrarUsuario($_POST);