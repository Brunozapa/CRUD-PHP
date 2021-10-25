<?php

use App\Model\Usuario;

require_once 'vendor/autoload.php';

$usuario = new Usuario();


header('Location: view\login.php');