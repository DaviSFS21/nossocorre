<?php
    require_once "../controllers/verif_session.php";
    require_once "../controllers/editar_perfil.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/dark.css">
    <title>Atualizar perfil</title>
</head>
<body>
    <h1><?php echo $_SESSION['nome'] ?></h1>
    <?php
        if($_SESSION['id'] == $_GET['id']){
            echo '
    <a class="link" href="editar_perfil.php">Editar perfil</a><br>
    <a class="link" href="../controllers/excluir_perfil.php">Excluir perfil</a><br>
    <a class="link" href="../controllers/exit.php">Sair</a>
            ';
        }
    ?>
</body>
</html>