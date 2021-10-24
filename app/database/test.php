<?php

require_once 'vendor\autoload.php';

use App\controller\AutenticaUsuario;
use App\database\Connection;

//$t = new Connection();

$t = new AutenticaUsuario('admin', '1234');
