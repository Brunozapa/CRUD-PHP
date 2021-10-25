<?php
session_start();
require 'vendor\autoload.php';

use App\controller\AutenticaUsuario;
use App\Model\Usuario;
include ('view\login.php');

$login = $_POST['login'];
$senha = $_POST['senha'];

try{
    if(isset($login, $senha)){
       $user = new Usuario();
       $user->autenticarUsuario($login, $senha);
    }
} catch(Exception $e){
    die('ERRO: '. $e.$this->getMessage());
}