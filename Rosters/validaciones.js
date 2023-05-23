function abreviacion(){
    var apellidos = document.getElementById('inputApellidos').value;
    //console.log(apellidos);
    var nombre = document.getElementById('inputNombre').value;

    
    //console.log(nombre);
    if(apellidos != "" && nombre != ""){

        var primerNom= nombre.split(" ");
        let nom = primerNom[0];

        var primerApe = apellidos.split(" ");
        let ape = primerApe[0];

        
        var abreApellido = ape[0].toUpperCase();
        //console.log(ape.length);
        for (var i = 1; i < ape.length; i++) {
            charAp = ape[i].toLowerCase();
            abreApellido = abreApellido + charAp;
        }
        var abreNombre = nom[0].toUpperCase() + nom[1];

        var abrevia = abreApellido + " " + abreNombre + ".";
        if(ape[0] != null){
            document.getElementById('inputAbreviacion').value=abrevia
            document.getElementById('inputAbreviacion').placeholder=abrevia;

            
            
        }
        
        //console.log(abrevia);
    }
    //apellidos = apellido.value;
    
    
}