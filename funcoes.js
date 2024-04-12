let dataNascimento = document.getElementById("dataNascimento");

function colocaScript(callback)
{
    var scriptJquery = document.createElement('script')
    scriptJquery.type = 'text/javascript';
    scriptJquery.src = "http://code.jquery.com/jquery-1.10.2.min.js";
    scriptJquery.async = true;
    scriptJquery.onload = function()
    {
        callback();
    };
    headHTML = document.getElementsByTagName('head')[0];
    headHTML.insertBefore(scriptJquery, headHTML.firstChild);
}

colocaScript(function()
{
    $(dataNascimento).change(function(){
        if($(dataNascimento).val().length === 10){
          var d = document.querySelector('input#dataNascimento').value;
          var [ano, mes, dia] = d.split('-').map(Number);
          var dataPessoa = ano;
          console.log(dataPessoa);


          var data = 2023 - dataPessoa;
          console.log(data);

            let selectGenero = document.getElementById("genero"); 

            selectGenero.onchange = () => {
            let selectEquipe = document.getElementById("equipe");
            let valorSelect = selectGenero.value;
        
            fetch("select_equipe.php?genero=" + valorSelect + "&idade=" + data)
            .then( response => {
                return response.text();
            }).then(texto => {
                selectEquipe.innerHTML = texto;
            });
        }
        }
     });

     
});



//Para puxar o valor do select das equipes da categoria do usuário logado
        let selectEquipe = document.getElementById("nomeEquipe");
        let selectCategoria = document.getElementById("nomeCategoria");
        selectEquipe.onchange = () => {
        let valorSelect = selectEquipe.value;
        let valorCategoria = selectCategoria.value;
        let divCarteira = document.getElementById("idCarteira");
        
        divCarteira.style.display = "block";

    
        fetch("carteirinha_atletas.php?equipe=" + valorSelect + "&categoria=" + valorCategoria)
        .then( response => {
            return response.text();
        }).then(texto => {
            divCarteira.innerHTML = texto;
        });
    }


                
        