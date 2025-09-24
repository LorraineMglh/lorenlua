<?php

include("conexao.php");
include("valida.php");

$cpf = $_POST["cpf"];
$nome = $_POST["usuario"];
$senha = $_POST["senha"];

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
