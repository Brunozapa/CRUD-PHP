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

}