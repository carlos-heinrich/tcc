<!DOCTYPE html>
<html lang="en">
<link rel="shortcut icon" href="Assets/logo top.jfif" type="image/x-icon">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/adm.css">
    <link rel="shortcut icon" href="Assets/logo top.jfif" type="image/x-icon">
    <script src="JS/script.js"></script>
    <title>Document</title>
</head>
<body>
<header>
    <div class="container"><?php
        session_start();
        include 'verifica_login.php'
    ?>
    <div></li><h2>Olá <?php echo $_SESSION['usuarioNome'] , "!"; ?> </h2><br></div>
    <nav>
    <ul style="list-style: none;  ">
    <li style="list-style: none; "><a onclick="logout()">Sair</a></li>
  
    <li style="list-style: none; "><a href="Users.php" style="color:red">Cadastro de Usuários</a></li>
    <li style="list-style: none; "><a href="Books.php" style="color:orange">Cadastro de Livros</a></li>
    <li style="list-style: none; "><a href="lista.php" style="color:yellow">Lista</a></li>
    </ul>
  </nav>
</header> 
</body>
</html>