<?php

include("conexiones.php");
$con=conectar();

$id=$_GET['id'];

$IDTemporada=$_POST['IDTemporada'];
$Jornada=$_POST['Jornada'];
$IDCampo=$_POST['IDCampo'];
$Fecha=$_POST['Fecha'];
$Hora=$_POST['Hora'];
$Clima=$_POST['Clima'];
$IDEquipoVisitante=$_POST['EquipoVisitante'];
$IDEquipoLocal=$_POST['EquipoLocal'];
$Final1=$_POST['Final1'];
$Final2=$_POST['Final2'];
$IDAviso=$_POST['Aviso'];
$ErroresVisitante=$_POST['Inning1E'];
$ErroresLocal=$_POST['Inning2E'];
$CarrerasVisitante=$_POST['Inning1C'];
$CarrerasLocal=$_POST['Inning2C'];
$HitsVisitante=$_POST['Inning1H'];
$HitsLocal=$_POST['Inning2H'];

$Final=$Final1."-".$Final2;

$sqlJuegos="UPDATE Juegos SET IDTemporada=$IDTemporada, Jornada=$Jornada, IDCampo=$IDCampo, Fecha='$Fecha', Hora='$Hora', Clima='$Clima',
IDEquipoVisitante=$IDEquipoVisitante, IDEquipoLocal=$IDEquipoLocal, Final='$Final', IDAviso=$IDAviso, ErroresLocal=$ErroresLocal,
ErroresVisitante=$ErroresVisitante, CarrerasLocal=$CarrerasLocal, CarrerasVisitante=$CarrerasVisitante, HitsLocal=$HitsLocal, HitsVisitante=$HitsVisitante
WHERE IDJuego='$id'";
$queryJuegos= mysqli_query($con,$sqlJuegos);


$Innings=$_POST['Inning'];

for ($i = 1; $i < $Innings+1; $i++) {
    $CarrerasLocal=$_POST['Inning2'.$i];
    $CarrerasVisitante=$_POST['Inning1'.$i];
    echo $i;
    $sqlEntradas="UPDATE Entradas SET CarrerasLocal=$CarrerasLocal, CarrerasVisitante=$CarrerasVisitante WHERE IDJuego=$id AND IDInning=$i";
    $queryEntradas= mysqli_query($con,$sqlEntradas);
}

$AmpayerHome=$_POST['AmpayerHome'];
$AmpayerBase=$_POST['AmpayerBase'];

$sqlAmpayersJuegoHome="UPDATE AmpayersJuego SET IDAmpayer=$AmpayerHome WHERE IDJuego='$id' AND Ubicacion='Home'";
$queryAmpayersJuegoHome= mysqli_query($con,$sqlAmpayersJuegoHome);

$sqlAmpayersJuegoBases="UPDATE AmpayersJuego SET IDAmpayer=$AmpayerBase WHERE IDJuego='$id' AND Ubicacion='Bases'";
$queryAmpayersJuegoBases= mysqli_query($con,$sqlAmpayersJuegoBases);



    if($sqlJuegos){
        Header("Location: index.php");
    }
?>