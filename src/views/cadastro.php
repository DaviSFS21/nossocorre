<?php
    require_once "../controllers/cadastro.php"
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
    <h1>cadastro</h1>
    <!-- Formulário para cadastro do usuário -->
    <form action="" method="POST">
        nome: <input type="text" name="nome" maxlength="30" required><br><br>
        cpf: <input type="text" name="cpf" onkeypress="$(this).mask('000.000.000-00');" maxlength="15" required><br><br>
        data de nascimento: <input type="date" name="data_nasc" pattern="YYYY-MM-DD" required><br><br>
        email: <input type="email" name="email" maxlength="35" required><br><br>
        senha: <input type="password" name="senha" id="senha" oninput="checkSenha()" minlength="6" maxlength="20" required><br><br>
        repetir senha: <input type="password" name="repSenha" id="repSenha" oninput="checkSenha()" minlength="6" maxlength="20" required><br><br>
        telefone: <input type="text" name="tel" onkeypress="$(this).mask('(00)00000-0000');" maxlength="15" required><br><br>
        CEP: <input name="cep" type="text" id="cep" value="" size="10" maxlength="9"
               onblur="pesquisacep(this.value);" /><br><br>
        Rua: <input name="rua" type="text" id="rua" size="60" /><br><br>
        Bairro: <input name="bairro" type="text" id="bairro"><br><br>
        Cidade: <input name="cidade" type="text" id="cidade"><br><br>
        UF: <input name="estado" type="text" id="uf"><br><br>
        <button id="confirmButton" type="submit" disabled>cadastrar</button>
    </form>
    
    <!-- JavaScript -->
    <script src="../js/script.js" text="text/javascript"></script>
    <!--  Jquery -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!--  Cloudflare -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
</body>
</html>