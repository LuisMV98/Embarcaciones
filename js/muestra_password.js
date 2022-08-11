
window.onload = function (){
    document.getElementById("eye").style.display = "block";
    document.getElementById("eye2").style.display = "none";
}

function mostrar(){
    var tipo = document.getElementById("password");
    var ojo = document.getElementById("eye");
    var ojo2 = document.getElementById("eye2");

    if(tipo.type == 'password'){
        tipo.type = 'text';
        ojo.style.display = "none";
        ojo2.style.display = "block";
    }else{
        tipo.type = 'password';
        ojo.style.display = "block";
        ojo2.style.display = "none";
    }
}