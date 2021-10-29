<?php

namespace App\Controller;

session_start();

class SessionController
{
    public function verificarLogin()
    {

        if (sizeof($_SESSION) == 0) {
            header('Location: ../../view/login.php');
        }
    }
    public function logout()
    {
        session_unset();

        header('Location: /../../index.php');
    }
    public function login(array $resultadoDaConsulta)
    {
        $_SESSION['logged'] = true;
        $_SESSION['id'] = $resultadoDaConsulta['idLoja'];
        $_SESSION['email'] = $resultadoDaConsulta['email'];
        $_SESSION['nome'] = $resultadoDaConsulta['nome'];
        var_dump($_SESSION);
        header('Location: ../../view/home.php');
    }
    public function recuperarSessoes()
    {
        return $_SESSION;
    }
}
