<link rel="stylesheet" href="./CSS/estilo.css">
<link rel="shortcut icon" href="Assets/logo top.jfif" type="image/x-icon">
<?php
require_once 'Config/config.php';
require_once 'App\Controller\LoginController.php';

$userController = new UserController($pdo);

if (isset($_POST['nome']) &&
    isset($_POST['email']) &&
    isset($_POST['telefone']) &&
    isset($_POST['senha']))
{
    $userController->criarUser($_POST['nome'], $_POST['email'], $_POST['telefone'], $_POST['senha']);
    header('Location: #');
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Bookers©</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="Assets/letter-b.png" type="image/x-icon">
	<link rel="stylesheet" href="css/01login-registro.css">
	
</head>
<body>
	<?php
        if(isset($_SESSION['nao_autenticado'])):
    ?>
      
    <?php
        endif;
        unset($_SESSION['nao_autenticado']);
    ?>

<div class="bg">

<img class="logo" src="Assets/logo top.jfif">
<h1 class="title">Bem-vindo à<br>
    Biblioteca Virtual!<br>
    <span class="website">www.ourbookers.com.br </span>
</h1>
    
</div>
	<form method="POST">
	<h2>Registre-se</h2>
    <h3 class="subtitle">Se identifique para continuar:</h3>
	<input type="text" name="nome" placeholder="Nome" required>         
	<input type="email" name="email" placeholder="E-mail" required>
	<input type="tel" name="telefone" placeholder="Telefone" required>
	<input type="password" name="senha" placeholder="Senha" required>
	<button>			
	Registrar		
	</button>					
				<br><br>			
	<a href="login.php">					
	Logue na sua conta				
	</a>
	</form>	
	
	<a class="adm-button" id="adminButton">
        <img src="Assets/adm1.png">
    </a>
	<div class="modal-background" id="modalBackground"></div>
    <div id="adminModal" class="modal">
        <button class="close-button" id="closeBtn">&times;</button>
        <p>Esta página é apenas para administradores.</p>
        <button class="understood-button" id="understoodBtn">Entendi</button>
    </div>
    
	<script>
	 document.addEventListener('DOMContentLoaded', function() {
    var adminButton = document.getElementById('adminButton');
    var modal = document.getElementById('adminModal');
    var modalBackground = document.getElementById('modalBackground');

    adminButton.addEventListener('click', function() {
        modal.style.display = 'block';
        modalBackground.style.display = 'block';
    });

    document.getElementById('closeBtn').addEventListener('click', function() {
        modal.style.display = 'none';
        modalBackground.style.display = 'none';
    });

    document.getElementById('understoodBtn').addEventListener('click', function() {
        modal.style.display = 'none';
        modalBackground.style.display = 'none';
    });
});

</script>
</body>
</html>