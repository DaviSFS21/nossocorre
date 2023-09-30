<?php
    require_once "../controllers/verif_session.php";
    require_once "../controllers/editar_artigo.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/dark.css">
    <title>Editar artigo</title>
</head>
<body>
    <h1>Editar artigo</h1>

    <h2><?php echo "Olá, <a href='perfil.php?id=".$_SESSION['id']."'>" . $_SESSION['nome'] . "</a>"; ?></h2>

    <form enctype="multipart/form-data" action="" method="POST">
        Título: <input type="text" name="a_titulo" maxlength="100" value="<?php echo $edit_artigo[1]; ?>"><br>
        Subtítulo: <input type="text" name="a_subtitulo" maxlength="300" value="<?php echo $edit_artigo[2]; ?>"><br>
        Texto: <br><textarea name="a_texto" cols="90" rows="20" maxlength="3000"><?php echo $edit_artigo[3]; ?></textarea><br>
        Imagem: <input type="file" name="a_img"><br>

        Não se esqueça de reinserir a imagem!
        <button type="submit" onclick="return confirm('Tem certeza que editar essa artigo?')">Atualizar artigo</button>
    </form>

    <!-- Adicionando Javascript -->
    <script src="../js/script.js"></script>
    <script src="../js/cep.js"></script>
    <!--  Jquery -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!--  Cloudflare -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
</body>
</html>