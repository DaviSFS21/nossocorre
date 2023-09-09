<?php
    require_once '../assets/db/connect.php';
    session_start();

    if(isset($_GET['id_artigo'])){

        unlink($_GET['url_img']);

        $result_evento = mysqli_query($conexao, "SELECT * FROM `artigos` WHERE `id` = '" . $_GET['id_artigo'] . "'");
        $numero_result = mysqli_num_rows($result_evento);

        if($numero_result != 0){
            mysqli_query($conexao, "DELETE FROM `artigos` WHERE `id` =  '" . $_GET['id_artigo'] . "'");
            ?>
            <script>
                alert("Artigo excluído!");
                window.location.replace("../views/perfil.php");
            </script>
            <?php
        }/* else{
            ?>
            <script>
                alert("Este artigo não existe...");
                window.location.replace("../views/perfil.php");
            </script>
            <?php
        } */
    }else{
/*         ?>
        <script>
            alert("Este artigo não existe...");
            window.location.replace("../views/perfil.php");
        </script>
        <?php */
    }
?>