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

    <script>
        window.onload = () => {
            document.querySelector("form").addEventListener('submit', event => {
                const cpfEl = document.getElementById("cpf");
                const senhaEl = document.getElementById("senha");

                if (!validarCPF(cpfEl.value)) {
                    console.log("CPF Inválido!");
                    event.preventDefault();
                    blinkRed(cpfEl);
                }

                if (!validarSenha(senhaEl.value)) {
                    console.log("Senha Inválida!");
                    event.preventDefault();
                    blinkRed(senhaEl);
                }
            });
        }

        /**
         * @param {string} cpf
         */
        function validarCPF(cpf) {
            // Remove caracteres não numéricos (pontos, traços, etc.)
            cpf = cpf.replace(/\D+/g, '');

            // Verifica se o CPF tem 11 dígitos
            if (cpf.length !== 11) {
                return false;
            }

            // Impede sequências de dígitos iguais, que são inválidos, ex: "11111111111"
            if (/^(\d)\1{10}$/.test(cpf)) {
                return false;
            }

            // Variáveis para armazenar soma e resto
            let soma = 0;
            let resto;

            // --- Cálculo do primeiro dígito verificador ---
            for (let i = 1; i <= 9; i++) {
                soma += parseInt(cpf.substring(i - 1, i)) * (11 - i);
            }
            resto = (soma * 10) % 11;

            if ((resto === 10) || (resto === 11)) {
                resto = 0;
            }
            if (resto !== parseInt(cpf.substring(9, 10))) {
                return false;
            }

            // --- Cálculo do segundo dígito verificador ---
            soma = 0;
            for (let i = 1; i <= 10; i++) {
                soma += parseInt(cpf.substring(i - 1, i)) * (12 - i);
            }
            resto = (soma * 10) % 11;

            if ((resto === 10) || (resto === 11)) {
                resto = 0;
            }
            if (resto !== parseInt(cpf.substring(10, 11))) {
                return false;
            }

            return true; // CPF válido
        }

        /**
         * @param {string} senha
         */
        function validarSenha(senha) {
            const uppercaseCount = countRe(senha.match(/[A-Z]/g));
            const lowercaseCount = countRe(senha.match(/[a-z]/g));
            const specialCharsCount = countRe(senha.match(/[^0-9a-zA-Z]/g));

            return (
                senha.length >= 6 &&
                uppercaseCount >= 1 &&
                lowercaseCount >= 1 &&
                specialCharsCount >= 1
            )
        }

        /**
         * @param {RegExpMatchArray} re
         */
        function countRe(re) {
            return re ? re.length : 0;
        }

        /**
         * @param {HTMLElement} re
         */
        function blinkRed(el) {
            el.style.backgroundColor = "red";
            setTimeout(() => el.style.backgroundColor = "white", 1000);
        }
    </script>
</html>