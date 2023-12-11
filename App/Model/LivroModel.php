<?php
class LivroModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Model para criar Livros
    public function criarLivro($nome, $categoria, $quantidade, $imagem) {
        $sql = "INSERT INTO livros (nome, categoria, quantidade, imagem) VALUES (?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$nome, $categoria, $quantidade, $imagem]);
    }

    // Model para listar Livros
    public function listarLivros() {
        $sql = "SELECT * FROM livros";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Model para atualizar Livros
    public function atualizarLivro($livro_id, $nome, $categoria, $quantidade){
        $sql = "UPDATE livros SET nome = ?, categoria = ?, quantidade = ? WHERE livro_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$nome, $categoria, $quantidade, $livro_id]);
    }
    
    // Model para deletar Livro
    public function excluirLivro($livro_id) {
        $sql = "DELETE FROM livros WHERE livro_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$livro_id]);
    }
    public function consultarQuantidade($livroID) {
        $consultaLivro = $this->pdo->prepare("SELECT quantidade FROM livros WHERE livro_id = ?");
        $consultaLivro->execute([$livroID]);
        return $consultaLivro->fetch(PDO::FETCH_ASSOC);
    }

    public function atualizarQuantidade($livroID, $novaQuantidade) {
        $atualizarQuantidade = $this->pdo->prepare("UPDATE livros SET quantidade = ? WHERE livro_id = ?");
        $atualizarQuantidade->execute([$novaQuantidade, $livroID]);
    }
}
?>