<!DOCTYPE html>
<html>

<head>
    <title>Menu do Usuário</title>

    <link rel="stylesheet" href="../assets/css/menu.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="menu1">
        
    
            <div class="user-name"><?php echo $_SESSION["nomeusuario"]; ?></div>

            <div class="dropdown-content">
                <!-- Conteúdo do dropdown -->
                <form id="inicioForm" action="index.php" method="post" style="display: none;">

                    <input type="hidden" name="usuario" value="<?= $_SESSION['usuario']; ?>">
                    <input type="hidden" name="nomeusuario" value="<?= $_SESSION['nomeusuario']; ?>">
                </form>
                <a class="dropdown-item" href="#" onclick="enviarParaInicio();">Início</a>

                <a class="dropdown-item" href="#">Perfil</a>
                <a class="dropdown-item" href="#">Configurações</a>

                <!-- Use um formulário para redirecionar para admin.php -->
                <form id="adminForm" action="admin.php" method="post" style="display: none;">

                    <input type="hidden" name="usuario" value="<?= $_SESSION['usuario']; ?>">
                    <input type="hidden" name="nomeusuario" value="<?= $_SESSION['nomeusuario']; ?>">
                </form>
                <!-- Passa os dados diretamente para o JavaScript -->
                <a class="dropdown-item" href="#" onclick="enviarParaAdmin();">Admin</a>

                <a class="dropdown-item" href="#" onclick="logout();">Sair</a>
            </div>
    
        <!--<button class="logout-button" onclick="voltar()">Voltar</button> -->
    </div>
    <script>
        function enviarParaAdmin() {
            document.getElementById('adminForm').submit();
        }


        function voltar() {
            window.history.back(); // Isso retorna para a página anterior no histórico do navegador
        }
    </script>
    <script>
        function enviarParaInicio() {
            document.getElementById('inicioForm').submit();
        }
    </script>
    <script>
        function logout() {
            // Aqui você pode adicionar lógica para encerrar a sessão, por exemplo:
            // session_start();
            // <?php session_destroy(); ?>

            // Redireciona para a página de login
            window.location.href = 'login.php';
        }
    </script>
</body>
</html>