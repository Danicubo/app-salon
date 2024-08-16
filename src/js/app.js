let paso = 1;

document.addEventListener('DOMContentLoaded', function(){
    iniciarApp();
});

function mostrarSeccion(){ 
    
}
function iniciarApp(){
    tabs();//cambia la seccion  cuando se precionan los tabs
}

function tabs(){
    const botones = document.querySelectorAll('.tabs button')
    botones.forEach(boton => {
        boton.addEventListener('click', function(e){
            paso = parseInt( e.target.dataset.paso );
            mostrarSeccion();
        });
    })
}