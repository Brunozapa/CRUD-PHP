<?php

require 'vendor\autoload.php';

use App\controller\AutenticaUsuario;
use App\Model\Usuario;
include ('.\view\login.php');

$login = $_POST['login'];
$senha = $_POST['senha'];

try{
    if(isset($login, $senha)){
        new AutenticaUsuario($login, $senha);
    }
} catch(Exception $e){
    die('ERRO: '. $e.$this->getMessage());
}