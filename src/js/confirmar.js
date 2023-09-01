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
    var sequenciaDigitada = prompt("Digite a sequência abaixo para continuar: "+ sequenciaArmazenada);

    // Verifica se as senhas são iguais
    if (sequenciaDigitada === sequenciaArmazenada) {
        // As senhas são iguais, então exclui a conta
        alert("A operação foi um sucesso!");
    } else {
        // As senhas não são iguais, então exibe uma mensagem de erro
        alert("Sequência incorreta!");
        window.location.replace("perfil.php");
    }
}