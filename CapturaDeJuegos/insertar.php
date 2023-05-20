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
$IDEquipoVisitante=$_POST['EquipoVisitante'];
$IDEquipoLocal=$_POST['EquipoLocal'];
$Final1=$_POST['Final1'];
$Final2=$_POST['Final2'];
$IDAviso=1;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["EquipoLocal"])) {
      $valorSeleccionado = $_POST["EquipoLocal"];
      echo "Valor seleccionado: " . $valorSeleccionado;
      echo "<br>";
    }
}else{
    echo "<br>";
    echo "no extrae ningun valor";
    echo "<br>";
};

//echo $IDJuego."-".$IDTemporada."-".$IDCampo."-".$Jornada."-".$Fecha."-".$Hora."-".$Clima."-".$IDEquipoVisitante."-".$Final1."-".$IDAviso."-".$Final2;
echo "Equipo local: ".$IDEquipoLocal;
echo "<br>";
echo "Equipo Visitante: ".$IDEquipoVisitante;
echo "<br>";

$Final=$Final1."-".$Final2;


$sqlJuegos="INSERT INTO Juegos (IDJuego, IDtemporada, Jornada, IDCampo, Fecha, Hora, Clima, IDEquipoVisitante, IDEquipoLocal, Final, IDAviso) 
VALUES ($IDJuego,$IDTemporada, $Jornada, $IDCampo, '$Fecha', '$Hora', '$Clima', $IDEquipoVisitante, $IDEquipoLocal, '$Final', $IDAviso)";
$queryJuegos= mysqli_query($con,$sqlJuegos);



$Innings=$_POST['Inning'];
$EntradaAlta=$_POST['Inning1E'];
$EntradaBaja=$_POST['Inning2E'];
$CarrerasAlta=$_POST['Inning1C'];
$CarrerasBaja=$_POST['Inning2C'];

//echo $Innings;

for ($i = 1; $i < $Innings+1; $i++) {
    $CarrerasLocal=$_POST['Inning2'.$i];
    $CarrerasVisitante=$_POST['Inning1'.$i];
    $sqlEntradas="INSERT INTO Entradas (IDJuego, IDInning, CarrerasLocal, CarrerasVisitante, EntradaAlta, EntradaBaja, CarrerasAlta, CarrerasBaja) VALUES ($IDJuego,$i, $CarrerasLocal, $CarrerasVisitante, $EntradaAlta, $EntradaBaja, $CarrerasAlta, $CarrerasBaja)";
    $queryEntradas= mysqli_query($con,$sqlEntradas);
}

$AmpayerHome=$_POST['AmpayerHome'];
$AmpayerBase=$_POST['AmpayerBase'];

echo "Equipo AmpayerHome: ".$AmpayerHome;
echo "<br>";
echo "Equipo AmpayerBase: ".$AmpayerBase;
echo "<br>";

$sqlAmpayersJuegoHome="INSERT INTO AmpayersJuego (IDJuego, IDAmpayer, Ubicacion) VALUES ($IDJuego, $AmpayerHome, 'Home')";
$queryAmpayersJuegoHome= mysqli_query($con,$sqlAmpayersJuegoHome);

$sqlAmpayersJuegoBases="INSERT INTO AmpayersJuego (IDJuego, IDAmpayer, Ubicacion) VALUES ($IDJuego, $AmpayerBase, 'Bases')";
$queryAmpayersJuegoBases= mysqli_query($con,$sqlAmpayersJuegoBases);




if($queryAmpayersJuegoBases){
    Header("Location: index.php");
}
?>