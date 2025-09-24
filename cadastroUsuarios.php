<?php
    include ("valida.php");
?>

<!DOCTYPE html>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>
</head>

<body>
    <div style="width:1000px; margin: 0 auto;"> 
        <div style="width: 100%; min-height: 100px; background-color: red; font-size: 20px;">
            <?php echo 'Olá, '.$_SESSION['nome'].'!';?>
            <a href="sair.php" style="float: right">SAIR</a>
        </div>
        <div style="width: 100px; background-color: aliceblue; min-height: 400px; float: left">
            <h2>MENU</h2>
            <p><a href="/cadastroUsuarios.php" style="color: inherit">Cadastrar usuarios</a></p>
            <p><a href="/cadastroFilmes.php" style="color: inherit">Cadastrar filmes</a></p>
        </div>
        <div style="width: 900px; background-color: lime; min-height: 400px; float: left">
            <form method="POST" action="inserirUsuario.php">
                CPF: <input type="text" name="cpf">
                USUARIO: <input type="text" name="usuario">
                SENHA: <input type="text" name="senha">

                <input type="submit">
            </form>
        </div>
    </div>
</body>

</html>