//Para puxar o valor do select da categoria que o usuário quer ver os artilheiros
let selectCategoria = document.getElementById("nomeCategoria");
selectCategoria.onchange = () => {
let valorSelect = selectCategoria.value;
let divPrincipalArtilheiros = document.getElementById("divPrincipal-artilheiros");
divPrincipalArtilheiros.style.display = "block";

let divArtilheiros = document.getElementById("artilheiros");

fetch("artilheiros_function.php?categoria=" + valorSelect)
.then( response => {
    return response.text();
}).then(texto => {
    divArtilheiros.innerHTML = texto;
})}