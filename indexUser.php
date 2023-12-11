<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="JS/script.js"></script>
    <link rel="stylesheet" href="CSS/est.css">
    <link rel="shortcut icon" href="Assets/logo top.jfif" type="image/x-icon">
    <title>Document</title>
</head>
<body>
<header>
<div class='container'><?php
        session_start();
        include 'verifica_login.php'
    ?>
   <div></li><h2>Olá <?php echo $_SESSION['usuarioNome'] , "!"; ?> </h2><br></div>
	<nav>
    <ul style="list-style: none;  ">
        <li style="list-style: none; "><a href="livro.php">Livros</a></li><br>
        <li style="list-style: none; "><a onclick="logout()">Sair</a></li>
    </ul>
  </nav>
</header>  
</body>
</html>