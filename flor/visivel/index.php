<?php
session_start();
if (!isset($_SESSION["usuario"]) ) {
  if (!isset($_POST['usuario'])){
      $usuario =  $_POST['usuario'];
      header("Location: login.php?erro=usuario não logado!");
      exit;
  
  }
  $_SESSION['usuario'] = $_POST['usuario'];
  $_SESSION['nomeusuario'] = $_POST['nomeusuario'];
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
      <div class="container">
        <ul>
          <li><a class="#" href="index.php">home</a></li>
          <li><a href="login.php">login</a></li>
          <li><a href="cadastro.php">cadastro</a></li>
          <form id="adminForm" action="admin.php" method="POST" style="display: none;">

                    <input type="hidden" name="usuario" value="<?= $_SESSION['usuario']; ?>">
                    <input type="hidden" name="nomeusuario" value="<?= $_SESSION['nomeusuario']; ?>">
                </form>
          <li><a href="admin.php"  onclick="enviarParaAdmin();">admin</a></li>

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </div>
    
        
    
      </nav><!-- .navbar -->
      <?php 
      include 'menu.php';
      ?>

    </header>
   <section id="menu1" class="menu1">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Catálogo de flores</h2>
          <p>ESCOLHA SUA FLOR</p>
        </div>

        <div class="tab-content" data-aos="fade-up" data-aos-delay="300">

          <div class="tab-pane fade active show" id="menu-starters">

            <div class="tab-header text-center">
              <p class="p1">Catálogo</p>
              <h3>FLORES</h3>
            </div>

            <div class="row gy-5">

              <div class="col-lg-4 menu-item">
                <a href="../assets/imagens/flor1.jpg" class="glightbox"><img src="../assets/imagens/flor1.jpg" class="menu-img img-fluid" alt=""></a>
                <h4>Flor branca</h4>
                <p class="ingredients">
                  
                </p>
                <p class="price">
                  R$10,00
                </p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <a href="../assets/imagens/tulipa.jpg" class="glightbox"><img src="../assets/imagens/tulipa.jpg" class="menu-img img-fluid" alt=""></a>
                <h4>Tulipas brancas</h4>
                <p class="price">
                  R$30,00
                </p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <a href="../assets/imagens/buque.jpg" class="glightbox"><img src="../assets/imagens/buque.jpg" class="menu-img img-fluid" alt=""></a>
                <h4>Buquê de rosas</h4>
                <p class="price">
                  R$300,00
                </p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <a href="../assets/imagens/flor4.jpg" class="glightbox"><img src="../assets/imagens/flor4.jpg" class="menu-img img-fluid" alt=""></a>
                <h4>Flor veludo</h4>
                <p class="price">
                  R$150,00
                </p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <a href="../assets/imagens/flor5.jpg" class="glightbox"><img src="../assets/imagens/flor5.jpg" class="menu-img img-fluid" alt=""></a>
                <h4>Flores de Margarida</h4>
                <p class="price">
                  R$90,00
                </p>
              </div><!-- Menu Item -->

    </section><!-- End Menu Section -->
    <footer class="rodape"></footer>
</body>
<script>
        function enviarParaAdmin() {
            document.getElementById('adminForm').submit();
        }
</script>
<script>

        function voltar() {
            window.history.back(); // Isso retorna para a página anterior no histórico do navegador
        }
    </script>
    <script>
        function enviarParaInicio() {
            document.getElementById('inicioForm').submit();
        }
    </script>

</html>