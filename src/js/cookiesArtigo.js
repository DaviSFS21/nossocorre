const inputTitulo = document.querySelector("input[name=n_titulo]");
const titulo = document.cookie.split(";").find(cookie => cookie.startsWith("titulo="));

if (titulo) {
inputTitulo.value = titulo.split("=")[1];
}

function salvarArtigo(){
    var inputTitulo = document.querySelector("input[name=n_titulo]");
    var titulo = inputTitulo.value;

    document.cookie = "titulo=" + titulo;
}