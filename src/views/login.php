<?php
    require_once "../controllers/login.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/dark.css">
    <title>Document</title>
</head>
<body>
    <h1>login</h1><br><br>
    <form action="" method="POST">
        email: <input type="email" name="email" maxlength="35" required><br><br>
        senha: <input type="password" name="senha" minlength="6" maxlength="20" required><br><br>
        <button type="submit">enviar</button>
    </form>
</body>
</html>