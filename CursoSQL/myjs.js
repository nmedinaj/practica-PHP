var form = [...document.getElementsByTagName("form")[0]];
//Limpiar mensaje del registro anterior si existe
form.forEach(input => {    
    if(input.type != "submit"){
        input.addEventListener("click", function(){
            borrarMensaje();
        });
    }
});


function borrarMensaje(){
    var mensaje = document.querySelector("form > p");
    if(mensaje){
        mensaje.parentElement.removeChild(mensaje);
    }
}