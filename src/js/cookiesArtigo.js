const titulo = Cookies.get('titulo');
document.querySelector("input[name=n_titulo]").value = Cookies.get('titulo') || "";

const subtitulo = Cookies.get('subtitulo');
document.querySelector("input[name=n_subtitulo]").value = Cookies.get('subtitulo') || "";

const texto = Cookies.get('texto');
document.querySelector("textarea").innerHTML = Cookies.get('texto') || "";

function salvarArtigo(){
    var nTitulo = document.querySelector("input[name=n_titulo]").value;
    Cookies.set('titulo', nTitulo, { expires: 5 });
    
    var nSubitulo = document.querySelector("input[name=n_subtitulo]").value;
    Cookies.set('subtitulo', nSubitulo, { expires: 5 });
    
    var nTexto = document.querySelector("#n_texto").value;
    Cookies.set('texto', nTexto, { expires: 5 });
}

function removerCookies(){
    Cookies.remove('titulo');
    Cookies.remove('subtitulo');
    Cookies.remove('texto');

    location.reload()
}