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
          <li><a href="#">login</a></li>
          <li><a href="cadastro.php">cadastro</a></li>
          <li><a href="cadastrar-produto.php">cadastro de produtos</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </header>
   <main class="menu">
    
   <div class="form">
      <form method="post" action="../processadores/processar-login.php">

        <label for="email">E-mail</label>
        <input type="email" id="email" name="email" placeholder="Digite o seu e-mail" required>

        <label for="senha">Senha</label>
        <input type="password" id="senha" name="senha" placeholder="Digite a sua senha" required>

        <input type="submit" class="botao-cadastrar" name="entrar" value="Entrar" />
        <?php if (isset($_GET["erro"])){ ?>
          <label for="senha">Usuário ou senha inválidos</label>
        <?php }?>
      </form>
      <form action="cadastro.php" method="post">
        <input type="submit" name="cadastro" class="botao-cadastro" value="Usuário novo">
        </form>

  
    </div>
  


    
   </main>
    <footer class="rodape"></footer>
</body>
</html>