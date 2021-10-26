<?php

namespace App\Model;

use App\database\Connection;
use PDO;
class Loja{
    
    private $idUsuario;
    private $login;
    private $senha;
    private $conn;
    public function __construct()
    {
        $this->conn = new Connection();
    }

    public function autenticarUsuario(array $params)
    {
        var_dump($params);
        try{

            $query = "SELECT idLoja, nome, email, senha FROM loja WHERE email = ? AND senha = ?";
            $stmt = $this->conn->setConn()->prepare($query);
            $stmt->execute($params);

            if($stmt->rowCount() == 0){
                echo "deu ruim.";
                header('Location: login.php');
                die();
            }
            $user = $stmt->fetch();
            //session_start();
            $_SESSION['usuario'] = $user['idUsuario'];
            header('Location: view\home.php');
            echo "deu bom";
        } catch(PDOException $e){
            die('ERRO: '.$e->getMessage());
        }
    }

    public function cadastrarUsuario(array $params)
    {
        var_dump($params);
        $paramAuxiliar = array($params['email'], $params['senha']);
        var_dump($paramAuxiliar);
        try{
            $query = "SELECT idLoja, nome, email, senha FROM loja WHERE email = :email AND senha = :senha";
            $stmt = $this->conn->setConn()->prepare($query);
            $stmt->bindParam(":email", $paramAuxiliar['email'], PDO::PARAM_STR);
            $stmt->bindParam(":senha", $paramAuxiliar['senha'], PDO::PARAM_STR);
            $stmt->execute();

            if($stmt->rowCount() > 0){
                return "já existe esse usuario";
            }

            $query = "INSERT INTO loja VALUES (NULL,:nome,:email,:senha)";
            $stmt = $this->conn->setConn()->prepare($query);
            $stmt->bindParam(":nome", $params['nome'], PDO::PARAM_STR);
            $stmt->bindParam(":email", $params['email'], PDO::PARAM_STR);
            $stmt->bindParam(":senha", $params['senha'], PDO::PARAM_STR);

            if($stmt->execute()){

                header('Location: view\login.php');
                return "cadastrado com sucesso";
            }

            header('Location: cadastro.php');
            return "falha ao cadastrar";

        } catch(PDOException $e){
            die('ERRO: '.$e->getMessage());
        }
    }



}