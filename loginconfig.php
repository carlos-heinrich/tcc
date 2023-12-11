<?php
session_start();
include 'Config/config.php';

if(isset($_POST['nome']))  {
    $usuario = $_POST['nome'];
    $senha = $_POST['senha'];

    $query = "SELECT * FROM usuarios WHERE nome = :usuario AND senha = :senha";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
    $stmt->bindParam(':senha', $senha, PDO::PARAM_STR);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if($user) {
        $_SESSION['usuarioId'] = $user['id'];
        $_SESSION['usuarioEmail'] = $user['email'];
        $_SESSION['usuarioNome'] = $user['nome'];
        $_SESSION['usuarioTipo'] = $user['tipo_usuario'];

        if ($_SESSION['usuarioTipo'] == "1") {
            header("Location: indexAdm.php");
        } elseif ($_SESSION['usuarioTipo'] == "2") {
            header("Location: indexUser.php");
        }
    } else {
        $_SESSION['nao_autenticado'] = true;
        header('Location: login.php');
        exit();
    }
}