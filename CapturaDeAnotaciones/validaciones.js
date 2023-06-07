var flag = 0;

function abreviacion() {
    var apellidos = document.getElementById('inputApellidos').value;
    //console.log(apellidos);
    var nombre = document.getElementById('inputNombre').value;


    //console.log(nombre);
    if (apellidos != "" && nombre != "") {

        var primerNom = nombre.split(" ");
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
        if (ape[0] != null) {
            document.getElementById('inputAbreviacion').value = abrevia
            document.getElementById('inputAbreviacion').placeholder = abrevia;

            pagina(nombre, apellidos);

        }

        //console.log(abrevia);
    }
    //apellidos = apellido.value;


}

function pagina(nombre, apellidos) {

    //console.log(apellidos);
    //console.log(nombre);
    var strPagina = "http://localhost:8080/programacion-web/CrudJugadores/CrudJugadores/jugador/";
    //console.log(strPagina);

    let nombreCompleto = nombre + " " + apellidos;
    console.log(nombreCompleto);
    var nomCompleto = nombreCompleto.split(" ");



    for (var i = 0; i < nomCompleto.length; i++) {
        if (nomCompleto[i] != "") {
            if (i == nomCompleto.length - 1) {
                strPagina = strPagina + nomCompleto[i].toLowerCase();
            } else {
                strPagina = strPagina + nomCompleto[i].toLowerCase() + "-";
            }

        }
    }
    console.log(strPagina);
    var idAfiliacion = document.getElementById('inputIDAfiliacion').value;
    console.log(idAfiliacion);
    strPagina = strPagina + "-" + idAfiliacion + ".com"
        //console.log(strPagina);

    document.getElementById('inputPagina').value = strPagina
    document.getElementById('inputPagina').placeholder = strPagina;

    console.log("Pagina: " + document.getElementById('inputPagina').value + "  Abreviacion: " + document.getElementById('inputAbreviacion').value);



}

function OrBt(button) {
    nombre = document.getElementById(button).textContent;
    if (document.getElementById('OrBatIn').value == "") {
        document.getElementById(button).classList.add("clicked");
        document.getElementById('OrBatIn').value = nombre;
        //console.log(nombre);
        flag += 1;
    } else if (document.getElementById('OrBatIn').value == nombre) {
        document.getElementById(button).classList.remove("clicked");
        document.getElementById('OrBatIn').value = "";
        flag -= 1;
    }


    /* for (var i = 1; i <= 12; i++) {
         var btnAux = document.getElementById("btnOB"+i);
         btnAux.classList.remove("clicked");
     }
     var btn = document.getElementById(button);
     btn.classList.add("clicked");
     document.getElementById('OrBat').value=num;
     console.log(document.getElementById('OrBat').value);
     flag += 1;*/
}

function Po(button, num) {
    nombre = document.getElementById(button).textContent;
    if (document.getElementById('Posicion').value == "") {
        document.getElementById(button).classList.add("clicked");
        document.getElementById('Posicion').value = nombre;
        //console.log(nombre);
        flag += 1;
    } else if (document.getElementById('Posicion').value == nombre) {
        document.getElementById(button).classList.remove("clicked");
        document.getElementById('Posicion').value = "";
        flag -= 1;
    }




    /*for (var i = 1; i <= 12; i++) {
        var btnAux = document.getElementById("btnP"+i);
        btnAux.classList.remove("clicked");
    }
    var btn = document.getElementById(button);
    btn.classList.add("clicked");
    document.getElementById('Posicion').value=num;
    console.log(document.getElementById('Posicion').value);
    flag+=1;*/
}

function Inn(button, num) {
    nombre = document.getElementById(button).textContent;
    if (document.getElementById('Inni').value == "") {
        document.getElementById(button).classList.add("clicked");
        document.getElementById('Inni').value = nombre;
        //console.log(nombre);
        flag += 1;
    } else if (document.getElementById('Inni').value == nombre) {
        document.getElementById(button).classList.remove("clicked");
        document.getElementById('Inni').value = "";
        flag -= 1;
    }

    /*for (var i = 1; i <= 12; i++) {
        var btnAux = document.getElementById("btnIn"+i);
        btnAux.classList.remove("clicked");
    }
    var btn = document.getElementById(button);
    btn.classList.add("clicked");
    document.getElementById('Inni').value=num;
    console.log(document.getElementById('Inni').value);
    flag+=1;*/
}

function PruebaP(event, op) {
    if (event.keyCode === 13) {
        var innings = document.getElementById("inputIDJuego").value;

        var Param = {
            "inning": innings,
            "Option": op,
        }

        $.ajax({
            data: Param,
            type: 'get',
            dataType: 'json',
            url: 'consultas.php'
        }).done(function(data) {
            parametros = JSON.stringify(data);
            parametros = JSON.parse(parametros);
            num = parseInt(parametros.Resultado);
            if (num >= 1) {
                validarInning(num);
                flag += 1;
            } else {
                alert('Ingresa un Id de juego correcto');
                blockInning();
                //flag -= 1;
            }
        }).fail(function(objeto, textoEstatus, codigoEstatus) {
            alert("fail in PruebaP");
        });
    }
}

function Prueba2(nom, op) {

    var innings = document.getElementById("inputIDJuego").value;
    var Param = {
        "inning": innings,
        "Option": op,
    }
    nombre1 = "";
    nombre2 = "";
    nombre3 = "";
    if (nom == "Visitante") {
        // console.log(nom);
        nombre1 = "ResultV";
        nombre2 = "ResultL";
        nombre3 = "EquipoV";
    } else if (nom == "Local") {
        //console.log(nom);
        nombre1 = "ResultL";
        nombre2 = "ResultV";
        nombre3 = "EquipoL";
    }

    $.ajax({
        data: Param,
        type: 'get',
        url: 'consultas.php'
    }).done(function(data) {
        //alert(data);
        datos = JSON.parse(data);
        //alert(datos[nombre3]);
        for (var i = 0; i < datos[nombre1].length; i++) {
            $("#inputBateadores").append(`
                <option value="${datos[nombre1][i]["IDAfiliacion"]}">${datos[nombre1][i]["Abreviacion"]}</option>
            `);
        }
        for (var i = 0; i < datos[nombre2].length; i++) {
            $("#inputLanzador").append(`
                <option value="${datos[nombre2][i]["IDAfiliacion"]}">${datos[nombre2][i]["Abreviacion"]}</option>
            `);
        }
        document.getElementById('EqBatIDEquipo').value = datos[nombre3];
        flag += 1;
    }).fail(function(data, objeto, textoEstatus, codigoEstatus) {
        alert("fail in Prueba2");
        flag -= 1
    });

}

function validarInning(num) {
    var innings = document.getElementById("inputIDJuego").value;
    console.log(innings);
    desBlockEqBat();
    blockInning();
    CleanSelect();
    for (var i = 1; i <= num; i++) {
        document.getElementById("btnIn" + i).disabled = false;
    }
    //document.getElementById("btnEnviar").disabled = false;
}

function desBlockEqBat() {
    document.getElementById("btnEBat1").disabled = false;
    document.getElementById("btnEBat2").disabled = false;
}

function desBlockSelect() {
    document.getElementById("inputBateadores").disabled = false;
    document.getElementById("inputLanzador").disabled = false;
}

function blockInning() {
    for (var i = 1; i <= 12; i++) {
        document.getElementById("btnIn" + i).disabled = true;
    }
}

function EquiBat(button, num, op) {
    for (var i = 1; i <= 2; i++) {
        var btnAux = document.getElementById("btnEBat" + i);
        btnAux.classList.remove("clicked");
    }
    var btn = document.getElementById(button);
    btn.classList.add("clicked");
    document.getElementById('EqBat').value = num;
    console.log(document.getElementById('EqBat').value);
    CleanSelect();
    desBlockSelect();
    Prueba2(num, op);
}

function CleanRB() {
    document.querySelectorAll('[name=CarrPCheck]').forEach((x) => x.checked = false);
}

function CleanSelect() {
    document.querySelector("#inputBateadores").disabled = true;
    document.querySelector("#inputLanzador").disabled = true;
    $selectV = document.querySelector("#inputBateadores");
    $selectL = document.querySelector("#inputLanzador");
    //alert($select.options.length);
    for (let x = $selectV.options.length; x >= 0; x--) {
        $selectV.remove(x);
    }
    for (let y = $selectL.options.length; y >= 0; y--) {
        $selectL.remove(y);
    }
}

function EnviarForm() {
    console.log(flag);
    let formulario = document.getElementById('formulario');
    if (flag == 8) {
        formulario.submit();
        flag = 0;
    } else {
        alert("Faltan datos por completar.");
    }


}

function Jornada(button) {
    nombre = document.getElementById(button).textContent;
    if (document.getElementById('inputJornada1').value == "") {
        document.getElementById(button).classList.add("clicked");
        document.getElementById('inputJornada1').value = nombre;
        flag += 2;
    } else if (document.getElementById('inputJornada2').value == "") {
        document.getElementById(button).classList.add("clicked");
        document.getElementById('inputJornada2').value = nombre;
    } else if (document.getElementById('inputJornada1').value == nombre) {
        document.getElementById(button).classList.remove("clicked");
        document.getElementById('inputJornada1').value = "";
        flag -= 2;
    } else if (document.getElementById('inputJornada2').value == nombre) {
        document.getElementById(button).classList.remove("clicked");
        document.getElementById('inputJornada2').value = "";
    }
}

function Detalles(button) {

    nombre = document.getElementById(button).textContent;
    if (document.getElementById('inputDetalles').value == "") {
        document.getElementById(button).classList.add("clicked");
        document.getElementById('inputDetalles').value = nombre;
        flag += 1;
    } else if (document.getElementById('inputDetalles').value == nombre) {
        document.getElementById(button).classList.remove("clicked");
        document.getElementById('inputDetalles').value = "";
        flag -= 1;
    }

}


function ConsultarTurnos(op) {
    var innings = document.getElementById("inputIDJuego").value;
    var Param = {
        "inning": innings,
        "Option": op,
    }
    $.ajax({
        data: Param,
        type: 'get',
        dataType: 'json',
        url: 'consultas.php'
    }).done(function(data) {
        LlenarTurnos(data, innings);
    }).fail(function(objeto, textoEstatus, codigoEstatus) {
        alert("fail in the LlenarTurnos");
    });
}

function LlenarTurnos(data, IdJuego) {
    SetiarVariables();
    //console.log("El id del juego es: " + IdJuego);
    //Bateadores
    for (var i = 0; i < data["Result"].length; i++) {
        if (IDBateador == data["Result"][i]["IDBateador"]) {

            asignarValor(data, i);

            if (i == data["Result"].length - 1) {

                (H == 0 || AB == 0 || BB == 0) ? (PJE = 0, OBP = 0) : (PJE = H / (AB - BB), OBP = (H + BB) / AB);

                ajaxBat(IdJuego, IDBateador, AB, AN, H, C, BB, K, PJE, OBP);
            }
        } else {

            if (AB != 0) {

                (H == 0 || AB == 0 || BB == 0) ? (PJE = 0, OBP = 0) : (PJE = H / (AB - BB), OBP = (H + BB) / AB);

                ajaxBat(IdJuego, IDBateador, AB, AN, H, C, BB, K, PJE, OBP);
            }

            SetiarVariables();

            IDBateador = data["Result"][i]["IDBateador"];

            asignarValor(data, i);
        }
    }

    SetiarVariables();

    //For para el Lanzador
    for (var j = 0; j < data["Result"].length; j++) {
        if (IDLanzador == data["Result"][j]["IDLanzador"]) {

            asignarValor(data, j);

            if (j == data["Result"].length - 1) {
                IP = (OUT / 3);
                (IP == 0 || C == 0) ? PCA = 0: PCA = IP / C * 21;
                (H == 0 || BA == 0 || BB == 0) ? POP = 0: POP = H / (BA - BB);
                ajaxLan(IdJuego, IDLanzador, IP, BA, AN, H, BB, K, PCA, POP);
            }
        } else {

            if (BA != 0) {
                IP = (OUT / 3);
                (IP == 0 || C == 0) ? PCA = 0: PCA = IP / C * 21;
                (H == 0 || BA == 0 || BB == 0) ? POP = 0: POP = H / (BA - BB);
                ajaxLan(IdJuego, IDLanzador, IP, BA, AN, H, BB, K, PCA, POP);
            }
            SetiarVariables();

            IDLanzador = data["Result"][j]["IDLanzador"];

            asignarValor(data, j);
        }
    }
    alert("Datos guardados correctamente");
}

function SetiarVariables() {
    Resul = "";
    Tur = "";
    Anotada = 0;
    Produccidas = 0;
    OUT = 0;

    //Bateadores
    AB = 0;
    AN = 0;
    C = 0;
    H = 0;
    CP = 0;
    BB = 0;
    K = 0;
    PJE = 0;
    OBP = 0;

    //Lanzadores
    IP = 0;
    BA = 0;
    PCA = 0;
    POP = 0;

    IDBateador = 0;
    IDLanzador = 0;
}

function ajaxBat(IdJuego, IDBateador, AB, AN, H, C, BB, K, PJE, OBP) {
    var Param = {
        "Option": 4,
        "IdJuego": IdJuego,
        "IDBateador": IDBateador,
        "AB": AB,
        "C": AN,
        "H": H,
        "CP": C,
        "BB": BB,
        "K": K,
        "PJE": PJE,
        "OBP": OBP
    }
    $.ajax({
        data: Param,
        type: 'POST',
        dataType: 'json',
        url: 'consultas.php'
    }).done(function(data) {
        //alert("Datos guardados correctamente en Bateador: " + data["Result"]);
    }).fail(function(objeto, textoEstatus, codigoEstatus) {
        alert("fail in the Llenar datos para el Bateador");
    });
}

function ajaxLan(IdJuego, IDLanzador, IP, BA, AN, H, BB, K, PCA, POP) {
    var Param = {
        "Option": 5,
        "IdJuego": IdJuego,
        "IDLanzador": IDLanzador,
        "IP": IP,
        "BA": BA,
        "C": AN,
        "H": H,
        "BB": BB,
        "K": K,
        "PCA": PCA,
        "POP": POP
    }
    $.ajax({
        data: Param,
        type: 'POST',
        dataType: 'json',
        url: 'consultas.php'
    }).done(function(data) {
        //alert("Datos guardados correctamente en Lanzador: " + data["Result"]);
    }).fail(function(objeto, textoEstatus, codigoEstatus) {
        alert("fail in the Llenar datos para el Lanzador");
    });
}

function asignarValor(data, i) {
    AB += 1;
    BA += 1;
    Tur = data["Result"][i]["Resultado"];
    Anotada = data["Result"][i]["Carrera"];
    Produccidas = data["Result"][i]["Producciones"];

    if (Anotada == 1) {
        AN += 1;
    }
    if (Produccidas > 0) {
        C += parseInt(Produccidas);
    }

    if (Tur == "BB" || Tur == "BG") {
        BB += 1;
    } else if (Tur == "IH" || Tur == "H1" || Tur == "H2" || Tur == "H3" || Tur == "HR1" || Tur == "HR2" || Tur == "HR3" || Tur == "HR4") {
        H += 1;
    } else if (Tur == "K") {
        K += 1;
        OUT += 1;
    } else {
        OUT += 1;
    }
}