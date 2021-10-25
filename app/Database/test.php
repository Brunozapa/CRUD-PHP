<?php

require '..\..\vendor\autoload.php';

use App\Controller\AutenticaUsuario;
use App\database\Connection;
use App\Model\Usuario;

//$t = new Connection();

$t = new Usuario();
$t->cadastrarUsuario(array('bruno','1234'));
