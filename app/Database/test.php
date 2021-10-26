<?php

require '..\..\vendor\autoload.php';

use App\Controller\AutenticaUsuario;
use App\database\Connection;
use App\Model\Loja;

//$t = new Connection();

$t = new Loja();
$t->cadastrarUsuario(array('bruno','1234'));
