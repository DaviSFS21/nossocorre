<?php
    require_once '../assets/db/connect.php';
    session_start();

    if(isset($_GET['id_evento'])){

        unlink($_GET['url_msc']);

        $result_evento = mysqli_query($conexao, "SELECT * FROM `musica` WHERE `id` = '" . $_GET['id_evento'] . "'");
        $numero_result = mysqli_num_rows($result_evento);

        if($numero_result != 0){
            mysqli_query($conexao, "DELETE FROM `musica` WHERE `id` =  '" . $_GET['id_evento'] . "'");
            ?>
            <script>
                alert("Música excluída!");
                window.location.replace("../views/perfil.php");
            </script>
            <?php
        }else{
            ?>
            <script>
                alert("Esta música não existe...");
                window.location.replace("../views/perfil.php");
            </script>
            <?php
        }
    }
?>