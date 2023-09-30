<?php
    require_once "../controllers/verif_session.php";
    require_once "../assets/db/connect.php";
    require_once "../controllers/editar_musica.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/dark.css">
    <title>Editar música</title>
</head>
<body>
    <form enctype="multipart/form-data" action="" method="POST">
        Título: <input type="text" name="a_titulo" value="<?php echo $edit_musica[1]; ?>" maxlength="100"><br>
        Gênero: <input type="text" name="a_genero" value="<?php echo $edit_musica[3]; ?>" maxlength="300"><br>
        Música(.mp3 ou .m4a): <input type="file" name="a_musica"><br>
        <button type="submit" onclick="return confirm('Tem certeza que editar essa música?')">Enviar</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.5/dist/js.cookie.min.js"></script>
    <script src="../js/cookiesArtigo.js"></script>
</body>
</html>