<?php
    session_start();
    if(!isset($_SESSION['nome'])){
        $id = $_SESSION['id'];
        ?>
            <script>
                alert("Faça o login...");
                window.location.replace("../views/login.php");
            </script>
        <?php
    }
?>