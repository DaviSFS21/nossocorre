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
    <title>Meu perfil</title>
</head>
<body>
    <h1><?php echo $_SESSION['nome'] ?></h1>
    <a class="link" href="criar_evento.php">Criar um evento</a><br>
    <a class="link" href="pesquisar_evento.php">Pesquisar eventos</a><br>
    <a class="link" href="postar_artigo.php">Postar um artigo</a><br>
    <a class="link" href="pesquisar_artigo.php">Pesquisar artigos</a><br>
    <a class="link" href="editar_perfil.php">Editar perfil</a><br>
    <a class="link" href="../controllers/excluir_perfil.php">Excluir perfil</a><br>
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
        <a href='../views/editar_evento.php?id_evento=" . $vetor_eventos[0] . "'>Editar evento</a>
        <a href='../controllers/excluir_evento.php?id_evento=" . $vetor_eventos[0] . "&url_img=" . $vetor_eventos[10]. "'>Excluir evento</a>
    </div>
    <hr>
                ";
            }
        }

    ?>
    <br><br>
    <h3>Artigos</h3>
    <?php
        require_once "../assets/db/connect.php";

        $result_artigos = mysqli_query($conexao, "SELECT * FROM `artigos` WHERE `usuario_id` = '" . $_SESSION['id'] . "'");
        $numero_result = mysqli_num_rows($result_artigos);

        if($numero_result != 0){
            for($i = 1; $i <= $numero_result; $i++){
                $vetor_artigos = mysqli_fetch_array($result_artigos);

                echo "
    <div>
        <img src=" . $vetor_artigos[4] . " height=250px> 
        <p>ID: " . $vetor_artigos[0] . "</p>
        <p>Título: " . $vetor_artigos[1] . "</p>
        <p>Subtítulo: " . $vetor_artigos[2] . "</p>
        <p>" . $vetor_artigos[3] . "</p>
        <a href='../views/editar_artigo.php?id_artigo=" . $vetor_artigos[0] . "'>Editar artigo</a>
        <a href='../controllers/excluir_artigo.php?id_artigo=" . $vetor_artigos[0] . "&url_img=" . $vetor_artigos[4] . "'>Excluir artigo</a>
    </div>
    <hr>
                ";
            }
        }

    ?>

</body>
</html>