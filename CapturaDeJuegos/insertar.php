<?php
include("conexiones.php");
$con=conectar();



$IDJuego=$_GET['id'];
$IDTemporada=$_POST['IDTemporada'];
$Jornada=$_POST['Jornada'];
$IDCampo=$_POST['IDCampo'];
$Fecha=$_POST['Fecha'];
$Hora=$_POST['Hora'];
$Clima=$_POST['Clima'];
$IDEquipoVisitante=$_POST['Descripcion'];
$IDEquipoLocal=$_POST['Descripcion'];
$Final1=$_POST['Final1'];
$Final1=$_POST['Final2'];
$IDAviso=$_POST['Descripcion'];


$Final="$Final1+"-"+$Final2"


$sqlJuegos="INSERT INTO Juegos (IDJuego, IDtemporada, Jornada, IDCampo, Fecha, Hora, Clima, IDEquipoVisitante, IDEquipoLocal, Final, IDAviso, Inning) 
VALUES($IDJuego,$IDTemporada, $Jornada, $IDCampo, '$Fecha', '$Hora', '$Clima', $IDEquipoVisitante, $IDEquipoLocal, '$Final', $IDAviso)";
$queryJuegos= mysqli_query($con,$sqlJuegos);

$Innings=$_POST['Descripcion'];
$EntradaAlta=$_POST['Inning1E'];
$EntradaBaja=$_POST['Inning2E'];
$CarrerasAlta=$_POST['Inning1C'];
$CarrerasBaja=$_POST['Inning2C'];
for ($i = 1; $i < $Innings+1; $i++) {
    $CarrerasLocal=$_POST['Inning2'+$i];
    $CarrerasVisitante=$_POST['Inning1'+$i];
    sqlEntradas="INSERT INTO Entradas (IDJuego, IDInning, CarrerasLocal, CarrerasVisitante, EntradaAlta, EntradaBaja, CarrerasAlta, CarrerasBaja) 
    VALUES ($IDJuego,$i, $CarrerasLocal, $CarrerasVisitante, $EntradaAlta, $EntradaBaja, $CarrerasAlta, $CarrerasBaja)";
    $queryEntradas= mysqli_query($con,$sqlEntradas);
}

$AmpayerHome=$_POST['AmpayerHome'];
$AmpayerBase=$_POST['AmpayerBase'];
$sqlAmpayersJuegoHome="INSERT INTO AmpayersJuego (IDJuego, IDAmpayer, Ubicacion) VALUES ($IDJuego, $AmpayerHome, 'Home')"
$queryAmpayersJuegoHome= mysqli_query($con,$sqlAmpayersJuegoHome);

$sqlAmpayersJuegoBases="INSERT INTO AmpayersJuego (IDJuego, IDAmpayer, Ubicacion) VALUES ($IDJuego, $AmpayerBase, 'Bases')"
$queryAmpayersJuegoBases= mysqli_query($con,$sqlAmpayersJuegoBases);

if($query){
    Header("Location: index.php");
}
?>