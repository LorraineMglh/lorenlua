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
            <br><br><hr>
            <?php
                include("conexao.php");
                $sql = "select nome, cpf, senha from usuarios";
                if(!$resultado = $conn->query($sql)){
                    die("Erro!");
                }
                ?>
            <table>
                <tr>
                    <td>NOME</td>
                    <td>CPF</td>
                    <td>SENHA</td>
                    <td>ALTERAR</td>
                    <td>EXCLUIR</td>
                </tr>

                <?php
                    while ($row = $resultado->fetch_assoc()) {
                    ?>
                    <tr>
                        <form method="post" action="alterarUsuario.php">
                            <input type="hidden" name="cpfAnterior" value="<?=$row['cpf'];?>">
                            <td><input type="text" name="nome" value="<?=$row['name'];?>"></td>
                            <td><input type="text" name="cpf" value="<?=$row['cpf'];?>"></td>
                            <td><input type="text" name="senha" value="<?=$row['senha'];?>"></td>
                            <td><input type="submit" value="alterar"></td>
                        </form>

                        <form method="post" action="apagarUsuario.php">
                            <input type="hidden" name="cpf" value="<?=$row['cpf'];?>">
                            <td><input type="submit" value="apagar"></td>
                        </form>
                    </tr>
                    <?php
                }
                ?>     
            </table>
        </div>
    </div>
</body>

</html>