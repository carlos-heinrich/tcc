<link rel="stylesheet" href="CSS/users.css">
<?php
require_once 'Config/config.php';
require_once 'App/Controller/LoginADMController.php';

$loginADMController = new LoginADMController($pdo);

if (isset($_POST['nome']) && 
    isset($_POST['email']) &&
    isset($_POST['telefone']) &&
    isset($_POST['senha']) &&
    isset($_POST['tipo_usuario'])) 
{
    $loginADMController->criarLoginADM($_POST['nome'], $_POST['email'], $_POST['telefone'], $_POST['senha'], $_POST['tipo_usuario']);
    header('Location: #');
}

// Atualiza LoginADM
if (isset($_POST['id']) && isset($_POST['atualizar_nome']) && isset($_POST['atualizar_email']) && isset($_POST['atualizar_telefone']) && isset($_POST['atualizar_senha']) && isset($_POST['atualizar_tipo_usuario'])) {
    $loginADMController->atualizarLoginADM($_POST['id'], $_POST['atualizar_nome'], $_POST['atualizar_email'], $_POST['atualizar_telefone'], $_POST['atualizar_senha'], $_POST['atualizar_tipo_usuario']);
}

// Excluir LoginADM
if (isset($_POST['excluir_id'])) {
    $loginADMController->excluirLoginADM($_POST['excluir_id']);
}

$loginADMs = $loginADMController->listarLoginADMs();

?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD com MVC e PDO</title>
</head>
<body>
    <a href="indexAdm.php">Voltar</a>
    <h1>Usuários</h1>
    <form method="post">
        <input type="text" name="nome" placeholder="Nome Usuário" required>
        <input type="email" name="email" placeholder="E-mail" required>
        <input type="tel" name="telefone" placeholder="Telefone" required>
        <input type="password" name="senha" placeholder="Senha" required>
        <input type="number" name="tipo_usuario" placeholder="Nível de Permissão" required>
        <button type="submit">Adicionar Usuários</button>
    </form>

<?php
$loginADMController->exibirListaLoginADMs();
?>

<h2>Atualizar Usuários</h2>
    <form method="post">
        <select name="id">
        <?php foreach ($loginADMs as $loginADM): ?>
                                <option value="<?php echo $loginADM['id']; ?>"><?php echo $loginADM['id']; ?></option>
                                <?php endforeach; ?>
        </select>
                <input type="text" name="atualizar_nome" placeholder="Novo Nome" required>
                <input type="email" name="atualizar_email" placeholder="Nova E-mail" required>
                <input type="tel" name="atualizar_telefone" placeholder="Novo Telefone" required>
                <input type="password" name="atualizar_senha" placeholder="Nova Senha" required>
                <input type="number" name="atualizar_tipo_usuario" placeholder="Novo nível de Permissão" required>
        <button type="submit">Atualizar Usuários</button>
    </form>

    <h2>Excluir Usuários</h2>
    <form method="post">
        <select name="excluir_id">
            <?php foreach ($loginADMs as $loginADM): ?>
                <option value="<?php echo $loginADM['id']; ?>"><?php echo $loginADM['nome']; ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Excluir Usuários</button>
    </form>
</body>
</html>