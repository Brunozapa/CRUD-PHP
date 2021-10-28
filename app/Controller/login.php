<?php
session_start();

require '../../vendor/autoload.php';

use App\Model\Loja;
var_dump($_SESSION);
//if($_SESSION['logged'] == true) header('Location: home.php');  

$usuario = new Loja();

$email = $_POST['email'];
$senha = $_POST['senha'];

$result = $usuario->autenticarLoja(array($_POST['email'], $_POST['senha']));
//echo"cc";
if (!empty($result)) {
    $_SESSION['logged'] = true;
    $_SESSION['id'] = $result['idLoja'];
    $_SESSION['email'] = $result['email'];
    $_SESSION['nome'] = $result['nome'];
    header('Location: ../../view/home.php');
    echo"bb";
    die();
}
var_dump($_SESSION);

header('Location: ../../view/login.php');


