<?php
    /* Se o campo de email do login estiver setado, inicia-se um bloco para verificar a senha e inserir as informações
    na variável $_SESSION. Caso contrário, dará senha ou usuários incorretos e o usuário deve tentar novamente. */
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
        $senha = sha1($_POST['senha']);

        //Conectando com o banco para fazer a consulta do usuario
        require("../assets/db/connect.php");

        //Pesquisa de usuario e senha
        $result_user = mysqli_query($conexao, "SELECT * FROM `usuario` WHERE `email` = '$email' AND `senha` = '$senha'");

        //tranformando em numero o resultado da pesquisa
        $numero_result = mysqli_num_rows($result_user);

        if($numero_result == 1){
            $user = mysqli_fetch_array($result_user);

            session_start();
            /* Iniciando a sessão e preenchendo variável com informações necessárias de acordo com o registro no BD. */
            $_SESSION['id'] = $user[0];
            $_SESSION['nome'] = $user[1];
            $_SESSION['cpf'] = $user[2];
            $_SESSION['data_nasc'] = $user[3];
            $_SESSION['email'] = $user[4];
            $_SESSION['senha'] = $user[5];
            $_SESSION['tel'] = $user[6];
            $_SESSION['cep'] = $user[7];
            $_SESSION['endereco'] = $user[8];
            $_SESSION['bairro'] = $user[9];
            $_SESSION['cidade'] = $user[10];
            $_SESSION['estado'] = $user[11];
            $_SESSION['adm_check'] = $user[12];
            ?>
                <script>
                    alert("Login com sucesso!");
                    window.location.replace("../views/perfil.php?id=<?php echo $_SESSION['id']; ?>");
                </script>
            <?php
        }else{
            ?>
                <script>
                    alert("Senha ou usuário incorretos...");
                    window.location.replace("#");
                </script>
            <?php
        }
        mysqli_close($conexao);
    }
?>