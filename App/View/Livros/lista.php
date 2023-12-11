<!DOCTYPE html>
<html>
<head>
    <title>Lista de Livros</title>
</head>
<body>
    <fieldset>
        <legend><h1>Lista de Livros</h1></legend>
            <table border="1">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Categoria</th>
                        <th>Quantidade</th>
                    </tr>
                </thead>
                <?php foreach ($livros as $livro): ?>
                    <tbody>
                    <tr>
                            <td>
                                <?php
                                if (!empty($livro['imagem'])) {
                                    echo '<img src="' . $livro['imagem'] . '" alt="Imagem do Livro" width="100">';
                                } else {
                                    echo 'Sem Imagem';
                                }
                                ?>
                            </td>
                            <td><?php echo $livro['livro_id']; ?></td>
                            <td><?php echo $livro['nome']; ?></td>
                            <td><?php echo $livro['quantidade']; ?></td>
                        </tr>
                <?php endforeach; ?>
                <tbody>
            </table>
    </fieldset>
</body>
</html>