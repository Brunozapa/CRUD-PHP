<?php

namespace App\Model;

use App\database\Connection;

class Usuario{
    
    private $idUsuario;
    private $login;
    private $senha;
    private $conn;
    public function __construct()
    {
        $this->conn = new Connection();
    }

    public function autenticarUsuario(string $login, string $senha)
    {
        $params = array($login, $senha);
        try{

            $query = "SELECT idUsuario, login, senha FROM usuario WHERE login = ? AND senha = ?";
            $stmt = $this->conn->setConn()->prepare($query);
            $stmt->execute($params);

            if($stmt->rowCount() == 0){
                echo "deu ruim.";
                header('Location: login.php');
                die();
            }
            echo "deu bom";
            $user = $stmt->fetch();
            session_start();
            $_SESSION['usuario'] = $user['idUsuario'];
            //header('Location: home.php');
            echo "aa";

        } catch(PDOException $e){
            die('ERRO: '.$e->getMessage());
        }
//        if(!$user){
//            echo "deu ruim.".die();
//        }
//        echo "deu bom";
//        $user = $result->fetch();
//        session_start();
//        $_SESSION['usuario'] = $user['idUsuario'];
    }
}