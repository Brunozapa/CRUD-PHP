<?php

namespace App\Model;

use App\database\Connection;
use PDO;
use PDOException;

class Produto
{
    private int $idProduto;
    private string $nome;
    private int $quantidade;
    private float $preco;
    private Loja $Loja;

    private $conn;

    public function __construct()
    {
        $this->conn = new Connection();
    }

    public function adicionarProduto(array $params)
    {
        try {
            $query = "INSERT INTO produto VALUES (null, ?, ?, ?, ?)";
            $stmt = $this->conn->setConn()->prepare($query);

            if ($stmt->execute($params)) {
                die("inserido!");
            }

            dir("não inseriu");
        } catch (PDOException $e) {
            dir("ERRO: " . $e->getMessage());
        }
    }
    public function deletarProduto(int $idProduto)
    {
        try {
            $query = "DELETE FROM produto WHERE idProduto = :id";
            $stmt = $this->conn->setConn()->prepare($query);
            $stmt->bindParam(':id', $idProduto, PDO::PARAM_INT);

            if ($stmt->execute()) {
                die("deletou!");
            }

            dir("não deletou");
        } catch (PDOException $e) {
            dir("ERRO: " . $e->getMessage());
        }
    }
}
