<?php
require_once 'App/Model/LoginADMModel.php';


class LoginADMController {
    private $loginADMModel;

    public function __construct($pdo) {

        $this->loginADMModel = new LoginADMModel($pdo);
    }

    public function criarLoginADM($nome, $email, $telefone, $senha, $tipo_usuario) {
        $this->loginADMModel->criarLoginADM($nome, $email, $telefone, $senha, $tipo_usuario);
    }

    public function listarLoginADMs() {
        return $this->loginADMModel->listarLoginADMs();
    }

    public function exibirListaLoginADMs() {
        $loginADMs = $this->loginADMModel->listarLoginADMs();
        include 'App/View/Usuarios/lista.php';
    }

    public function atualizarLoginADM($id, $nome, $email, $telefone, $senha, $tipo_usuario) {
        $this->loginADMModel->atualizarLoginADM($id, $nome, $email, $telefone, $senha, $tipo_usuario);
    }
    
    public function excluirLoginADM ($id) {
        $this->loginADMModel->excluirLoginADM($id);
    }
}
?>