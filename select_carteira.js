let select_categoria = document.getElementById("nomeCategoria");

    select_categoria.onchange = () => {
        let selectEquipe = document.getElementById("nomeEquipe");
        let valorSelect = select_categoria.value;

        fetch("select_equipeCarteira.php?categoria=" + valorSelect)
        .then( response => {
            return response.text();
        }).then(texto => {
            selectEquipe.innerHTML = texto;
        });
    }