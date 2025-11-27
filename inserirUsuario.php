<?php

include("conexao.php");
include("valida.php");
include("validarUsuario.php");

$cpf = $_POST["cpf"];
$nome = $_POST["usuario"];
$senha = $_POST["senha"];

if (!validarNome($cpf) || !validarCPF($cpf) || !validarSenha($senha))
{
    echo 'Nome, CPF ou senha inválidos!';
}

$sql = "insert into usuarios (cpf, nome, senha) values (?, ?, ?)";

$query = $conn->prepare($sql);

if ($query) {
    $query->bind_param("sss", $cpf, $nome, $senha);

    if ($query->execute()) {
        header("Location: cadastroUsuarios.php");
    } else {
        echo "Erro ao inserir usuário!";
    }
}
