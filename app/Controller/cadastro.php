<?php

namespace App\Controller;

require '../../vendor/autoload.php';

use App\Model\Loja;

$usuario = new Loja();
$usuario->cadastrarLoja($_POST);
