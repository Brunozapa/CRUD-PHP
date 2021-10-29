<?php

namespace App\Controller;

require '../../vendor/autoload.php';

use App\Model\Loja;
use App\Controller\SessionController;



$usuario = new Loja();

$email = $_POST['email'];
$senha = $_POST['senha'];

$resultadoDaConsulta = $usuario->autenticarLoja(array($_POST['email'], $_POST['senha']));

if (empty($resultadoDaConsulta)) {
    header('Location: ../../view/login.php');
}
$sessao = new SessionController();
$sessao->login($resultadoDaConsulta);
