<?php

    if(isset($_POST['a_email'])){
        
        $id = $_SESSION['id'];

        //Estabelecendo conexão para realizar a busca de um perfil com dados idênticos
        require '../assets/db/connect.php';
        
        $senha_antiga = sha1($_POST['a_senha']);
        $verif_senha = mysqli_num_rows(mysqli_query($conexao, "SELECT * FROM `usuario` WHERE `id` = '$id' AND `senha` = '$senha_antiga'"));

        if($verif_senha == 1){
            $cpf = $_POST['a_cpf'];
            $email = $_POST['a_email'];
            $tel = $_POST['a_tel'];

            //tranformando em numero o resultado da pesquisa
            $verif_cpf = mysqli_num_rows(mysqli_query($conexao, "SELECT * FROM `usuario` WHERE `cpf` = '$cpf' AND `id` != '$id'"));
            $verif_email = mysqli_num_rows(mysqli_query($conexao, "SELECT * FROM `usuario` WHERE `email` = '$email' AND `id` != '$id'"));
            $verif_tel = mysqli_num_rows(mysqli_query($conexao, "SELECT * FROM `usuario` WHERE `tel` = '$tel' AND `id` != '$id'"));
            $verif_geral = $verif_cpf + $verif_email + $verif_tel;

            if($verif_geral > 0){
                if ($verif_cpf == 1) $total_rep = "CPF; ";
                if ($verif_email == 1) $total_rep = $total_rep . "Email; ";
                if ($verif_tel == 1) $total_rep = $total_rep . "Telefone; ";

                ?>
                    <script>
                        alert("Já cadastrados: <?php echo trim($total_rep, "; "); ?>");
                    </script>
                <?php
            }else{
                $nome = $_POST['a_nome'];
                $data_nasc = $_POST['a_data_nasc'];
                $senha = sha1($_POST['a_senha']);
                $cep = $_POST['a_cep'];
                $rua = $_POST['a_rua'];
                $bairro = $_POST['a_bairro'];
                $cidade = $_POST['a_cidade'];
                $estado = $_POST['a_estado'];

                mysqli_query($conexao, "UPDATE `usuario` 
                SET `nome`='$nome',`cpf`='$cpf',`data_nasc`='$data_nasc',`email`='$email',`senha`='$senha',`tel`='$tel',
                `cep`='$cep',`rua`='$rua',`bairro`='$bairro',`cidade`='$cidade',`estado`='$estado'
                WHERE `id`='$id'");

                ?>
                <script>
                    alert("Perfil atualizado!");
                </script>
                <?php
            }
        }else{
            ?>
                <script>
                    alert("Senha incorreta!");
                </script>
            <?php
        }
        mysqli_close($conexao);
    }
?>