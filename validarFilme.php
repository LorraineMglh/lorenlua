<?php

function validarNome($nome) {
    return strlen($nome) >= 3;
}

function validarAno($ano) {
    $atual = (int) date("Y");
    $anoNumero = (int) $ano;
    return $anoNumero >= 1900 && $anoNumero <= $atual;
}
