<?php
if(!$_SESSION['usuarioEmail'] or !$_SESSION['usuarioNome']) {
    header('Location: login.php');
    exit();
}