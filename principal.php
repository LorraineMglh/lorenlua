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
    <div style = "width:1000px; margin: 0 auto;"> 
        <div style = "width: 100%; min-height: 100px; background-color: red;">
            <?php echo 'Olá, '.$_SESSION['nome'].'!';?>
            <a href= "sair.php" style = "float: right">SAIR</a>
        </div>
        <div style = "width: 100px; background-color: blue; min-height: 400px; float: left">
            MENU
        </div>
        <div style = "width: 900px; background-color: lime; min-height: 400px; float: left">
            CONTEÚDO
        </div>
    </div>
</body>

</html>