<?php

function validarCPF($cpf) {
    $cpf = preg_replace('/\D+/', '', $cpf);

    if (strlen($cpf) !== 11) {
        return false;
    }

    if (preg_match('/^(\d)\1{10}$/', $cpf)) {
        return false;
    }

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

    return true;
}

function validarSenha($senha) {
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

function validarNome($nome) {
    return strlen($nome) >= 3;
}