<?php
    session_start();
    /* Se o campo de email do login estiver setado, inicia-se um bloco para verificar a senha e inserir as informações
    na variável $_SESSION. Caso contrário, dará senha ou usuários incorretos e o usuário deve tentar novamente. */
    if(isset($_SESSION['id'])) {

        //Conectando com o banco para fazer a consulta do usuario
        require("../assets/db/connect.php");

        //Pesquisa de usuario e senha
        $result_user = mysqli_query($conexao, "SELECT * FROM `usuario` WHERE `email` = '$email' AND `senha` = '$senha'");

        //tranformando em numero o resultado da pesquisa
        $numero_result = mysqli_num_rows($result_user);

        if($numero_result == 1){
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