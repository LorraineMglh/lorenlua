<?php

include("conexao.php");
include("valida.php");
include("validarFilme.php");

$nome = $_POST["nome"];
$ano = $_POST["ano"];
$genero = $_POST["genero"];
$nomeAnterior = $_POST["cpfAnterior"];

if (!validarNome($nome) || !validarAno($ano))
{
    echo 'Nome ou ano inválidos!';
}

$sql = "update filmes set nome = ?, ano = ?, genero = ? where nome = ?";

$query = $conn->prepare($sql);

if ($query) {
    $query->bind_param("ssss", $nome, $ano, $genero, $nomeAnterior);

    if ($query->execute()) {
        header("Location: cadastroUsuarios.php");
    } else {
        echo "Erro ao atualizar usuário!";
    }
}
