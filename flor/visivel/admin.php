<!doctype html>
<?php

 //if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 
 // $_SESSION['usuario'] = $_POST['usuario'];
 //  $_SESSION['nomeusuario'] = $_POST['nomeusuario'];
 //} else {
 //  $usuario = $_POST['usuario'];
 // header("Location: login.php?erro=$usuario");
 // exit;
// }
require_once 'menu.php';
require "..\processadores\Autenticacao.php";


require_once('../processadores/conexao.php');
require_once('../Modelo/produto.php');
require_once('../Repositorio/ProdutoRepositorio.php');

$produtoRepositorio = new ProdutoRepositorio($conn);
$produtos = $produtoRepositorio->buscarTodos();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>FLORICULTURA</title>
</head>
<body>
    <header class="cbl">  
    <nav id="navbar" class="navbar order-last order-lg-0">
      <div class="container">
        <ul>
          <li><a href="index.php">home</a></li>
          <li><a href="login.php">login</a></li>
          <li><a href="cadastro.php">cadastro</a></li>
          <li><a href="#">admin</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </div>
  <main>
    <h2>Lista de Produtos</h2>
    <?php if (isset($_POST['codcad'])) { ?>
      <label for="codigo">Produto cadastrado com sucesso!</label>
    <?php } ?>
    <section class="container-table">
      <table>
        <thead>
          <tr>
            <th>Produto</th>
            <th>Tipo</th>
            <th>Valor</th>
            <th colspan="2">Ação</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($produtos as $produto) : ?>
            <tr>
              <td><?= $produto->getNome(); ?></td>
              <td><?= $produto->getTipo();  ?></td>
              <td>R$<?= $produto->getPreco(); ?></td>
              <td>
                <form action="editar-produto.php" method="POST">
                  <input type="hidden" name="id" value="<?= $produto->getId(); ?>"> 
                  <input type="hidden" name="nomeusuario" value="<?= $_SESSION['nomeusuario']; ?>">
                  <input type="hidden" name="usuario" value="<?= $_SESSION['usuario']; ?>">
                  <input type="submit" class="botao-editar" value="Editar">
                </form>

              </td>
              <td>
                <form action="excluir-produto.php" method="POST">
                  <input type="hidden" name="id" value="<?= $produto->getId(); ?>">
                  <input type="hidden" name="nomeusuario" value="<?= $_SESSION['nomeusuario']; ?>">
                  <input type="hidden" name="tipo" value="<?= $produto->getTipo(); ?>">
                  <input type="hidden" name="usuario" value="<?= $_SESSION['usuario']; ?>">
                  <input type="submit" class="botao-excluir" value="Excluir">
                </form>
              </td>
            </tr>
            <?php endforeach; ?>

        </tbody>
      </table>
            <form action="cadastrar-produto.php" method="POST">
              <input type="hidden" name="nomeusuario" value="<?= $_SESSION['nomeusuario']; ?>">
              <input type="hidden" name="usuario" value="<?= $_SESSION['usuario']; ?>">
              <input type="submit" class="botao-cadastrart" name="cadastrar" value="Cadastrar produto">
            </form>
      <form action="#" method="post">
        <input type="submit" class="botao-cadastrart" value="Baixar Relatório" />
      </form>
          </section>
      </main>
</body>
</html>