<?php
    require_once "../assets/db/connect.php";
    require_once "../controllers/postar_artigo.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/dark.css">
    <title>Postar artigo</title>
</head>
<body>
    <form action="" method="POST">
        Título: <input type="text" name="titulo" maxlength="100"><br>
        Subtítulo: <input type="text" name="subtitulo" maxlength="300"><br>
        Texto: <br><textarea name="texto" cols="90" rows="20" maxlength="5000"></textarea><br>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>