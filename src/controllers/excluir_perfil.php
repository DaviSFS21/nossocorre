<?php
    require_once "../assets/db/connect.php";
    require_once "verif_session.php";

    mysqli_query($conexao, "DELETE FROM eventos WHERE `usuario_id` = ".$_SESSION['id']);
    mysqli_query($conexao, "DELETE FROM usuario WHERE `usuario`.`id` = ".$_SESSION['id']);
?>
<script>
    alert("Usuário excluído com sucesso!");
    window.location.replace("../views/login.php");
</script>