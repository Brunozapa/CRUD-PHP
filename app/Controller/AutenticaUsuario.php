<?php

namespace App\controller;

use App\database\Connection;

//include('..\view\login.php');

class AutenticaUsuario
{

    private $login;
    private $senha;

    public function __construct(string $login, string $senha)
    {
        $this->login = $login;
        $this->senha = $senha;
        $this->autenticacao();
    }

    private function autenticacao()
    {
        $query = "SELECT idUsuario, login, senha FROM usuario WHERE login = ? AND senha = ?";
        $conn = new Connection();
        $conn->execute($query,array($this->login, $this->senha));

        
    }
}