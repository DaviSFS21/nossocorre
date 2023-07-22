<?php
    if(isset($_POST['email'])){
        //Estabelecendo conexão para realizar a busca de um perfil com dados idênticos
        require '../assets/db/connect.php';

        $cpf = $_POST['cpf'];
        $email = $_POST['email'];
        $tel = $_POST['tel'];

        //tranformando em numero o resultado da pesquisa
        $verif_cpf = mysqli_num_rows(mysqli_query($conexao, "SELECT * FROM `usuario` WHERE `cpf` = '$cpf'"));
        $verif_email = mysqli_num_rows(mysqli_query($conexao, "SELECT * FROM `usuario` WHERE `email` = '$email'"));
        $verif_tel = mysqli_num_rows(mysqli_query($conexao, "SELECT * FROM `usuario` WHERE `tel` = '$tel'"));
        $verif_geral = $verif_cpf + $verif_email + $verif_tel;

        if($verif_geral > 0){
            if ($verif_cpf == 1) $valor_rep = "| CPF; ";
            if ($verif_email == 1) $valor_rep = $valor_rep . "| Email; ";
            if ($verif_tel == 1) $valor_rep = $valor_rep . "Telefone; ";

            ?>
                <script>
                    alert("Já cadastrados: <?php echo trim($valor_rep, "; "); ?>");
                </script>
            <?php
        }else{
            $nome = $_POST['nome'];
            $data_nasc = $_POST['data_nasc'];
            $senha = sha1($_POST['senha']);
            $cep = $_POST['cep'];
            $rua = $_POST['rua'];
            $bairro = $_POST['bairro'];
            $cidade = $_POST['cidade'];
            $estado = $_POST['estado'];

            mysqli_query($conexao, "INSERT INTO 
            `usuario`(`nome`, `cpf`, `data_nasc`, `email`, `senha`, `tel`, `cep`, `rua`, `bairro`, `cidade`, `estado`,`adm_check`) 
            VALUES ('$nome','$cpf','$data_nasc','$email','$senha','$tel','$cep','$rua','$bairro','$cidade','$estado',0)");
        }

        mysqli_close($conexao);
    }
?>