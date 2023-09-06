<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/dark.css">
    <title>Pesquisar eventos</title>
</head>
<body>
    <h1>Pesquisar eventos</h1>
    <form action="" method="GET">
        <input type="text" name="search">
        <button type="submit">Pesquisar</button>
    </form>
    <br><br>
    <?php 
        require_once "../controllers/pesquisar_evento.php"
    ?>
</body>
</html>