<?php

namespace App\Model;

use App\database\Connection;
use Exception;
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

    public function adicionarProduto(array $params, int $fkLoja)
    {
        try {
            $query = "INSERT INTO produto VALUES (null, :nome, :estoque, :preco, :loja)";
            $stmt = $this->conn->setConn()->prepare($query);
            $stmt->bindParam(':nome', $params['nome'], PDO::PARAM_STR);
            $stmt->bindParam(':estoque', $params['estoque'], PDO::PARAM_INT);
            $stmt->bindParam(':preco', $params['preco'], PDO::PARAM_STR);
            $stmt->bindParam(':loja', $fkLoja, PDO::PARAM_INT);
            $stmt->execute();
            header('Location: ../../../view/home.php');
        } catch (PDOException $e) {
            die("ERRO: " . $e->getMessage());
        }
    }
    public function deletarProduto(string $idProduto)
    {
        
        try {
            $query = "DELETE FROM produto WHERE idProduto = :id";
            $stmt = $this->conn->setConn()->prepare($query);
            $stmt->bindParam(':id', intval($idProduto), PDO::PARAM_INT);
            $stmt->execute();
            header('Location: /view/home.php');

            throw new Exception('Falha ao deletar o produto');
            

        } catch (PDOException $e) {
            die("ERRO: " . $e->getMessage());
        }
    }
    public function recuperarProdutos(int $idLoja)
    {
        try {
            $query = "SELECT idProduto as idProduto, nome as nome, quantidade as quantidade, preco as preco, fkLoja as lojaProduto FROM produto WHERE fkLoja = :loja";
            $stmt = $this->conn->setConn()->prepare($query);
            $stmt->bindParam(':loja', $idLoja, PDO::PARAM_INT);
            $stmt->execute();

            $result = array();
            foreach ($stmt->fetchAll() as $key => $value) {

                for ($i = 0; $i < (sizeof($value) / 2); $i++) {
                    unset($value[$i]);
                }
                $result[$key] = $value;
            }

            return $result;
        } catch (PDOException $e) {
            die("ERRO: " . $e->getMessage());
        }
    }
    public function editarProduto(string $novoValor, string $campo, int $idProduto)
    {
        try {
            $query = '';
            switch ($campo) {
                case "nome":
                    $query = "UPDATE produto SET nome = :novoValor WHERE idProduto = :id";
                    break;
                case"quantidade":
                    $query = "UPDATE produto SET quantidade = :novoValor WHERE idProduto = :id";
                    break;
                case"preco":
                    $query = "UPDATE produto SET preco = :novoValor WHERE idProduto = :id";
                    break;
                default:
                        throw new Exception('Campo inválido');
                }
                $stmt = $this->conn->setConn()->prepare($query);
                $stmt->bindParam(':novoValor', $novoValor, PDO::PARAM_STR);
                $stmt->bindParam(':id', $idProduto, PDO::PARAM_INT);
                $stmt->execute();
    
                header('Location: /view/home.php');

        } catch (PDOException $e) {
            die("ERRO: " . $e->getMessage());
        }
    }
}
