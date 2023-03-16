

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

                pagina(nombre, apellidos);
                
            }
            
            //console.log(abrevia);
        }
        //apellidos = apellido.value;
        
        
    }

    function pagina(nombre, apellidos){
        
        //console.log(apellidos);
        //console.log(nombre);
        var strPagina = "http://localhost:8080/programacion-web/CrudJugadores/CrudJugadores/jugador/";
        //console.log(strPagina);

        let nombreCompleto = nombre + " " + apellidos;
        console.log(nombreCompleto);
        var nomCompleto = nombreCompleto.split(" ");
        
        

        for (var i=0; i < nomCompleto.length; i++) {
            if(nomCompleto[i] != ""){
                if(i == nomCompleto.length-1){
                    strPagina=strPagina + nomCompleto[i].toLowerCase();
                }else{
                    strPagina=strPagina + nomCompleto[i].toLowerCase() + "-";
                }
                
            }
        }
        console.log(strPagina);
        var idAfiliacion = document.getElementById('inputIDAfiliacion').value;
        console.log(idAfiliacion);
        strPagina = strPagina + "-" + idAfiliacion + ".com"
        //console.log(strPagina);

        document.getElementById('inputPagina').value=strPagina
        document.getElementById('inputPagina').placeholder=strPagina;

        console.log("Pagina: " + document.getElementById('inputPagina').value + "  Abreviacion: "+ document.getElementById('inputAbreviacion').value);
        
        

    }

    function pruebas(input){
        /*console.log(input);
        console.log(input.value);
        var abreviacion=document.getElementById('inputAbreviacion');
        
        abreviacion=input.value;
        //abreviacion=input.placeholder;
        document.getElementById('inputAbreviacion').placeholder=abreviacion;
        console.log(abreviacion);*/
    }

  

    