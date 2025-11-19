<?php
    include("conexao.php");

    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];

    if (!validarCPF($cpf) || !validarSenha($senha))
    {
        echo 'CPF ou senha inválidos!';
    }

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

function validarCPF($cpf) {
    // Remove caracteres não numéricos
    $cpf = preg_replace('/\D+/', '', $cpf);

    // Verifica se o CPF tem 11 dígitos
    if (strlen($cpf) !== 11) {
        return false;
    }

    // Impede sequências de dígitos iguais, ex: "11111111111"
    if (preg_match('/^(\d)\1{10}$/', $cpf)) {
        return false;
    }

    // --- Cálculo do primeiro dígito verificador ---
    $soma = 0;
    for ($i = 1; $i <= 9; $i++) {
        $soma += intval(substr($cpf, $i - 1, 1)) * (11 - $i);
    }
    $resto = ($soma * 10) % 11;

    if ($resto === 10 || $resto === 11) {
        $resto = 0;
    }
    if ($resto !== intval(substr($cpf, 9, 1))) {
        return false;
    }

    // --- Cálculo do segundo dígito verificador ---
    $soma = 0;
    for ($i = 1; $i <= 10; $i++) {
        $soma += intval(substr($cpf, $i - 1, 1)) * (12 - $i);
    }
    $resto = ($soma * 10) % 11;

    if ($resto === 10 || $resto === 11) {
        $resto = 0;
    }
    if ($resto !== intval(substr($cpf, 10, 1))) {
        return false;
    }

    return true; // CPF válido
}

function validarSenha($senha) {
    // Count matches or default to 0 if none found
    $uppercaseCount    = preg_match_all('/[A-Z]/', $senha, $matches);
    $lowercaseCount    = preg_match_all('/[a-z]/', $senha, $matches);
    $specialCharsCount = preg_match_all('/[^0-9a-zA-Z]/', $senha, $matches);

    return (
        strlen($senha) >= 6 &&
        $uppercaseCount >= 1 &&
        $lowercaseCount >= 1 &&
        $specialCharsCount >= 1
    );
}