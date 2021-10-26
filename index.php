<?php

use App\Model\Loja;

require_once 'vendor/autoload.php';

$usuario = new Loja();


header('Location: view\login.php');