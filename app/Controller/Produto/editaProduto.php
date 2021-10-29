<?php



require_once '../../../vendor/autoload.php';

use App\Model\Produto;
use App\Controller\SessionController;

$instanciaSessao = new SessionController();
$sessao = $instanciaSessao->recuperarSessoes();

$produto = new Produto();
if (gettype($_POST['novoValor']) != 'integer' and $_COOKIE['campoParaAlteracao'] == 'quantidade') {
    echo "Apenas números permitidos" . PHP_EOL;
}
$produto->editarProduto($_POST['novoValor'], $_COOKIE['campoParaAlteracao'], $_COOKIE['idParaAlteracao']);
