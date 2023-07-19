function checkSenha() {
    var senha = document.getElementById("senha").value;
    var rep_senha = document.getElementById("repSenha").value;
    
    // If password not entered
    if (senha == "") {
        document.getElementById("confirmButton").disabled = true;
    } else {
        if (rep_senha == "") {
            document.getElementById("confirmButton").disabled = true;
        } else {
            if (senha != rep_senha) {
                document.getElementById("confirmButton").disabled = true;
            } else {
                document.getElementById("confirmButton").disabled = false;
            }
        }
    }
}
