<?php
    if(isset($_GET['id'])){

        require '../assets/db/connect.php';

        $id = $_GET['id'];

        $verif_user = mysqli_num_rows(mysqli_query($conexao, "SELECT * FROM `usuario` WHERE `id` = '$id'"));

        if($verif_user == 1){
            $nome = mysqli_fetch_array(mysqli_query($conexao, "SELECT `nome` FROM `usuario` WHERE `id` = '$id'"));
            echo $nome[0] . "<br>" . $id;
        }

        mysqli_close($conexao);
    } else {
        ?>
<!--             <script>
                alert("Usuário não encontrado...");
                window.location.replace("index.php");
            </script> -->
        <?php
    }

?>