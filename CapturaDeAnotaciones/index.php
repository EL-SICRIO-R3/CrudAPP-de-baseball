<?php 
    include("conexiones.php");
    $con=conectar();

    $sql="SELECT *  FROM Juegos";
    $query=mysqli_query($con,$sql);

    $sqlId="SELECT count(IDJuego) as id  FROM Juegos";
    $queryId=mysqli_query($con,$sqlId);


    /*try{
        $idEquipo=$_GET['id'];
        if($idEquipo == null){
            $idI = 0000;
        }else{
            $sqlInn="SELECT COUNT(*) AS Total FROM entradas WHERE IDJuego = " . $idEquipo;
            $queryInn=mysqli_query($con, $sqlInn);
            $idInn=mysqli_fetch_array($queryInn);
            $idI=$idInn['Total'];
       
        }
        
    } catch (Exception $e){

    }*/
        














    

    $id=mysqli_fetch_array($queryId);
 
    $sqlTemporada="SELECT *  FROM Temporadas";
    $queryTemporada=mysqli_query($con, $sqlTemporada);

    $sqlParque="SELECT *  FROM Parques";
    $queryParque=mysqli_query($con, $sqlParque);

    $sqlEquipo="SELECT *  FROM Equipos";
    $queryEquipo=mysqli_query($con, $sqlEquipo);

    $sqlEquipoLocal="SELECT *  FROM Equipos";
    $queryEquipoLocal=mysqli_query($con, $sqlEquipoLocal);
    
    
    
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
    <!-- <script src="https://code.jquery.com/jquery-3.6.3.slim.min.js" integrity="sha256-ZwqZIVdD3iXNyGHbSYdsmWP//UBokj2FHAxKuSBKDSo=" crossorigin="anonymous"></script>-->
    <script type= "text/javascript" src="../js/jquery-3.2.1.min.js"></script>
    
    
</head>




<body>


    <div class="container" style="margin-top: 10px; " >
        <nav class="navbar navbar-expand-lg bg-body-tertiary" id="header">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Liga MLB</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="../CapturaDeJuegos/">Partidos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../Equipos/">Equipos</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="../Jugadores/">Jugadores</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " href="../Ampayers/">Ampayers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../Manejadores/">Manejadores</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../Parques/">Parques</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../Ligas/">Ligas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../Temporadas/">Temporadas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../Rosters/">Rosters</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../Avisos/">Avisos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="../CapturaDeAnotaciones/">Anotaciones</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Buscar</button>
                    </form>
                </div>
            </div>
        </nav>
    </div>

    <div class="container" style="margin-top: 40px; background-color: white; border-radius: 40px; height:600px; " id="contenedorFormulario">
        <form class="row g-3" action="insertar.php" method="POST" id="formulario" name="formulario">
            <div class="col-md-2" style="width: 150px;">
                <label for="inputIDJuego" class="form-label"><strong>ID Juego</strong></label>
                <input type="Number"  class="form-control" id="inputIDJuego"  name="IDJuego" required="true" oninput="if( this.value.length > 2 )  this.value = this.value.slice(0,4)" max="10" onkeypress="PruebaP(event,1)">
            </div>
            
            <div class="col-md-3" >
                <label for="inputBateadores" class="form-label"><strong>Bateadores</strong></label>
                <select id="inputBateadores" class="form-select" name="Bateadores" required="true" disabled>

                </select>
            </div>
            <div class="col-md-3" >
                <label for="inputLanzador" class="form-label"><strong>Lanzador Enfrentado</strong></label>
                <select id="inputLanzador" class="form-select" name="Lanzador" required="true" disabled>
                    
                </select>
            </div>
            <div class="col-md-3">
                <label for="EqBat" class="form-label" style="display: block;"><strong>Equipo al Bat</strong></label>
                <button type="button" class="btn btn-secondary" id="btnEBat1"  onclick="EquiBat('btnEBat1','Visitante',2)" disabled>Visitante</button>
                <button type="button" class="btn btn-secondary" id="btnEBat2"  onclick="EquiBat('btnEBat2','Local',2)" disabled>Local</button>
                <input type="text" class="invisible" style="display: none;" value=1 id="EqBat" name="EqBat" required="true">
                <input type="text" class="invisible" style="display: none;" value=1 id="EqBatIDEquipo" name="EqBatIDEquipo" required="true">

            </div>
  
            <div class="col-2" style="display: block; margin-top: 0px;">
                <label for="OrBatIn" class="form-label"><strong>Orden al Bat</strong></label>
                <div class="btn-group me-2" role="group" aria-label="Botones">
                    <button type="button" class="btn btn-secondary btn-b" id="btnOB1" onclick="OrBt('btnOB1')">1</button>
                    <button type="button" class="btn btn-secondary btn-b" id="btnOB2" onclick="OrBt('btnOB2')">2</button>
                    <button type="button" class="btn btn-secondary btn-b" id="btnOB3" onclick="OrBt('btnOB3')">3</button>
                    <button type="button" class="btn btn-secondary btn-b" id="btnOB4" onclick="OrBt('btnOB4')">4</button>
                </div>
                <div class="btn-group me-2" role="group" aria-label="Botones">
                    <button type="button" class="btn btn-secondary btn-b" id="btnOB5" onclick="OrBt('btnOB5')">5</button>
                    <button type="button" class="btn btn-secondary btn-b" id="btnOB6" onclick="OrBt('btnOB6')">6</button>
                    <button type="button" class="btn btn-secondary btn-b" id="btnOB7" onclick="OrBt('btnOB7')">7 </button>
                    <button type="button" class="btn btn-secondary btn-b" id="btnOB8" onclick="OrBt('btnOB8')">8 </button>
                </div>
                <div class="btn-group me-2" role="group" aria-label="Botones">
                    <button type="button" class="btn btn-secondary btn-b" id="btnOB9" onclick="OrBt('btnOB9')">9</button>
                    <button type="button" class="btn btn-secondary btn-b" id="btnOB10" onclick="OrBt('btnOB10')">10</button>
                    <button type="button" class="btn btn-secondary btn-b" id="btnOB11" onclick="OrBt('btnOB11')">11</button>
                    <button type="button" class="btn btn-secondary btn-b" id="btnOB12" onclick="OrBt('btnOB12')">12</button>
                </div>
                <input type="text" class="invisible" style="display: none;" id="OrBatIn" name="NOrBat" required="true">
            </div>
            <div class="col-2" style="display: block; margin-left: 20px; margin-top: 0px;">
                <label for="Posicion" class="form-label"><strong>Posición</strong></label>
                <div class="btn-group me-2" role="group" aria-label="Botones">
                    <button type="button" class="btn btn-secondary btn-b" id="btnP1" onclick="Po('btnP1')">P</button>
                    <button type="button" class="btn btn-secondary btn-b" id="btnP2" onclick="Po('btnP2')">C</button>
                    <button type="button" class="btn btn-secondary btn-b" id="btnP3" onclick="Po('btnP3')">1B</button>
                    <button type="button" class="btn btn-secondary btn-b" id="btnP4" onclick="Po('btnP4')">2B</button>
                </div>
                <div class="btn-group me-2" role="group" aria-label="Botones">
                    <button type="button" class="btn btn-secondary btn-b" id="btnP5" onclick="Po('btnP5')">3B</button>
                    <button type="button" class="btn btn-secondary btn-b" id="btnP6" onclick="Po('btnP6')">SS</button>
                    <button type="button" class="btn btn-secondary btn-b" id="btnP7" onclick="Po('btnP7')">LF</button>
                    <button type="button" class="btn btn-secondary btn-b" id="btnP8" onclick="Po('btnP8')">CF</button>
                </div>
                <div class="btn-group me-2" role="group" aria-label="Botones">
                    <button type="button" class="btn btn-secondary btn-b" id="btnP9" onclick="Po('btnP9')">RF</button>
                    <button type="button" class="btn btn-secondary btn-b" id="btnP10" onclick="Po('btnP10')">DE</button>
                    <button type="button" class="btn btn-secondary btn-b" id="btnP11" onclick="Po('btnP11')">JD</button>
                    <button type="button" class="btn btn-secondary btn-b" id="btnP12" onclick="Po('btnP12')">BC</button>
                </div>
                <input type="text" class="invisible" style="display: none;" id="Posicion" name="Posicion" required="true">
            </div>
             <div class="col-2" style="display: block; margin-left: 20px; margin-top: 0px;">
                <label for="Inni" class="form-label"><strong>Inning</strong></label>
                <div class="btn-group me-2" role="group" aria-label="Botones">
                    <button type="button" class="btn btn-secondary btn-b" id="btnIn1" onclick="Inn('btnIn1')" disabled>1</button>
                    <button type="button" class="btn btn-secondary btn-b" id="btnIn2" onclick="Inn('btnIn2')" disabled>2</button>
                    <button type="button" class="btn btn-secondary btn-b" id="btnIn3" onclick="Inn('btnIn3')" disabled>3</button>
                    <button type="button" class="btn btn-secondary btn-b" id="btnIn4" onclick="Inn('btnIn4')" disabled>4</button>
                </div>
                <div class="btn-group me-2" role="group" aria-label="Botones">
                    <button type="button" class="btn btn-secondary btn-b" id="btnIn5" onclick="Inn('btnIn5')" disabled>5</button>
                    <button type="button" class="btn btn-secondary btn-b" id="btnIn6" onclick="Inn('btnIn6')" disabled>6</button>
                    <button type="button" class="btn btn-secondary btn-b" id="btnIn7" onclick="Inn('btnIn7')" disabled>7</button>
                    <button type="button" class="btn btn-secondary btn-b" id="btnIn8" onclick="Inn('btnIn8')" disabled>8</button>
                </div>
                <div class="btn-group me-2" role="group" aria-label="Botones">
                    <button type="button" class="btn btn-secondary btn-b" id="btnIn9" onclick="Inn('btnIn9')" disabled>9</button>
                    <button type="button" class="btn btn-secondary btn-b" id="btnIn10" onclick="Inn('btnIn10')" disabled>10</button>
                    <button type="button" class="btn btn-secondary btn-b" id="btnIn11" onclick="Inn('btnIn11')" disabled>11</button>
                    <button type="button" class="btn btn-secondary btn-b" id="btnIn12" onclick="Inn('btnIn12')" disabled>12</button>
                </div>
                <input type="text" class="invisible" style="display: none;" id="Inni" name="Inni" required="true">
            </div>
            
            <div class="col-2" style="display: block; margin-left: 20px; margin-top: 0px; width: 125px;">
                <label for="CarrCheck" class="form-label"><strong>Carreras</strong></label>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="CarrCheck" name="CarrCheck" value="1">
                    <label class="form-check-label" for="CarrCheck">Anotada</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="CarrPCheck" id="R1" value="1" >
                    <label class="form-check-label" for="R1">
                        1 Producida
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="CarrPCheck" id="R2" value="2">
                    <label class="form-check-label" for="R2">
                        2 Producida
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="CarrPCheck" id="R3" value="3">
                    <label class="form-check-label" for="R3">
                        3 Producida
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="CarrPCheck" id="R4" value="4">
                    <label class="form-check-label" for="R4">
                        4 Producida
                    </label>
                </div>
                <!--<button type="button" class="btn btn-secondary" style="width: fit-content;" id="btnJ12"  onclick="CleanRB()">Limpiar Radio</button>-->
            </div>
            <div class="col-md-1" style="padding-top: 15px;padding-left: 0px; display: flex;">
                <button type="button" class="btn btn-secondary" style="width: fit-content;" id=""  onclick="CleanRB()">Limpiar Radio</button>
            </div>

            

            <div class="col-19" style="display: block;width: min-content;margin-top: 0px;height: auto;">
                <label for="inputJornada1" class="form-label" style="display: block;"><strong>Jornada</strong></label>
                <div class="btn-group me-2" role="group" aria-label="Botones">
                    <button type="button" class="btn btn-secondary btn-p" id="btnJornada1" onclick="Jornada('btnJornada1')">Out</button>
                    <button type="button" class="btn btn-secondary btn-p" id="btnJornada2" onclick="Jornada('btnJornada2')">X</button>
                    <button type="button" class="btn btn-secondary btn-p" id="btnJornada3" onclick="Jornada('btnJornada3')">Obs</button>
                    <button type="button" class="btn btn-secondary btn-p" id="btnJornada4" onclick="Jornada('btnJornada4')">Fly</button>
                    <button type="button" class="btn btn-secondary btn-p" id="btnJornada5" onclick="Jornada('btnJornada5')">BB</button>
                    <button type="button" class="btn btn-secondary btn-p" id="btnJornada6" onclick="Jornada('btnJornada6')">Rol</button>
                    <button type="button" class="btn btn-secondary btn-p" id="btnJornada7" onclick="Jornada('btnJornada7')">1</button>
                    <button type="button" class="btn btn-secondary btn-p" id="btnJornada8" onclick="Jornada('btnJornada8')">2</button>
                    <button type="button" class="btn btn-secondary btn-p" id="btnJornada9" onclick="Jornada('btnJornada9')">3</button>
                    <button type="button" class="btn btn-secondary btn-p" id="btnJornada10" onclick="Jornada('btnJornada10')">4</button>
                    <button type="button" class="btn btn-secondary btn-p" id="btnJornada11" onclick="Jornada('btnJornada11')">5</button>
                    <button type="button" class="btn btn-secondary btn-p" id="btnJornada12" onclick="Jornada('btnJornada12')">TS</button>
                    <button type="button" class="btn btn-secondary btn-p" id="btnJornada13" onclick="Jornada('btnJornada13')">IH</button>
                    <button type="button" class="btn btn-secondary btn-p" id="btnJornada14" onclick="Jornada('btnJornada14')">H1</button>
                    <button type="button" class="btn btn-secondary btn-p" id="btnJornada15" onclick="Jornada('btnJornada15')">H2</button>
                    <button type="button" class="btn btn-secondary btn-p" id="btnJornada16" onclick="Jornada('btnJornada16')">H3</button>
                </div>
                <div class="btn-group me-2" role="group" aria-label="Botones">
                    <button type="button" class="btn btn-secondary btn-p" id="btnJornada17" onclick="Jornada('btnJornada17')">OR</button>
                    <button type="button" class="btn btn-secondary btn-p" id="btnJornada18" onclick="Jornada('btnJornada18')">FC</button>
                    <button type="button" class="btn btn-secondary btn-p" id="btnJornada19" onclick="Jornada('btnJornada19')">Err</button>
                    <button type="button" class="btn btn-secondary btn-p" id="btnJornada20" onclick="Jornada('btnJornada20')">Lin</button>
                    <button type="button" class="btn btn-secondary btn-p" id="btnJornada21" onclick="Jornada('btnJornada21')">BG</button>
                    <button type="button" class="btn btn-secondary btn-p" id="btnJornada22" onclick="Jornada('btnJornada22')">K</button>
                    <button type="button" class="btn btn-secondary btn-p" id="btnJornada23" onclick="Jornada('btnJornada23')">6</button>
                    <button type="button" class="btn btn-secondary btn-p" id="btnJornada24" onclick="Jornada('btnJornada24')">7</button>
                    <button type="button" class="btn btn-secondary btn-p" id="btnJornada25" onclick="Jornada('btnJornada25')">8</button>
                    <button type="button" class="btn btn-secondary btn-p" id="btnJornada26" onclick="Jornada('btnJornada26')">9</button>
                    <button type="button" class="btn btn-secondary btn-p" id="btnJornada27" onclick="Jornada('btnJornada27')">10</button>
                    <button type="button" class="btn btn-secondary btn-p" id="btnJornada28" onclick="Jornada('btnJornada28')">FS</button>
                    <button type="button" class="btn btn-secondary btn-p" id="btnJornada29" onclick="Jornada('btnJornada29')">HR1</button>
                    <button type="button" class="btn btn-secondary btn-p" id="btnJornada30" onclick="Jornada('btnJornada30')">HR2</button>
                    <button type="button" class="btn btn-secondary btn-p" id="btnJornada31" onclick="Jornada('btnJornada31')">HR3</button>
                    <button type="button" class="btn btn-secondary btn-p" id="btnJornada32" onclick="Jornada('btnJornada32')">HR4</button>
                </div>
            </div>
            <div class="col-md-3" style="padding-top: 15px;padding-left: 0px; display: flex;">
                <input type="text" class="form-control input-j" style="border-right: 2px solid; text-align: center;" id="inputJornada1" name="Jornada1" required="true" >
                <input type="text" class="form-control input-j" style="border-left: 2px solid; text-align: center;" id="inputJornada2" name="Jornada2" required="true" >
            </div>


            <div class="col-19" style="display: block;width: min-content;margin-top: 0px;">
                <label for="inputDetalles" class="form-label" style="display: block;"><strong>Detalles</strong></label>
                <div class="btn-group me-2" role="group" aria-label="Botones">
                    <button type="button" class="btn btn-secondary btn-p" id="btnDetalles1" onclick="Detalles('btnDetalles1')">RB2</button>
                    <button type="button" class="btn btn-secondary btn-p" id="btnDetalles2" onclick="Detalles('btnDetalles2')">RE</button>
                    <button type="button" class="btn btn-secondary btn-p" id="btnDetalles3" onclick="Detalles('btnDetalles3')">BE</button>
                    <button type="button" class="btn btn-secondary btn-p" id="btnDetalles4" onclick="Detalles('btnDetalles4')">ED</button>
                    <button type="button" class="btn btn-secondary btn-p" id="btnDetalles5" onclick="Detalles('btnDetalles5')">DP</button>
                    <button type="button" class="btn btn-secondary btn-p" id="btnDetalles6" onclick="Detalles('btnDetalles6')">FF</button>
                    <button type="button" class="btn btn-secondary btn-p" id="btnDetalles7" onclick="Detalles('btnDetalles7')">1</button>
                    <button type="button" class="btn btn-secondary btn-p" id="btnDetalles8" onclick="Detalles('btnDetalles8')">2</button>
                    <button type="button" class="btn btn-secondary btn-p" id="btnDetalles9" onclick="Detalles('btnDetalles9')">3</button>
                    <button type="button" class="btn btn-secondary btn-p" id="btnDetalles10" onclick="Detalles('btnDetalles10')">4</button>
                    <button type="button" class="btn btn-secondary btn-p" id="btnDetalles11" onclick="Detalles('btnDetalles11')">5</button>
                    <button type="button" class="btn btn-secondary btn-p" id="btnDetalles12" onclick="Detalles('btnDetalles12')">ORB</button>
                    <button type="button" class="btn btn-secondary btn-p" id="btnDetalles13" onclick="Detalles('btnDetalles13')">LO</button>
                    <button type="button" class="btn btn-secondary btn-p" id="btnDetalles14" onclick="Detalles('btnDetalles14')">HRC</button>
                    <button type="button" class="btn btn-secondary btn-p" id="btnDetalles15" onclick="Detalles('btnDetalles15')">ORC</button>
                    <button type="button" class="btn btn-secondary btn-p" id="btnDetalles16" onclick="Detalles('btnDetalles16')">WO</button>
                    <button type="button" class="btn btn-secondary btn-p" id="btnDetalles17" onclick="Detalles('btnDetalles17')">PB</button>
                    <button type="button" class="btn btn-secondary btn-p" id="btnDetalles18" onclick="Detalles('btnDetalles18')">WP</button>
                </div>
                <div class="btn-group me-2" role="group" aria-label="Botones">
                    <button type="button" class="btn btn-secondary btn-p" id="btnDetalles19" onclick="Detalles('btnDetalles19')">AR2</button>
                    <button type="button" class="btn btn-secondary btn-p" id="btnDetalles20" onclick="Detalles('btnDetalles20')">CE</button>
                    <button type="button" class="btn btn-secondary btn-p" id="btnDetalles21" onclick="Detalles('btnDetalles21')">CC</button>
                    <button type="button" class="btn btn-secondary btn-p" id="btnDetalles22" onclick="Detalles('btnDetalles22')">Out</button>
                    <button type="button" class="btn btn-secondary btn-p" id="btnDetalles23" onclick="Detalles('btnDetalles23')">BBI</button>
                    <button type="button" class="btn btn-secondary btn-p" id="btnDetalles24" onclick="Detalles('btnDetalles24')">BFF</button>
                    <button type="button" class="btn btn-secondary btn-p" id="btnDetalles25" onclick="Detalles('btnDetalles25')">6</button>
                    <button type="button" class="btn btn-secondary btn-p" id="btnDetalles26" onclick="Detalles('btnDetalles26')">7</button>
                    <button type="button" class="btn btn-secondary btn-p" id="btnDetalles27" onclick="Detalles('btnDetalles27')">8</button>
                    <button type="button" class="btn btn-secondary btn-p" id="btnDetalles28" onclick="Detalles('btnDetalles28')">9</button>
                    <button type="button" class="btn btn-secondary btn-p" id="btnDetalles29" onclick="Detalles('btnDetalles29')">10</button>
                    <button type="button" class="btn btn-secondary btn-p" id="" style="background: white; border-bottom: 0px;"> </button>
                    <button type="button" class="btn btn-secondary btn-p" id="btnDetalles30" onclick="Detalles('btnDetalles30')">-</button>
                    <input type="text" class="form-control" style="width: 245px; text-align: center;" id="inputDetalles" name="NDetalles" required="true" readonly>
                </div>
            </div>


            <div class="col-12" >
                <button type="button" class="btn btn-primary" id="btnEnviar" onclick="EnviarForm()"><strong>Registrar</strong></button>
                <button type="button" class="btn btn-primary" id="btnPrueba" onclick="ConsultarTurnos(3)"><strong>Turnos</strong></button>
            </div>
        </form>
        <br>
        <br>

    </div>
</body>

</html>