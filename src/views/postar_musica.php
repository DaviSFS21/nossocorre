<?php
    require_once "../controllers/verif_session.php";
    require_once "../assets/db/connect.php";
    require_once "../controllers/postar_musica.php";
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
        Título: <input type="text" name="n_titulo" maxlength="100"><br>
        Gênero: <input type="text" name="n_genero" maxlength="300"><br>
        Música(.mp3 ou .m4a): <input type="file" name="n_musica"><br>
        <button type="submit">Enviar</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.5/dist/js.cookie.min.js"></script>
    <script src="../js/cookiesArtigo.js"></script>
</body>
</html>