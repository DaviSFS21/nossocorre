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
    <form enctype="multipart/form-data" action="" method="POST">
        Título: <input type="text" name="n_titulo" maxlength="100" oninput="salvarArtigo()"><br>
        Subtítulo: <input type="text" name="n_subtitulo" maxlength="300" oninput="salvarArtigo()"><br>
        Texto: <br><textarea name="n_texto" cols="90" rows="20" maxlength="3000"></textarea><br>
        Imagem: <input type="file" name="n_img"><br>
        <button type="submit">Enviar</button>
    </form>

    <script src="../js/cookiesArtigo.js"></script>
</body>
</html>