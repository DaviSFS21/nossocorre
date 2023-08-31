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
    <?php
        if($_SESSION['id'] == $_SESSION['id']){
            echo '
    <a class="link" href="editar_perfil.php">Editar perfil</a><br>
    <button class="link" onclick="ctzExcluir()">Excluir perfil</button><br>
    <a class="link" href="../controllers/exit.php">Sair</a>
            ';
        }
    ?>

    <script>
        function ctzExcluir() {
            // Cria um array com os caracteres permitidos
            const caracteres = [
                '0', '1', '2', '3', '4', '5', '6', '7', '8', '9',
                'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M',
                'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'
            ];

            // Gera uma sequência de 6 dígitos
            const sequencia = [];
            for (let i = 0; i < 6; i++) {
                sequencia.push(caracteres[Math.floor(Math.random() * caracteres.length)]);
            }
            
            // Remove as vírgulas
            sequenciaArmazenada = sequencia.join('').replace(',', '');

            // Pega a senha digitada pelo usuário
            var sequenciaDigitada = prompt("Digite a sequência abaixo para confirmar a exclusão da sua conta: "+ sequenciaArmazenada);

            // Verifica se as senhas são iguais
            if (sequenciaDigitada === sequenciaArmazenada) {
                // As senhas são iguais, então exclui a conta
                alert("Sua conta foi excluída com sucesso!");
                window.location.replace("../controllers/excluir_perfil.php");
            } else {
                // As senhas não são iguais, então exibe uma mensagem de erro
                alert("Senha incorreta!");
            }
        }
    </script>
</body>
</html>