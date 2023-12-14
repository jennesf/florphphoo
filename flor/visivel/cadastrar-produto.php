<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $nomeusuario = $_POST['nomeusuario'];
    // Configura as variáveis de sessão, se necessário
    $_SESSION['usuario'] = $usuario;
    $_SESSION['nomeusuario'] = $nomeusuario;
} else {
    header("Location: login.php");
    exit;
}
require_once 'menu.php';
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
        <ul>
          <li><a class="index.php" href="index.php">home</a></li>
          <li><a href="login.php">login</a></li>
          <li><a href="cadastro.php">cadastro</a></li>
          <li><a href="#">cadastro de produtos</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </header>
   <main class="menu2">
        <h1>Cadastro de Produtos</h1>
        <section class="container-form">
            <form action="../processadores/processar-produtos.php" method="POST" enctype="multipart/form-data">

                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nomeP" placeholder="Digite o nome do produto" required>
                <div class="container-radio">
                    <div>
                        <label for="flor">Flor</label>
                        <input type="radio" id="flor" name="tipo" value="Flor" checked>
                    </div>
                </div>
                <label for="preco">Preço</label>
                <input type="text" id="preco" name="preco" placeholder="Digite um preço" required>

                <label for="imagem">Envie uma imagem do produto</label>
                <input type="file" name="imagem" accept="image/*" id="imagem" placeholder="Envie uma imagem">
                <input type='hidden' name='nomeusuario' value=<?= $_SESSION['nomeusuario']; ?>>
                <input type='hidden' name='usuario' value=<?= $_SESSION['usuario']; ?>>
                <input type="submit" name="cadastro" class="botao-cadastrart" value="Cadastrar produto" />

            </form>

        </section>
    <!-- <div class="form">
        <form action="../processadores/processar-produtos.php" method="POST">
            <label for="imagem">Envie uma imagem do produto</label>
            <input type="file" name="imagem" accept="image/*" id="imagem" placeholder="Envie uma imagem">

            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" placeholder="Digite o nome do produto" required>
            
            <label for="preco">Preço</label>
            <input type="text" id="preco" name="preco" placeholder="Digite o preço do produto" required>

            <input type="submit" name="cadastro" class="botao-cadastro" value="Cadastrar produto"/>
        </form>
    
</div> -->
</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js" integrity="sha512-Rdk63VC+1UYzGSgd3u2iadi0joUrcwX0IWp2rTh6KXFoAmgOjRS99Vynz1lJPT8dLjvo6JZOqpAHJyfCEZ5KoA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="js/index.js"></script>
</body>
</html>
