<?php

include("conexao.php");
include("valida.php");

$genero = $_POST["genero"];
$descricao = $_POST["descricao"];

$sql = "insert into filmes (genero, descricao) values (?, ?)";

$query = $conn->prepare($sql);

if ($query) {
    $query->bind_param("ss", $genero, $descricao);

    if ($query->execute()) {
        header("Location: cadastroFilmes.php");
    } else {
        echo "Erro ao inserir usuário!";
    }

    $query->close();
}
