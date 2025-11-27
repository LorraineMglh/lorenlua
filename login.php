<?php

include("conexao.php");
include("validarUsuario.php");

$cpf = $_POST['cpf'];
$senha = $_POST['senha'];

if (!validarCPF($cpf) || !validarSenha($senha))
{
    echo 'CPF ou senha inválidos!';
}

$sql= "select nome from usuarios where cpf='$cpf' and senha='$senha'";

if($resultado = $conn->query($sql)){
    $row = $resultado->fetch_assoc();

    if(isset($row) && $row['nome'] != ''){
        session_start();
        $_SESSION['nome'] = $row['nome'];
        $_SESSION['cpf'] = $_POST['cpf'];
        $_SESSION['senha'] = $_POST['senha'];
        header("Location: principal.php");
    } else {
        echo 'CPF ou senha incorretos!';
    }
} else {
    echo 'Erro no banco de dados!';
}
