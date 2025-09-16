<?php
    include("conexao.php");

    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];

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
?>