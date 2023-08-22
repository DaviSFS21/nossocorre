<?php
    session_start();

    if(isset($_SESSION['nome'])){
        $user = "Olá, <a href='perfil.php?id=".$_SESSION['id']."'>".$_SESSION['nome']."</a>";
    }else{
        $user = "Faça <a href='login.php'>login</a> ou <a href='cadastro.php'>cadastre-se</a>!";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/dark.css">
    <title>Início</title>
</head>
<body>
    <h1><?php echo $user ?></h1>
</body>
</html>