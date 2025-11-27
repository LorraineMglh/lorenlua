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
            <p><a href="cadastroUsuarios.php" style="color: inherit">Cadastrar usuários</a></p>
            <p><a href="cadastroFilmes.php" style="color: inherit">Cadastrar filmes</a></p>
            <p><a href="cadastroGeneros.php" style="color: inherit">Cadastrar gêneros</a></p>
        </div>
        <div style="width: 900px; background-color: lime; min-height: 400px; float: left">
            <form method="post" action="inserirFilme.php">
                NOME: <input type="text" name="nome"><br>
                ANO: <input type="text" name="ano"><br>
                GENERO: <select name="genero">
                    <option value="">SELECIONE UM GENERO</option>

                    <?php
                        $sql = "select * from generos";
                        if(!$resultado = $conn->query($sql)){
                            die("erro ao buscar generos");
                        }

                        while($row = $resultado->fetch_assoc()){
                    ?>
                        <option value="<?=$row['genero'];?>"><?=$row['descricao'];?></option>
                    <?php
                        }
                    ?>
                </select>

                <input type="submit" value="inserir">
            </form>
            <br><br><hr>

            <?php
                include("conexao.php");

                $sql = "select nome, ano, genero from filmes";

                if(!$resultado = $conn->query($sql)){
                    die("Erro!");
                }
            ?>

            <table>
                <tr>
                    <td>NOME</td>
                    <td>ANO</td>
                    <td>GENERO</td>
                    <td>ALTERAR</td>
                    <td>EXCLUIR</td>
                </tr>

                <?php
                    while ($row = $resultado->fetch_assoc()) {
                    ?>
                    <tr>
                        <form method="post" action="alterarFilme.php">
                            <input type="hidden" name="nomeAnterior" value="<?=$row['nome'];?>">
                            <td><input type="text" name="nome" value="<?=$row['nome'];?>"></td>
                            <td><input type="text" name="ano" value="<?=$row['ano'];?>"></td>
                            <select name="genero">
                                <option value="">SELECIONE UM GENERO</option>

                                <?php
                                    $sql = "select * from generos";
                                    if(!$resultadoGeneros = $conn->query($sql)){
                                        die("erro ao buscar generos");
                                    }

                                    while($rowGenero = $resultadoGeneros->fetch_assoc()){
                                ?>
                                    <option value="<?=$rowGenero['genero'];?>"><?=$rowGenero['descricao'];?></option>
                                <?php
                                    }
                                ?>
                            </select>
                            <td><input type="submit" value="alterar"></td>
                        </form>

                        <form method="post" action="apagarFilme.php">
                            <input type="hidden" name="nome" value="<?=$row['nome'];?>">
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