<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/livros.css">
    <script src="Js/script.js"></script>
    <title>Document</title>
</head>
<body>
    <!-- ... your existing HTML content ... -->
</body>
</html>

<?php
require_once 'Config/config.php';
require_once 'App/Controller/LivroController.php';
require_once 'App/Controller/EmprestimoController.php';

session_start();

$livroController = new LivroController($pdo);
$emprestimoController = new EmprestimoController($pdo);

$livros = $livroController->listarLivros();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['emprestar'])) {
    $livroID = $_POST['livro_id'];
    $livroNome = $_POST['nome'];
    $usuarioNome = $_SESSION['usuarioNome'];

    $emprestimoController->emprestarLivro($livroID, $livroNome, $usuarioNome);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['devolver'])) {
    $livroID = $_POST['livro_id'];

    $emprestimoController->devolverLivro($livroID);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Public/Css/style.css">
    <script src="Js/script.js"></script>
    <title>Document</title>
</head>
<body>
    <header>
<div class='container2'>
    <?php include 'verifica_login.php'; ?>
   <div></li><h2>Olá <?php echo $_SESSION['usuarioNome'], "!"; ?> </h2><br></div>
	<nav>
    <ul>
         <li class="c"><a onclick="logout()">Sair</a></li>
        <li class="c"><a href="indexUser.php">Voltar</a></li>  
    </ul>
  </nav>
</header>  
    
    <h2 class="p">Lista de Livros</h2>
    <ul>
        <?php foreach ($livros as $livro): ?>
            <li>
            <?php
                    if (!empty($livro['imagem'])) {
                        echo '<img src="' . $livro['imagem'] . '" alt="Imagem do Livro" width="300">';
                        echo '<br>';
                    } else {
                        echo 'Sem Imagem';
                    }
                    ?>
                <?php echo $livro['nome']; ?>
                <br>
                <?php echo $livro['categoria']; ?> -
                <?php echo $livro['quantidade']; ?> 
                <form method="post" action="livro.php">
                    <input type="hidden" name="livro_id" value="<?php echo $livro['livro_id']; ?>">
                    <input type="hidden" name="nome" value="<?php echo $livro['nome']; ?>"><br>
                <button type="submit" name="emprestar">Emprestar</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>

    <h2>Livros Emprestados</h2>
    <ul>
        <?php $livrosEmprestados = $emprestimoController->listarLivrosEmprestados($_SESSION['usuarioNome']); ?>
        <?php foreach ($livrosEmprestados as $emprestimo): ?>
            <li>
                <?php echo "ID do Livro: " . $emprestimo['livro_emprestimo']; ?> <br>
                <?php echo "Livro: " . $emprestimo['nome_livro']; ?> <br>
                <?php echo "Nome do Usuário: " . $emprestimo['aluno_emprestimo']; ?>
                <form method="post" action="livro.php">
                    <input type="hidden" name="livro_id" value="<?php echo $emprestimo['emprestimo_id']; ?>">
                    <button type="submit" name="devolver">Devolver</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
