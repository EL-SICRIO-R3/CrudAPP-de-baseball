function soloLetras(){
    var keyCode = event.keyCode;
    if ((keyCode > 64 && keyCode < 91) || (keyCode > 96 && keyCode < 123) || keyCode == 8 || keyCode == 32)
        return true;
    else
        return false;   
}

function soloNumeros(){
    var keyCode = event.keyCode;
    if ((keyCode > 47 && keyCode < 58) ||  keyCode == 8 )
        return true;
    else
        return false;   
}

function Modelo(){
    var keyCode = event.keyCode;
    if ((keyCode > 64 && keyCode < 91) || (keyCode > 96 && keyCode < 123) || (keyCode > 47 && keyCode < 58) || keyCode == 8 || keyCode == 32 || keyCode == 45)
        return true;
    else
        return false;   
}

function Precio(){
    var keyCode = event.keyCode;
    if ((keyCode > 47 && keyCode < 58) || keyCode == 8 || keyCode == 46)
        return true;
    else
        return false;   
}


function Correo(){ 
    var keyCode = event.keyCode;
    if ((keyCode > 47 && keyCode < 58) ||  (keyCode > 64 && keyCode < 91) || (keyCode > 96 && keyCode < 123) || (keyCode > 34 && keyCode < 39) || keyCode == 8 || keyCode == 46 || keyCode == 95 || keyCode == 64)
        return true;
    else
        return false;   
}

function Prueba(){
    var id = document.getElementById("id").value;
    alert("Entra y su id es: " + id);
    var mensaje = "Entra";
    return mensaje;
}