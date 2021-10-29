<?php



require_once '../../../vendor/autoload.php';

use App\Model\Produto;
use App\Controller\SessionController;

$instanciaSessao = new SessionController();
$sessao = $instanciaSessao->recuperarSessoes();

$produto = new Produto();

if($_POST['nomeProduto']) $produto->editarProduto($_POST['nomeProduto'], "nome", 1);
if($_POST['estoqueProduto']) $produto->editarProduto($_POST['estoqueProduto'], "estoque",1);
if($_POST['precoProduto']) $produto->editarProduto($_POST['precoProduto'], "preco",1);