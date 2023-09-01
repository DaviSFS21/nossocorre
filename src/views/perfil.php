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
    <a class="link" href="criar_evento.php">Criar um evento</a><br>
    <a class="link" href="ver_evento.php">Ver seus eventos</a><br>
    <a class="link" href="editar_perfil.php">Editar perfil</a><br>
    <a class="link" href="../controllers/excluir_perfil.php" onclick="ctzExcluir()">Excluir perfil</a><br>
    <a class="link" href="../controllers/exit.php">Sair</a>

    <br><br><br>

    <h3>Eventos</h3>
    <?php
        require_once "../assets/db/connect.php";

        $result_eventos = mysqli_query($conexao, "SELECT * FROM `eventos` WHERE `usuario_id` = '" . $_SESSION['id'] . "'");
        $numero_result = mysqli_num_rows($result_eventos);

        if($numero_result != 0){
            for($i = 1; $i <= $numero_result; $i++){
                $vetor_eventos = mysqli_fetch_array($result_eventos);

                echo "
    <div>
        <img src=" . $vetor_eventos[10] . " height=250px> 
        <p>ID: " . $vetor_eventos[0] . "</p>
        <p>Nome do evento: " . $vetor_eventos[1] . "</p>
        <p>Descrição: " . $vetor_eventos[2] . "</p>
        <p>Início: " . $vetor_eventos[3] . "</p>
        <a href='../controllers/excluir_evento.php?id_evento=" . $vetor_eventos[0] . "' onclick='ctzExcluir()'>Excluir o evento?</a>
    </div>
                ";
            }
        }

    ?>

    <script src="../js/confirmar.js"></script>
</body>
</html>