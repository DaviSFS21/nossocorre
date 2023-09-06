<?php
    require_once '../assets/db/connect.php';
    session_start();

    if(isset($_GET['id_evento'])){

        unlink($_GET['url_img']);

        $result_evento = mysqli_query($conexao, "SELECT * FROM `eventos` WHERE `id` = '" . $_GET['id_evento'] . "'");
        $numero_result = mysqli_num_rows($result_evento);

        if($numero_result != 0){
            mysqli_query($conexao, "DELETE FROM `eventos` WHERE `id` =  '" . $_GET['id_evento'] . "'");
            ?>
            <script>
                alert("Evento excluído!");
                window.location.replace("../views/perfil.php");
            </script>
            <?php
        }else{
            ?>
            <script>
                alert("Este evento não existe...");
                window.location.replace("../views/perfil.php");
            </script>
            <?php
        }
    }
?>