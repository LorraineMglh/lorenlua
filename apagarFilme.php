<?php

include("conexao.php");
include("valida.php");

$descricao = $_POST["descricao"];

$sql = "delete from filmes where descricao = ?";

$query = $conn->prepare($sql);

if ($query) {
    $query->bind_param("s", $descricao);

    if ($query->execute()) {
        header("Location: cadastroFilmes.php");
    } else {
        echo "Erro ao atualizar usuário!";
    }
}
