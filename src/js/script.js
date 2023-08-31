// Função para verificar se as senhas inseridas nos campos "senha" e "repetir senha" estão iguais
// Com o atributo "oninput" nos inputs citados acima, a função é chamada sempre que altera-se o valor
function checkSenha() {

    var senha = document.getElementById("senha").value;
    var rep_senha = document.getElementById("repSenha").value;
    
    // Verifica se os campos estão vazios
    if (senha == "") {
        document.getElementById("confirmButton").disabled = true;
    } else {
        if (rep_senha == "") {
            document.getElementById("confirmButton").disabled = true;
        } else {
            // Verifica se os valores estão diferentes, ativando ou desativando o disabled caso as senhas coincidam
            if (senha != rep_senha) {
                document.getElementById("confirmButton").disabled = true;
            } else {
                document.getElementById("confirmButton").disabled = false;
            }
        }
    }
}