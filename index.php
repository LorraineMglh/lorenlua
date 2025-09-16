<html>
    <head>
        <title>LOGIN</title>
    </head>
    <body style="margin: 0 auto; display: grid; place-items: center">
        <div style="text-align: center; width: 200px; background-color: pink;">
            <form action="login.php" method="post">
                <label for="cpf"><b>CPF:</b></label>
                <input type="text" id="cpf" name="cpf" placeholder="CPF">
                <br>
                <label for="senha"><b>SENHA:</b></label>
                <input type="password" id="senha" name="senha" placeholder="Senha">
                <br>
                <input type="submit" value="enviar">
            </form>
        </div>
    </body>
</html>