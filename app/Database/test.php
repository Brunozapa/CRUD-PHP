<?php

require '..\..\vendor\autoload.php';

use App\Controller\AutenticaUsuario;
use App\database\Connection;
use App\Model\Usuario;

//$t = new Connection();

$t = new Usuario();
$t->autenticarUsuario('admin','1234');
