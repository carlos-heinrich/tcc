<?php
require_once 'App/Model/LoginModel.php';


class UserController {
    private $userModel;

    public function __construct($pdo) {

        $this->userModel = new UserModel($pdo);
    }

    public function criarUser($nome, $email, $telefone, $senha) {
        $this->userModel->criarUser($nome, $email, $telefone, $senha);
    }
}
?>