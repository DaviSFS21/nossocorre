<?php
    require_once "../controllers/verif_session.php";
    require_once "../controllers/criar_evento.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/dark.css">
    <title>Criar evento</title>
     <!-- Adicionando Javascript -->
    <script src="../js/cep.js"></script>
</head>
<body>
    <h1>Criar evento</h1>

    <form action="" method="POST">
        Nome do evento: <input type="text" name="n_nome_ev" maxlength="100" required><br><br>
        Descrição: <textarea type="text" name="n_descricao" maxlength="1200" rows="6" cols="26"></textarea><br><br>
        Data de Início: <input type="date" name="n_data_inicio" pattern="YYYY-MM-DD" required><br><br>
        Data de Término: <input type="date" name="n_data_fim" pattern="YYYY-MM-DD" required><br><br>
        CEP: <input name="n_cep" type="text" id="cep" value="" size="10" maxlength="9"
               onblur="pesquisacep(this.value);" /><br><br>
        Rua: <input name="n_rua" type="text" id="rua" size="60" required><br><br>
        Bairro: <input name="n_bairro" type="text" id="bairro" required><br><br>
        Cidade: <input name="n_cidade" type="text" id="cidade" required><br><br>
        UF: <input name="n_estado" type="text" id="uf" required><br><br>
        Imagem do evento: <input type="file" name="n_img"><br><br>
        <button type="submit">Criar evento</button>
    </form>

    <!--  Jquery -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!--  Cloudflare -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
</body>
</html>