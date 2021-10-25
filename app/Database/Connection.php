<?php

namespace App\database;

use PDO;
use PDOException;

//use Mysqli; // arruma a ambiquidade em "new mysqli" causada pelo namespace

class Connection
{
    const HOST = '127.0.0.1';
    const USER = 'root';
    const SENHA = 'Mysql123';
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
            echo "Conexão feita com sucessso!" . PHP_EOL;
            return $this->conn;
        } catch(PDOException $e){
            die("ERRO: ".$e->getMessage());
        }

        /*
        $this->conn = new \mysqli(self::HOST, self::USER, self::SENHA, self::DB);
        if ($this->conn->connect_error) {
            die('Connect Error (' . $this->conn->connect_errno . ') ' . $this->conn->connect_error);
        }
        echo $this->conn->host_info; 
        */
    }
    
    public function stopConn()
    {
        
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
