<?php
    require_once "../controllers/verif_session.php";
    require_once "../controllers/editar_evento.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/dark.css">
    <title>Editar evento</title>
</head>
<body>
    <h1>Editar evento</h1>

    <h2><?php echo "Olá, <a href='perfil.php?id=".$_SESSION['id']."'>" . $_SESSION['nome'] . "</a>"; ?></h2>

    <form enctype="multipart/form-data" action="" method="POST">
        Nome do evento: <input type="text" name="a_nome_ev" maxlength="100" value="<?php echo $edit_evento[1]; ?>" required><br><br>
        Descrição: <textarea type="text" name="a_descricao" maxlength="1200" rows="6" cols="26"><?php echo $edit_evento[2]; ?></textarea><br><br>
        Data de Início: <input type="date" name="a_data_inicio" value="<?php echo $edit_evento[3]; ?>" pattern="YYYY-MM-DD" required><br><br>
        Data de Término: <input type="date" name="a_data_fim" value="<?php echo $edit_evento[4]; ?>" pattern="YYYY-MM-DD" required><br><br>
        CEP: <input name="a_cep" type="text" id="cep" value="<?php echo $edit_evento[5]; ?>" size="10" maxlength="9"
               onblur="pesquisacep(this.value);"><br><br>
        Rua: <input name="a_rua" type="text" id="rua" value="<?php echo $edit_evento[6]; ?>" size="60" required><br><br>
        Bairro: <input name="a_bairro" type="text" id="bairro" value="<?php echo $edit_evento[7]; ?>" required><br><br>
        Cidade: <input name="a_cidade" type="text" id="cidade" value="<?php echo $edit_evento[8]; ?>" required><br><br>
        UF: <input name="a_estado" type="text" id="uf" value="<?php echo $edit_evento[9]; ?>" required><br><br>
        Imagem do evento: <input type="file" name="a_img"><br><br>

        Não se esqueça de de inserir a imagem!
        <button type="submit" onclick="return confirm('Tem certeza que editar esse evento?')">Atualizar evento</button>
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