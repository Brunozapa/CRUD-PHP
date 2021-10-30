<?php

namespace App\Model;

use App\database\Connection;
use PDO;
use PDOException;

class Loja
{

    private $idUsuario;
    private $login;
    private $senha;
    private $conn;
    public function __construct()
    {
        $this->conn = new Connection();
    }

    public function autenticarLoja(array $params): array
    {
        try {
            $query = "SELECT idLoja, nome, email, senha FROM loja WHERE email = ? AND senha = ?";
            $stmt = $this->conn->setConn()->prepare($query);
            $stmt->execute($params);

            if ($stmt->rowCount() == 0) {
                return [];
            }

            $user = $stmt->fetch();
            unset($user['senha'], $user[3]); // remove senha do array

            return $user;
        } catch (PDOException $e) {
            die('ERRO: ' . $e->getMessage());
        }
    }

    public function cadastrarLoja(array $params)
    {
        $paramAuxiliar = array($params['email'], $params['senha']);
        try {
            $query = "SELECT idLoja, nome, email, senha FROM loja WHERE email = :email AND senha = :senha";
            $stmt = $this->conn->setConn()->prepare($query);
            $stmt->bindParam(":email", $paramAuxiliar['email'], PDO::PARAM_STR);
            $stmt->bindParam(":senha", $paramAuxiliar['senha'], PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll();
            var_dump($result);
            if (!empty($result)) {
                die("Esse usuario já existe!");
            }

            $query = "INSERT INTO loja VALUES (NULL,:nome,:email,:senha)";
            $stmt = $this->conn->setConn()->prepare($query);
            $stmt->bindParam(":nome", $params['nome'], PDO::PARAM_STR);
            $stmt->bindParam(":email", $params['email'], PDO::PARAM_STR);
            $stmt->bindParam(":senha", $params['senha'], PDO::PARAM_STR);

            if ($stmt->execute()) {
                echo "execute";
                header('Location: ../../view/login.php');
                die();
            }

            header('Location: ../../view/cadastro.php');
        } catch (PDOException $e) {
            die('ERRO: ' . $e->getMessage());
        }
    }
}
