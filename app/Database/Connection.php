<?php

namespace App\database;

use PDO;
use PDOException;

class Connection
{
    const HOST = '127.0.0.1';
    const USER = 'root';
    const SENHA = 'Laz260165';
    //const SENHA = 'Mysql123';
    const DB = 'php_login';

    private $conn;

    public function __construct()
    {
        $this->setConn();
    }

    public function setConn()
    {
        try{
            $this->conn = new PDO("mysql:host=".self::HOST. ";dbname=".self::DB, self::USER, self::SENHA); 
            $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        } catch(PDOException $e){
            die("ERRO: ".$e->getMessage());
        }
    }
    public function executar(string $query, array $params)
    {
        try{           
            $stmt = $this->conn->prepare($query);
            $stmt->execute($params);
            var_dump($stmt);
            return $stmt;
        } catch(PDOException $e){
            die('ERRO: '.$e->getMessage());
        }
    }
}
