<?php 
    include("conexiones.php");
    $con=conectar();

    $id=$_GET['id'];

    $sqlJuegoActual="SELECT *  FROM Juegos WHERE IDJuego='$id'";
    $queryJuegoActual=mysqli_query($con,$sqlJuegoActual);
    $rowJA=mysqli_fetch_array($queryJuegoActual);

    $TemporadaActual="SELECT *  FROM Temporadas WHERE IDTemporada = '$rowJA[IDTemporada]'";
    $qTemporadaActual=mysqli_query($con, $TemporadaActual);

    $CampoActual="SELECT *  FROM Parques WHERE IDCampo = '$rowJA[IDCampo]'";
    $qCampoActual=mysqli_query($con, $CampoActual);
    
    $EVisitanteActual="SELECT *  FROM Equipos WHERE IDEquipo = '$rowJA[IDEquipoVisitante]'";
    $qEVisitanteActual=mysqli_query($con, $EVisitanteActual);

    $ELocalActual="SELECT *  FROM Equipos WHERE IDEquipo = '$rowJA[IDEquipoLocal]'";
    $qELocalActual=mysqli_query($con, $ELocalActual);

    $InningsActual="SELECT count(IDInning) as Innings  FROM Entradas WHERE IDJuego = '$rowJA[IDJuego]'";
    $qInningsActual=mysqli_query($con, $InningsActual);
    $rowInningsActual=mysqli_fetch_array($qInningsActual);


    $InningActual="SELECT  *  FROM Entradas WHERE IDJuego = '$rowJA[IDJuego]'";
    $qInningActual=mysqli_query($con, $InningActual);
    $rowIA1=mysqli_fetch_array($qInningActual);

    $AmpayerHomeActual="SELECT *  FROM AmpayersJuego WHERE IDJuego = '$rowJA[IDJuego]' AND Ubicacion='Home'";
    $qAmpayerHomeActual=mysqli_query($con, $AmpayerHomeActual);
    $rowAH=mysqli_fetch_array($qAmpayerHomeActual);

    $AHomeActual="SELECT *  FROM Ampayers WHERE IDAmpayer = '$rowAH[IDAmpayer]'";
    $qAHomeActual=mysqli_query($con, $AHomeActual);
    

    $AmpayerBasesActual="SELECT *  FROM AmpayersJuego WHERE IDJuego = '$rowJA[IDJuego]' AND Ubicacion='Bases'";
    $qAmpayerBasesActual=mysqli_query($con, $AmpayerBasesActual);
    $rowAB=mysqli_fetch_array($qAmpayerBasesActual);

    $ABasesActual="SELECT *  FROM Ampayers WHERE IDAmpayer = '$rowAB[IDAmpayer]'";
    $qABasesActual=mysqli_query($con, $ABasesActual);

    $AvisoActual="SELECT *  FROM Avisos WHERE IDAviso = '$rowJA[IDAviso]'";
    $qAvisoActual=mysqli_query($con, $AvisoActual);
    



    






    $sql="SELECT *  FROM Juegos";
    $query=mysqli_query($con,$sql);

    $sqlId="SELECT count(IDJuego) as id  FROM Juegos";
    $queryId=mysqli_query($con,$sqlId);



    $id=mysqli_fetch_array($queryId);
 
    $sqlTemporada="SELECT *  FROM Temporadas";
    $queryTemporada=mysqli_query($con, $sqlTemporada);

    $sqlParque="SELECT *  FROM Parques";
    $queryParque=mysqli_query($con, $sqlParque);

    $sqlEquipo="SELECT *  FROM Equipos";
    $queryEquipo=mysqli_query($con, $sqlEquipo);

    $sqlEquipoLocal="SELECT *  FROM Equipos";
    $queryEquipoLocal=mysqli_query($con, $sqlEquipoLocal);

    $sqlAmpayerHome="SELECT *  FROM Ampayers";
    $queryAmpayerHome=mysqli_query($con, $sqlAmpayerHome);

    $sqlAmpayerBases="SELECT *  FROM Ampayers";
    $queryAmpayerBases=mysqli_query($con, $sqlAmpayerBases);

    $sqlAviso="SELECT *  FROM Avisos";
    $queryAviso=mysqli_query($con, $sqlAviso);
    
    



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIGA MLB</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="styles.css">
    <script src="./validaciones.js"></script>
    <script src="../js/Validaciones.js"></script>
    
    
</head>

<script>
    function validarI(){
        var innings= document.getElementById("inputInnings").value;
        console.log(innings)

        for (var i = 1; i <= innings; i++) {
            document.getElementById("inputInning1"+i).disabled = false;
            document.getElementById("inputInning2"+i).disabled = false;
        }
        var inn=parseInt(innings)+1;
        console.log(inn);
        for (var j = inn; j <= 10; j++) {
            document.getElementById("inputInning1"+j).disabled = true;
            document.getElementById("inputInning2"+j).disabled = true;
        }
    }

    function cargaActualizar(){
        validarI();
        MFinal();
        cambiarLogoLocal();
        cambiarLogoVisitante();

        var btn = document.getElementById("btnJ"+document.getElementById('InputJornada').value);
                        
        //var btn = document.getElementById(button);
        btn.classList.add("clicked");
        //document.getElementById('Jornada').value;
                        
        console.log(document.getElementById('Jornada').value);
    }

</script>



<body onload="cargaActualizar()">


    <div class="container" style="margin-top: 40px; background-color: white; border-radius: 40px; height:850px; " id="contenedorFormulario">
        <form class="row g-3" action="update.php?id=<?php echo $rowJA['IDJuego']; ?>" method="POST" id="formulario">
            <div class="col-md-2" style="width: 150px;">
                <label for="inputIDJuego" class="form-label"><strong>Nuevo Juego</strong></label>
                <input type="text" class="form-control" id="inputIDJuego" name="IDJuego" required="true" readonly value="<?php echo $rowJA['IDJuego']; ?>">
            </div>
            
            <div class="col-md-2" >
                <label for="inputTemporadas" class="form-label"><strong>Temporadas</strong></label>
                
                <select id="inputIDTemporada" class="form-select" name="IDTemporada"  required="true" tabindex="1">
                    
                    <?php
                        
                        $rowTemporadaActual=mysqli_fetch_array($qTemporadaActual);
                        echo "<option value=".$rowTemporadaActual['IDTemporada']." selected>".$rowTemporadaActual['IDTemporada']." ".$rowTemporadaActual['IDLiga']." ".$rowTemporadaActual['Grupo']."</option>";


                        while ($rowTM=mysqli_fetch_array($queryTemporada)) {
                            echo "<option value=".$rowTM['IDTemporada'].">".$rowTM['IDTemporada']." ".$rowTM['IDLiga']." ".$rowTM['Grupo']."</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="col-md-3" >
                <label for="inputCampo" class="form-label"><strong>Campo</strong></label>
                <select id="inputIDCampo" class="form-select" name="IDCampo" required="true" tabindex="2">
                    <?php

                        $rowCampoActual=mysqli_fetch_array($qCampoActual);
                        echo "<option value=".$rowCampoActual['IDCampo']." selected>".$rowCampoActual['Descripcion']."</option>";

                        while ($rowT=mysqli_fetch_array($queryParque)) {
                            echo "<option value=".$rowT['IDCampo'].">".$rowT['Descripcion']."</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="col-md-2">
                <label for="inputClima" class="form-label"><strong>Clima</strong></label>
                    
                <select id="inputClima" class="form-select" name="Clima" required="true" tabindex="3">
                <option selected><?php echo $rowJA['Clima']; ?></option>
                <option>Despejado</option>
                <option>Soleado</option>
                </select>
            </div>

            <div class="col-md-2" style="width: 150px">
                <label for="inputFecha" class="form-label"><strong>Fecha</strong></label>
                <input type="date" class="form-control" id="inputFecha" name="Fecha" required="true" tabindex="4" value="<?php echo $rowJA['Fecha']; ?>">
            </div>
            <div class="col-md-2">
                <label for="inputHora" class="form-label"><strong>Hora</strong></label>
                <input type="time" class="form-control" id="inputHora" name="Hora" required="true" tabindex="5" value="<?php echo $rowJA['Hora']; ?>">
            </div>
            
            

            <div class="col-12" style="height: 25px;  display: inline; margin-top: 50px; ">
                <script>
                    function pb2(button,jornada){
                        var btn = document.getElementById(button);
                        //console.log(Jornada);
                        //var jornada = parseInt(btn.getAttribute("data-valor"));
                        for (var i = 1; i <= 16; i++) {
                            var btnAux = document.getElementById("btnJ"+i);
                            btnAux.classList.remove("clicked");

                        }
                        
                        var btn = document.getElementById(button);
                        btn.classList.add("clicked");
                        document.getElementById('Jornada').value=jornada;
                        
                        console.log(document.getElementById('Jornada').value);
                        
                    }
                </script>
                <label for="inputJornada" class="form-label" ><strong>Jornada</strong></label>
                <div class="btn-group me-2" role="group" aria-label="Botones">
                    <button type="button" class="btn btn-secondary" id="btnJ1" onclick="pb2('btnJ1',1)" tabindex="35">1</button>
                    <button type="button" class="btn btn-secondary" id="btnJ2" onclick="pb2('btnJ2',2)" tabindex="36">2</button>
                    <button type="button" class="btn btn-secondary" id="btnJ3" onclick="pb2('btnJ3',3)" tabindex="37">3</button>
                    <button type="button" class="btn btn-secondary" id="btnJ4" onclick="pb2('btnJ4',4)" tabindex="38">4</button>
                    <button type="button" class="btn btn-secondary" id="btnJ5" onclick="pb2('btnJ5',5)" tabindex="39">5</button>
                    <button type="button" class="btn btn-secondary" id="btnJ6" onclick="pb2('btnJ6',6)" tabindex="40">6</button>
                    <button type="button" class="btn btn-secondary" id="btnJ7" onclick="pb2('btnJ7',7)" tabindex="41">7</button>
                    <button type="button" class="btn btn-secondary" id="btnJ8" onclick="pb2('btnJ8',8)" tabindex="42">8</button>
                    <button type="button" class="btn btn-secondary" id="btnJ9" onclick="pb2('btnJ9',9)" tabindex="43">9</button>
                    <button type="button" class="btn btn-secondary" id="btnJ10" onclick="pb2('btnJ10',10)" tabindex="44">10</button>
                    <button type="button" class="btn btn-secondary" id="btnJ11" onclick="pb2('btnJ11',11)" tabindex="45">11</button>
                    <button type="button" class="btn btn-secondary" id="btnJ12" onclick="pb2('btnJ12',12)" tabindex="46">12</button>
                    <button type="button" class="btn btn-secondary" id="btnJ13" onclick="pb2('btnJ13',13)" tabindex="47">13</button>
                    <button type="button" class="btn btn-secondary" id="btnJ14" onclick="pb2('btnJ14',14)" tabindex="48">14</button>
                    <button type="button" class="btn btn-secondary" id="btnJ15" onclick="pb2('btnJ15',15)" tabindex="49">15</button>
                    <button type="button" class="btn btn-secondary" id="btnJ16" onclick="pb2('btnJ16',16)" tabindex="50">x</button>
                    
                </div>
                <input type="text" class="invisible" value=1 id="InputJornada" name="Jornada" required="true" value="<?php echo $rowJA['Jornada']; ?>">
            </div>
            
            <script>
                function cambiarLogoLocal(){
                    var equipoId = document.getElementById("inputEquipoLocal").value;

                    var xhr = new XMLHttpRequest();
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            var response = JSON.parse(xhr.responseText);
                            var nombreLogo = response.nombreLogo;
                            console.log(nombreLogo);

                            // Actualizar el atributo 'src' de la imagen con el nuevo nombre del logo
                            document.getElementById("imgEquipoLocal").src = "../img/logos/" + nombreLogo;
                        } else {
                            console.log("Error en la petición AJAX");
                        }
                        }
                    };

                    xhr.open("GET", "Consultas.php?id=" + equipoId, true);
                    xhr.send();
                }

                function cambiarLogoVisitante(){
                    var equipoId = document.getElementById("inputEquipoVisitante").value;

                    var xhr = new XMLHttpRequest();
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            var response = JSON.parse(xhr.responseText);
                            var nombreLogo = response.nombreLogo;
                            console.log(nombreLogo);

                            // Actualizar el atributo 'src' de la imagen con el nuevo nombre del logo
                            document.getElementById("imgEquipoVisitante").src = "../img/logos/" + nombreLogo;
                        } else {
                            console.log("Error en la petición AJAX");
                        }
                        }
                    };

                    xhr.open("GET", "Consultas.php?id=" + equipoId, true);
                    xhr.send();
                }
            </script>
            <div class="row divLogo" style="margin-top: 50px; ">
                
                <div class="col-md-3 imgEquipoLocal" >
                    <img src="" alt="" id="imgEquipoLocal">
                </div>
                <div class="col-md-3 lblVS">
                    <h1><strong>VS</strong></h1>
                </div>
                <div class="col-md-3 imgEquipoVisitante">
                    <img src="" alt="" id="imgEquipoVisitante">
                </div>
                <script>
                    function MFinal(){
                        let totalEquipoVisitante=0;
                        let totalEquipoLocal=0;
                        var innings= document.getElementById("inputInnings").value;

                        for (var i = 1; i <= innings; i++) {

                            
                            
                            if(parseInt(document.getElementById("inputInning1"+i).value)){
                                totalEquipoVisitante = parseInt(document.getElementById("inputInning1"+i).value)+totalEquipoVisitante;
                                console.log(totalEquipoVisitante)
                            }

                            if(parseInt(document.getElementById("inputInning2"+i).value)){
                                totalEquipoLocal = parseInt(document.getElementById("inputInning2"+i).value)+totalEquipoLocal;
                            }
                            
                        }
                        document.getElementById("inputFinalLocal").value=totalEquipoLocal;
                        document.getElementById("inputFinalVisitante").value=totalEquipoVisitante;

                        document.getElementById("inputInning1C").value=totalEquipoVisitante;
                        document.getElementById("inputInning2C").value=totalEquipoLocal;

                        if(totalEquipoVisitante>totalEquipoLocal){
                            document.getElementById("inputGano").value="Visitante";
                            document.getElementById("inputPerdio").value="Local";
                        }else if(totalEquipoVisitante<totalEquipoLocal){
                            document.getElementById("inputGano").value="Local";
                            document.getElementById("inputPerdio").value="Visitante";
                        }else{
                            document.getElementById("inputGano").value="Empate";
                            document.getElementById("inputPerdio").value="Empate";
                        }
                        

                    }
                </script>
                <div class="col-md-4 marcadorFinal"  id="maradorFinal">
                    <div class="col-md-4 " style="">
                        <label for="inputFinal" class="form-label" style="width: 140px;"><strong>Marcador Final</strong></label>
                        <div class="row" style="width: 80px; position:relative; left: 30px">
                            <input type="number" class="form-control" id="inputFinalLocal" name="Final1" required="true" readonly>
                            <input type="number" class="form-control" id="inputFinalVisitante" name="Final2" required="true" readonly>
                        </div>
                        
                    </div>
                    <div class="col-md-2" id="innings">
                        <label for="inputInning" class="form-label"><strong>Innings</strong></label>
                        <script>
                            function validarInning(event) {
                                
                                if (event.keyCode === 13) {
                                    /*var innings= document.getElementById("inputInnings").value;
                                    console.log(innings)

                                    for (var i = 1; i <= innings; i++) {
                                        document.getElementById("inputInning1"+i).disabled = false;
                                        document.getElementById("inputInning2"+i).disabled = false;
                                    }
                                    var inn=parseInt(innings)+1;
                                    console.log(inn);
                                    for (var j = inn; j <= 10; j++) {
                                        document.getElementById("inputInning1"+j).disabled = true;
                                        document.getElementById("inputInning2"+j).disabled = true;
                                    }*/
                                    validarI();
                                }
                            }

                            
                            
                            
                        </script>
                        <input type="Number"  class="form-control" id="inputInnings" name="Inning" required="true" tabindex="6" min="0"  oninput="if( this.value.length > 2 )  this.value = this.value.slice(0,2)" max="10" onkeypress="validarInning(event)" value="<?php echo $rowInningsActual['Innings']; ?>">
                    </div>
                </div>
                
                
                
            </div>

            <div class="row" style="height: 20px;  margin-top: 40px; text-align: center;">
                <label for="inputInning" class="form-label"><strong>Marcador</strong></label>
            </div>

            <div class="col-md-12" style="margin-top: 15px; background-color: white;">
                <table class="table" >
                    <thead class="table-success table-striped">
                        <tr>
                            <th style="text-align: center;">Equipos</th>
                            <th style="text-align: center;">01</th>
                            <th style="text-align: center;">02</th>
                            <th style="text-align: center;">03</th>
                            <th style="text-align: center;">04</th>
                            <th style="text-align: center;">05</th>
                            <th style="text-align: center;">06</th>
                            <th style="text-align: center;">07</th>
                            <th style="text-align: center;">08</th>
                            <th style="text-align: center;">09</th>
                            <th style="text-align: center;">10</th>
                            <th style="text-align: center;">C</th>
                            <th style="text-align: center;">H</th>
                            <th style="text-align: center;">E</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <tr>
                            <th>
                                <select id="inputEquipoVisitante" class="form-select" name="EquipoVisitante" required="true" tabindex="7" onchange="cambiarLogoVisitante()">
                                    <?php
                                        $rowEVisitanteActual=mysqli_fetch_array($qEVisitanteActual);
                                        echo "<option value=".$rowEVisitanteActual['IDEquipo']." selected>".$rowEVisitanteActual['Nombre']."</option>";

                                        while ($rowEV=mysqli_fetch_array($queryEquipo)) {
                                            echo "<option value=".$rowEV['IDEquipo']." placeholder=".$rowEV['Nombre'].">".$rowEV['Nombre']."</option>";
                                        }
                                    ?>
                                </select>
                            </th>
                            <th style="width: 60px; ">
                                <div class="col-md-2" style="width: 60px;">
                                    <?php 
                                        $InningActual="SELECT  *  FROM Entradas WHERE IDJuego = '$rowJA[IDJuego]' AND IDInning='1'";
                                        $qInningActual=mysqli_query($con, $InningActual);
                                        $rowIA11=mysqli_fetch_array($qInningActual);
                                    ?>
                                    <input type="Number"  class="form-control" id="inputInning11" name="Inning11" required="true"   tabindex="9" min="0" oninput="MFinal()" disabled value="<?php echo $rowIA11['CarrerasVisitante']; ?>">
                                </div>
                            </th>
                            <th style="width: 60px;">
                                <div class="col-md-2" style="width: 60px;">
                                    <?php 
                                        $InningActual="SELECT  *  FROM Entradas WHERE IDJuego = '$rowJA[IDJuego]' AND IDInning='2'";
                                        $qInningActual=mysqli_query($con, $InningActual);
                                        $rowIA12=mysqli_fetch_array($qInningActual);
                                    ?>
                                    <input type="Number"  class="form-control" id="inputInning12" name="Inning12" required="true" tabindex="11" min="0" oninput="MFinal()"  disabled value="<?php echo $rowIA12['CarrerasVisitante']; ?>">
                                </div>
                            </th>
                            <th style="width: 60px;">
                                <div class="col-md-2" style="width: 60px;">
                                    <?php 
                                        $InningActual="SELECT  *  FROM Entradas WHERE IDJuego = '$rowJA[IDJuego]' AND IDInning='3'";
                                        $qInningActual=mysqli_query($con, $InningActual);
                                        $rowIA13=mysqli_fetch_array($qInningActual);
                                    ?>
                                    <input type="Number"  class="form-control" id="inputInning13" name="Inning13" required="true" tabindex="13" min="0" oninput="MFinal()" disabled value="<?php echo $rowIA13['CarrerasVisitante']; ?>">
                                </div>
                            </th>
                            <th style="width: 60px;">
                                <div class="col-md-2" style="width: 60px;">
                                    <?php 
                                        $InningActual="SELECT  *  FROM Entradas WHERE IDJuego = '$rowJA[IDJuego]' AND IDInning='4'";
                                        $qInningActual=mysqli_query($con, $InningActual);
                                        $rowIA14=mysqli_fetch_array($qInningActual);
                                    ?>
                                    <input type="Number"  class="form-control" id="inputInning14" name="Inning14" required="true" tabindex="15" min="0" oninput="MFinal()" disabled value="<?php echo $rowIA14['CarrerasVisitante']; ?>">
                                </div>
                            </th>
                            <th style="width: 60px;">
                                <div class="col-md-2" style="width: 60px;">
                                    <?php 
                                        $InningActual="SELECT  *  FROM Entradas WHERE IDJuego = '$rowJA[IDJuego]' AND IDInning='5'";
                                        $qInningActual=mysqli_query($con, $InningActual);
                                        $rowIA15=mysqli_fetch_array($qInningActual);
                                    ?>
                                    <input type="Number"  class="form-control" id="inputInning15" name="Inning15" required="true" tabindex="17" min="0" oninput="MFinal()" disabled value="<?php echo $rowIA15['CarrerasVisitante']; ?>">
                                </div>
                            </th>
                            <th style="width: 60px;">
                                <div class="col-md-2" style="width: 60px;">
                                    <?php 
                                        $InningActual="SELECT  *  FROM Entradas WHERE IDJuego = '$rowJA[IDJuego]' AND IDInning='6'";
                                        $qInningActual=mysqli_query($con, $InningActual);
                                        $rowIA16=mysqli_fetch_array($qInningActual);
                                    ?>
                                    <input type="Number"  class="form-control" id="inputInning16" name="Inning16" required="true" tabindex="19" min="0" oninput="MFinal()" disabled value="<?php echo $rowIA16['CarrerasVisitante']; ?>">
                                </div>
                            </th>
                            <th style="width: 60px;">
                                <div class="col-md-2" style="width: 60px;">
                                    <?php 
                                        $InningActual="SELECT  *  FROM Entradas WHERE IDJuego = '$rowJA[IDJuego]' AND IDInning='7'";
                                        $qInningActual=mysqli_query($con, $InningActual);
                                        $rowIA17=mysqli_fetch_array($qInningActual);
                                    ?>
                                    <input type="Number"  class="form-control" id="inputInning17" name="Inning17" required="true" tabindex="21" min="0" oninput="MFinal()" disabled value="<?php echo $rowIA17['CarrerasVisitante']; ?>">
                                </div>
                            </th>
                            <th style="width: 60px;">
                                <div class="col-md-2" style="width: 60px;">
                                    <?php 
                                        $InningActual="SELECT  *  FROM Entradas WHERE IDJuego = '$rowJA[IDJuego]' AND IDInning='8'";
                                        $qInningActual=mysqli_query($con, $InningActual);
                                        $rowIA18=mysqli_fetch_array($qInningActual);
                                    ?>
                                    <input type="Number"  class="form-control" id="inputInning18" name="Inning18" required="true" tabindex="23" min="0" oninput="MFinal()" disabled value="<?php echo $rowIA18['CarrerasVisitante']; ?>">
                                </div>
                            </th>
                            <th style="width: 60px;">
                                <div class="col-md-2" style="width: 60px;">
                                    <?php 
                                        $InningActual="SELECT  *  FROM Entradas WHERE IDJuego = '$rowJA[IDJuego]' AND IDInning='9'";
                                        $qInningActual=mysqli_query($con, $InningActual);
                                        $rowIA19=mysqli_fetch_array($qInningActual);
                                    ?>
                                    <input type="Number"  class="form-control" id="inputInning19" name="Inning19" required="true" tabindex="25" min="0" oninput="MFinal()" disabled value="<?php echo $rowIA19['CarrerasVisitante']; ?>">
                                </div>
                            </th>
                            <th style="width: 60px;">
                                <div class="col-md-2" style="width: 60px;">
                                    <?php 
                                        $InningActual="SELECT  *  FROM Entradas WHERE IDJuego = '$rowJA[IDJuego]' AND IDInning='10'";
                                        $qInningActual=mysqli_query($con, $InningActual);
                                        $rowIA110=mysqli_fetch_array($qInningActual);
                                    ?>
                                    <input type="Number"  class="form-control" id="inputInning110" name="Inning110" required="true" tabindex="27" min="0" oninput="MFinal()" disabled value="<?php echo $rowIA110['CarrerasVisitante']; ?>">
                                </div>
                            </th>
                            <th style="width: 60px;">
                                <div class="col-md-2" style="width: 60px;">
                                    <?php 
                                        $InningActual="SELECT  *  FROM Juegos WHERE IDJuego = '$rowJA[IDJuego]'";
                                        $qInningActual=mysqli_query($con, $InningActual);
                                        $rowIA1C=mysqli_fetch_array($qInningActual);
                                    ?>
                                    <input type="Number"  class="form-control" id="inputInning1C" name="Inning1C" required="true" tabindex="29" min="0"  readonly value="<?php echo $rowIA1C['CarrerasVisitante']; ?>">
                                </div>
                            </th>
                            <th style="width: 60px;">
                                <div class="col-md-2" style="width: 60px;">
                                   
                                    <input type="Number"  class="form-control" id="inputInning1H" name="Inning1H" required="true" tabindex="31" min="0"  value="<?php echo $rowIA1C['HitsVisitante']; ?>">
                                </div>
                            </th>
                            <th style="width: 60px;">
                                <div class="col-md-2" style="width: 60px;">
                                    
                                    <input type="Number"  class="form-control" id="inputInning1E" name="Inning1E" required="true" tabindex="33" min="0"  value="<?php echo $rowIA1C['ErroresVisitante']; ?>">
                                </div>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <select id="inputEquipoLocal" class="form-select" name="EquipoLocal" required="true" tabindex="8" onchange="cambiarLogoLocal()">
                                    <?php
                                        $rowELocalActual=mysqli_fetch_array($qELocalActual);
                                        echo "<option value=".$rowELocalActual['IDEquipo']." selected>".$rowELocalActual['Nombre']."</option>";


                                        while ($rowEL=mysqli_fetch_array($queryEquipoLocal)) {
                                            echo "<option value=".$rowEL['IDEquipo'].">".$rowEL['Nombre']."</option>";
                                        }
                                    ?>
                                </select>
                            </th>
                            <th style="width: 60px;">
                                <div class="col-md-2" style="width: 60px;">
                                    <?php 
                                        $InningActual="SELECT  *  FROM Entradas WHERE IDJuego = '$rowJA[IDJuego]' AND IDInning='1'";
                                        $qInningActual=mysqli_query($con, $InningActual);
                                        $rowIA21=mysqli_fetch_array($qInningActual);
                                    ?>
                                    <input type="Number"  class="form-control" id="inputInning21" name="Inning21" required="true" tabindex="10" min="0" oninput="MFinal()" disabled value="<?php echo $rowIA21['CarrerasLocal']; ?>">
                                </div>
                            </th>
                            <th style="width: 60px;">
                                <div class="col-md-2" style="width: 60px;">
                                    <?php 
                                        $InningActual="SELECT  *  FROM Entradas WHERE IDJuego = '$rowJA[IDJuego]' AND IDInning='2'";
                                        $qInningActual=mysqli_query($con, $InningActual);
                                        $rowIA22=mysqli_fetch_array($qInningActual);
                                    ?>
                                    <input type="Number"  class="form-control" id="inputInning22" name="Inning22" required="true" tabindex="12" min="0" oninput="MFinal()" disabled value="<?php echo $rowIA22['CarrerasLocal']; ?>">
                                </div>
                            </th>
                            <th style="width: 60px;">
                                <div class="col-md-2" style="width: 60px;">
                                    <?php 
                                        $InningActual="SELECT  *  FROM Entradas WHERE IDJuego = '$rowJA[IDJuego]' AND IDInning='3'";
                                        $qInningActual=mysqli_query($con, $InningActual);
                                        $rowIA23=mysqli_fetch_array($qInningActual);
                                    ?>
                                    <input type="Number"  class="form-control" id="inputInning23" name="Inning23" required="true" tabindex="14" min="0" oninput="MFinal()" disabled value="<?php echo $rowIA23['CarrerasLocal']; ?>">
                                </div>
                            </th>
                            <th style="width: 60px;">
                                <div class="col-md-2" style="width: 60px;">
                                    <?php 
                                        $InningActual="SELECT  *  FROM Entradas WHERE IDJuego = '$rowJA[IDJuego]' AND IDInning='4'";
                                        $qInningActual=mysqli_query($con, $InningActual);
                                        $rowIA24=mysqli_fetch_array($qInningActual);
                                    ?>
                                    <input type="Number"  class="form-control" id="inputInning24" name="Inning24" required="true" tabindex="16" min="0" oninput="MFinal()" disabled value="<?php echo $rowIA24['CarrerasLocal']; ?>">
                                </div>
                            </th>
                            <th style="width: 60px;">
                                <div class="col-md-2" style="width: 60px;">
                                    <?php 
                                        $InningActual="SELECT  *  FROM Entradas WHERE IDJuego = '$rowJA[IDJuego]' AND IDInning='5'";
                                        $qInningActual=mysqli_query($con, $InningActual);
                                        $rowIA25=mysqli_fetch_array($qInningActual);
                                    ?>
                                    <input type="Number"  class="form-control" id="inputInning25" name="Inning25" required="true" tabindex="18" min="0" oninput="MFinal()" disabled value="<?php echo $rowIA25['CarrerasLocal']; ?>">
                                </div>
                            </th>
                            <th style="width: 60px;">
                                <div class="col-md-2" style="width: 60px;">
                                    <?php 
                                        $InningActual="SELECT  *  FROM Entradas WHERE IDJuego = '$rowJA[IDJuego]' AND IDInning='6'";
                                        $qInningActual=mysqli_query($con, $InningActual);
                                        $rowIA26=mysqli_fetch_array($qInningActual);
                                    ?>
                                    <input type="Number"  class="form-control" id="inputInning26" name="Inning26" required="true" tabindex="20" min="0" oninput="MFinal()" disabled value="<?php echo $rowIA26['CarrerasLocal']; ?>">
                                </div>
                            </th>
                            <th style="width: 60px;">
                                <div class="col-md-2" style="width: 60px;">
                                    <?php 
                                        $InningActual="SELECT  *  FROM Entradas WHERE IDJuego = '$rowJA[IDJuego]' AND IDInning='7'";
                                        $qInningActual=mysqli_query($con, $InningActual);
                                        $rowIA27=mysqli_fetch_array($qInningActual);
                                    ?>
                                    <input type="Number"  class="form-control" id="inputInning27" name="Inning27" required="true" tabindex="22" min="0" oninput="MFinal()" disabled value="<?php echo $rowIA27['CarrerasLocal']; ?>">
                                </div>
                            </th>
                            <th style="width: 60px;">
                                <div class="col-md-2" style="width: 60px;">
                                    <?php 
                                        $InningActual="SELECT  *  FROM Entradas WHERE IDJuego = '$rowJA[IDJuego]' AND IDInning='8'";
                                        $qInningActual=mysqli_query($con, $InningActual);
                                        $rowIA28=mysqli_fetch_array($qInningActual);
                                    ?>
                                    <input type="Number"  class="form-control" id="inputInning28" name="Inning28" required="true" tabindex="24" min="0" oninput="MFinal()" disabled value="<?php echo $rowIA28['CarrerasLocal']; ?>">
                                </div>
                            </th>
                            <th style="width: 60px;">
                                <div class="col-md-2" style="width: 60px;">
                                    <?php 
                                        $InningActual="SELECT  *  FROM Entradas WHERE IDJuego = '$rowJA[IDJuego]' AND IDInning='9'";
                                        $qInningActual=mysqli_query($con, $InningActual);
                                        $rowIA29=mysqli_fetch_array($qInningActual);
                                    ?>
                                    <input type="Number"  class="form-control" id="inputInning29" name="Inning29" required="true" tabindex="26" min="0" oninput="MFinal()" disabled value="<?php echo $rowIA29['CarrerasLocal']; ?>">
                                </div>
                            </th>
                            <th style="width: 60px;">
                                <div class="col-md-2" style="width: 60px;">
                                    <?php 
                                        $InningActual="SELECT  *  FROM Entradas WHERE IDJuego = '$rowJA[IDJuego]' AND IDInning='10'";
                                        $qInningActual=mysqli_query($con, $InningActual);
                                        $rowIA210=mysqli_fetch_array($qInningActual);
                                    ?>
                                    <input type="Number"  class="form-control" id="inputInning210" name="Inning210" required="true" tabindex="28" min="0" oninput="MFinal()" disabled value="<?php echo $rowIA210['CarrerasLocal']; ?>">
                                </div>
                            </th>
                            <th style="width: 60px;">
                                <div class="col-md-2" style="width: 60px;">
                                    <?php 
                                        $InningActual="SELECT  *  FROM Juegos WHERE IDJuego = '$rowJA[IDJuego]'";
                                        $qInningActual=mysqli_query($con, $InningActual);
                                        $rowIA2C=mysqli_fetch_array($qInningActual);
                                    ?>
                                    <input type="Number"  class="form-control" id="inputInning2C" name="Inning2C" required="true" tabindex="30" min="0"  readonly value="<?php echo $rowIA2C['CarrerasLocal']; ?>">
                                </div>
                            </th>
                            <th style="width: 60px;">
                                <div class="col-md-2" style="width: 60px;">
                                    <input type="Number"  class="form-control" id="inputInning2H" name="Inning2H" required="true" tabindex="32" min="0" value="<?php echo $rowIA2C['HitsLocal']; ?>">
                                </div>
                            </th>
                            <th style="width: 60px;">
                                <div class="col-md-2" style="width: 60px;">
                                    <input type="Number"  class="form-control" id="inputInning2E" name="Inning2E" required="true" tabindex="34" min="0" value="<?php echo $rowIA2C['ErroresLocal']; ?>">
                                </div>
                            </th>
                        </tr>
                    </tbody>

                    
                </table>
            </div>



            <div class="row">
                <div class="col-md-1" style="width: 55px;">
                    <label for="inputGano" class="form-label"><strong>Ganó:</strong></label>
                </div>
                <div class="col-md-3">

                    <input type="Text" class="form-control" id="inputGano" name="Gano" required="true" readonly>
                </div>
                <div class="col-md-1" style="width: 55px;">
                    <label for="inputPerdio" class="form-label"><strong>Perdió:</strong></label>
                </div>
                <div class="col-md-3">
                    <input type="Text" class="form-control" id="inputPerdio" name="Perdio" required="true" readonly>
                </div>
                <div class="col-md-1" style="width: 55px;">
                    <label for="inputSalvo" class="form-label"><strong>Salvó:</strong></label>
                </div>
                <div class="col-md-3">
                    <input type="Text" class="form-control" id="inputSalvo" name="Salvo" required="true" readonly>
                </div>
                <div class="col-md-6">
                    <div class="row ampayerHome">
                        <div class="col-md-5" >
                            <label for="inputAmpayerHome" class="form-label"><strong>Ampayer de Home:</strong></label>
                        </div>
                        <div class="col-md-7" >
                            <select id="inputEquipoLocal" class="form-select" name="AmpayerHome" required="true" >
                                
                                <?php
                                    $rowAHomeActual=mysqli_fetch_array($qAHomeActual);
                                    echo "<option value=".$rowAHomeActual['IDAmpayer']." selected>".$rowAHomeActual['Abreviacion']."</option>";
            
                                    while ($rowAH=mysqli_fetch_array($queryAmpayerHome)) {
                                        echo "<option value=".$rowAH['IDAmpayer'].">".$rowAH['Abreviacion']."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-5" style="position: relative; top: 10px;">
                            <label for="inputAmpayerBases" class="form-label"><strong>Ampayer en Bases:</strong></label>
                        </div>
                        <div class="col-md-7" style="position: relative; right: 0%; top: 10px;">
                            <select id="inputEquipoLocal" class="form-select" name="AmpayerBase" required="true" >
                                <?php
                                    $rowABasesActual=mysqli_fetch_array($qABasesActual);
                                    echo "<option value=".$rowABasesActual['IDAmpayer']." selected>".$rowABasesActual['Abreviacion']."</option>";

                                    while ($rowAB=mysqli_fetch_array($queryAmpayerBases)) {
                                        echo "<option value=".$rowAB['IDAmpayer'].">".$rowAB['Abreviacion']."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-md-1" style="width: 55px; position: relative; top: 20px;">
                    <label for="inputSalvo" class="form-label"><strong>Aviso:</strong></label>
                </div>
                <div class="col-md-3" style="position: relative; top: 20px;">
                    <select id="inputEquipoLocal" class="form-select" name="Aviso"  >
                        <?php
                            $rowAActual=mysqli_fetch_array($qAvisoActual);
                            echo "<option value=".$rowAActual['IDAviso']." selected>".$rowAActual['Aviso']."</option>";

                            while ($rowAV=mysqli_fetch_array($queryAviso)) {
                                echo "<option value=".$rowAV['IDAviso'].">".$rowAV['Aviso']."</option>";
                            }
                        ?>
                    </select>
                </div>
            </div>



            <div class="col-12" id="btnRegistrar">
                <button type="submit" class="btn btn-primary " id="btnRegistrar1"><strong>Editar</strong></button>
            </div>
        </form>
        <br>
        <br>
        
        
    </div>
</body>

</html>