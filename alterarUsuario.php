<?php

include("conexao.php");
include("valida.php");

$cpf = $_POST["cpf"];
$nome = $_POST["usuario"];
$senha = $_POST["senha"];
$cpfAnterior = $_POST["cpfAnterior"];

$sql = "update usuarios set cpf = ?, senha = ?, nome = ? where cpf = ?";

$query = $conn->prepare($sql);

if ($query) {
    $query->bind_param("ssss", $cpf, $nome, $senha, $cpfAnterior);

    if ($query->execute()) {
        header("Location: cadastroUsuarios.php");
    } else {
        echo "Erro ao atualizar usuário!";
    }
}
