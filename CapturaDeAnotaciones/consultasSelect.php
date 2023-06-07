<?php
    include("conexiones.php");
    $con=conectar();

    $Inn = $_GET['inning'];

    $responseV = array();
    $responseL = array();

    
    //Equipo Visitante
    $sqlEqV="SELECT IDEquipoVisitante FROM Juegos WHERE IDJuego = " . $Inn;
    $queryEqV=mysqli_query($con, $sqlEqV);
    $idEqV=mysqli_fetch_array($queryEqV);

    $sqlRV="SELECT * FROM Rosters WHERE IDEquipo = " . $idEqV['IDEquipoVisitante'];
    $queryRV=mysqli_query($con, $sqlRV);
    //$idRV=mysqli_fetch_array($queryRV);
    while ($rowRV=mysqli_fetch_array($queryRV)) {
        $sqlRV1="SELECT * FROM Jugadores WHERE IDAfiliacion = " . $rowRV['IDAfiliacion'];
        $queryRV1=mysqli_query($con, $sqlRV1);
        $idRV1=mysqli_fetch_array($queryRV1);
        array_push($responseV, $idRV1);
    }

    //Equipo Local
    $sqlEqL="SELECT IDEquipoLocal FROM Juegos WHERE IDJuego = " . $Inn;
    $queryEqL=mysqli_query($con, $sqlEqL);
    $idEqL=mysqli_fetch_array($queryEqL);

    $sqlRL="SELECT * FROM Rosters WHERE IDEquipo = " . $idEqL['IDEquipoLocal'];
    $queryRL=mysqli_query($con, $sqlRL);
    //$idRL=mysqli_fetch_array($queryRL);
    while ($rowRL=mysqli_fetch_array($queryRL)) {
        $sqlRL1="SELECT * FROM Jugadores WHERE IDAfiliacion = " . $rowRL['IDAfiliacion'];
        $queryRL1=mysqli_query($con, $sqlRL1);
        $idRL1=mysqli_fetch_array($queryRL1);
        array_push($responseL, $idRL1);
    }

    echo json_encode(array('ResultV' => $responseV, 'ResultL' => $responseL));
          
   
   
?>