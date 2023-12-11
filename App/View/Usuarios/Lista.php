<!DOCTYPE html>
<html>
<head>
    <title>Lista de Users</title>
</head>
<body>
    <fieldset>
        <legend><h1>Lista de Users</h1></legend>
            <table border="1">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>Senha</th>
                        <th>Níveis de Permissão</th>
                    </tr>
                </thead>
                <?php foreach ($loginADMs as $loginADM): ?>
                    <tbody>
                        <tr>
                            <td><?php echo $loginADM['id']; ?></td>
                            <td><?php echo $loginADM['nome']; ?></td>
                            <td><?php echo $loginADM['email']; ?></td>
                            <td><?php echo $loginADM['telefone']; ?></td>
                            <td><?php echo $loginADM['senha']; ?></td>
                            <td><?php echo $loginADM['tipo_usuario']; ?></td>
                        </tr>
                <?php endforeach; ?>
                <tbody>
            </table>
    </fieldset>
</body>
</html>