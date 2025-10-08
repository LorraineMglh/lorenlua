<?php

include("conexao.php");
include("valida.php");

$cpf = $_POST["cpf"];

$sql = "delete from usuarios where cpf = ?";

$query = $conn->prepare($sql);

if ($query) {
    $query->bind_param("s", $cpf);

    if ($query->execute()) {
        header("Location: cadastroUsuarios.php");
    } else {
        echo "Erro ao atualizar usuário!";
    }
}
