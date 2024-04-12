//Para puxar o valor do select da categoria que o usuário quer ver os artilheiros
let selectCategoria = document.getElementById("nomeCategoria");
selectCategoria.onchange = () => {
let valorSelect = selectCategoria.value;
let tabelaClassificacao = document.getElementById("tabelaClassificacao");
tabelaClassificacao.style.display = 'block';

    fetch("classificacao_function.php?categoria=" + valorSelect)
    .then( response => {
        return response.text();
    }).then(texto => {
        tabelaClassificacao.innerHTML = texto;
    });
}