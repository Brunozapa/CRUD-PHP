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
            $query = "INSERT INTO produto VALUES (null, :nome, :quant, :preco, 1)";
            $stmt = $this->conn->setConn()->prepare($query);
            $stmt->bindParam(':nome', $params['nome'], PDO::PARAM_STR);
            $stmt->bindParam(':quant', $params['estoque'], PDO::PARAM_INT);
            $stmt->bindParam(':preco', $params['preco'], PDO::PARAM_STR);

            if ($stmt->execute()) {
                header('Location: ../../view/home.php');
            }

            die("não inseriu");
        } catch (PDOException $e) {
            die("ERRO: " . $e->getMessage());
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

            die("não deletou");
        } catch (PDOException $e) {
            die("ERRO: " . $e->getMessage());
        }
    }
}
