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
<form action="" method="POST">
        nome: <input type="text" name="a_nome" maxlength="30" value="<?php echo $_SESSION['nome']; ?>"><br><br>
        cpf: <input type="text" name="a_cpf" onkeypress="$(this).mask('000.000.000-00');" maxlength="15" value="<?php echo $_SESSION['cpf']; ?>" required><br><br>
        data de nascimento: <input type="date" name="a_data_nasc" pattern="YYYY-MM-DD" value="<?php echo $_SESSION['data_nasc']; ?>" required><br><br>
        email: <input type="email" name="a_email" maxlength="35" value="<?php echo $_SESSION['email']; ?>" required><br><br>
        insira a senha antiga: <input type="password" name="a_senha" id="senha" oninput="checkSenha()" minlength="6" maxlength="20"><br><br>
        nova senha: <input type="password" name="a_nova_senha" id="repSenha" oninput="checkSenha()" minlength="6" maxlength="20" required><br><br>
        telefone: <input type="text" name="a_tel" onkeypress="$(this).mask('(00)00000-0000');" maxlength="15" value="<?php echo $_SESSION['tel']; ?>" required><br><br>
        CEP: <input name="a_cep" type="text" id="cep" size="10" maxlength="9" value="<?php echo $_SESSION['cep']; ?>"
               onblur="pesquisacep(this.value);"><br><br>
        Rua: <input name="a_rua" type="text" id="rua" size="60" value="<?php echo $_SESSION['endereco']; ?>"><br><br>
        Bairro: <input name="a_bairro" type="text" id="bairro" value="<?php echo $_SESSION['bairro']; ?>"><br><br>
        Cidade: <input name="a_cidade" type="text" id="cidade" value="<?php echo $_SESSION['cidade']; ?>"><br><br>
        UF: <input name="a_estado" type="text" id="uf" value="<?php echo $_SESSION['estado']; ?>"><br><br>
        <button id="confirmButton" type="submit">atualizar</button>
    </form>
</body>
</html>