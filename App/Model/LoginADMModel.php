<?php
class LoginADMModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function criarLoginADM($nome, $email, $telefone, $senha, $tipo_usuario) {
        $sql = "INSERT INTO usuarios (nome, email, telefone, senha, tipo_usuario) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$nome, $email, $telefone, $senha, $tipo_usuario]);
    }

    public function listarLoginADMs() {
        $sql = "SELECT * FROM usuarios";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function atualizarLoginADM($id, $nome, $email, $telefone, $senha, $tipo_usuario){
        $sql = "UPDATE usuarios SET nome = ?, email = ?, telefone = ?, senha = ?, tipo_usuario = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$nome, $email, $telefone, $senha, $tipo_usuario, $id]);
    }
    
    public function excluirLoginADM($id) {
        $sql = "DELETE FROM usuarios WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
    }
    
}
?>