<?php

    $id = $_GET['id'];

    $verif_cpf = mysqli_num_rows(mysqli_query($conexao, "SELECT * FROM `usuario` WHERE `id` = '$id'"));

?>