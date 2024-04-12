const imgs = document.getElementById("img");

let idx = 0;

function carrossel(){
    idx++;

    if(idx > 4 - 1){
        idx = 0;    
    }

    imgs.style.transform = `translateX(${-idx * 100}%)`;
}

setInterval(carrossel, 2500);



//Modals do rodapé!
function iniciaModal(modalID){
    let modal = document.getElementById(modalID);
    modal.classList.add("mostrar");
    modal.addEventListener('click', (e) => {
         if(e.target.id == modalID || e.target.className == "fecharSobre"){
              modal.classList.remove("mostrar");
         }
    });
}

function mostrarModalSobre(){
    iniciaModal("modal-sobre");
}

function iniciaModalPoliticas(modalIDPoliticas){
    let modalPoliticas = document.getElementById(modalIDPoliticas);
    modalPoliticas.classList.add("mostrar");
    modalPoliticas.addEventListener('click', (e) => {
         if(e.target.id == modalIDPoliticas || e.target.className == "fecharPoliticas"){
              modalPoliticas.classList.remove("mostrar");
         }
    });
}

function mostrarModalPoliticas(){
    iniciaModalPoliticas("modal-politicas");
}