<?php

include("conexao.php");
include("valida.php");

$generoAnterior = $_POST["generoAnterior"];
$genero = $_POST["genero"];
$descricao = $_POST["descricao"];

$sql = "update generos set genero = ?, descricao = ? where genero = ?";

$query = $conn->prepare($sql);

if ($query) {
    $query->bind_param("sss", $genero, $descricao, $generoAnterior);

    if ($query->execute()) {
        header("Location: cadastroGeneros.php");
    } else {
        echo "Erro ao atualizar usuário!";
    }
}
