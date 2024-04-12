let select_categoriaCasa = document.getElementById("nomeCategoria");

            select_categoriaCasa.onchange = () => {
            let selectEquipe = document.getElementById("nomeEquipeCasa");
            let selectEquipeVisitante = document.getElementById("nomeEquipeVisitante");
            let valorSelect = select_categoriaCasa.value;
        
            fetch("select_sumulaEquipeCasa.php?categoria=" + valorSelect)
            .then( response => {
                return response.text();
            }).then(texto => {
                selectEquipe.innerHTML = texto;
                selectEquipeVisitante.innerHTML = texto;
            });
        }