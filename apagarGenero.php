<?php

include("conexao.php");
include("valida.php");

$genero = $_POST["genero"];

$sql = "delete from generos where genero = ?";

$query = $conn->prepare($sql);

if ($query) {
    $query->bind_param("s", $nome);

    if ($query->execute()) {
        header("Location: cadastroFilmes.php");
    } else {
        echo "Erro ao atualizar usuário!";
    }
}
