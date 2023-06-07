<?php
include("conexiones.php");
$con=conectar();

error_reporting(0);

$CarrCheck = null;
$CarrPCheck = null;


$ID=$_POST['IDJuego'];
$Bateadores=$_POST['Bateadores'];
$Lanzador=$_POST['Lanzador'];
$EqBat=$_POST['EqBat'];
$NOrBat=$_POST['NOrBat'];
$Posicion=$_POST['Posicion'];
$Inni=$_POST['Inni'];
$_POST['CarrCheck'] != null ? $CarrCheck=$_POST['CarrCheck'] : $CarrCheck="0";
$_POST['CarrPCheck'] != null ? $CarrPCheck=$_POST['CarrPCheck'] : $CarrPCheck="0";
$Jornada1=$_POST['Jornada1'];
$Jornada2=$_POST['Jornada2'];
$Detalles=$_POST['NDetalles'];
$IDEquipo=$_POST['EqBatIDEquipo'];

$sqlTurnos = "INSERT INTO Turnos( IDJuego ,  IDEquipo ,  Turno ,  Inning ,  Posicion ,  Tipo ,  Resultado ,  Carrera ,  Producciones ,  Detalles ,  IDBateador ,  IDLanzador ) 
VALUES ($ID,$IDEquipo,$NOrBat,$Inni,'$Posicion','$EqBat','$Jornada1' ,$CarrCheck,$CarrPCheck,'$Detalles',$Bateadores,$Lanzador)";
$queryTurnos= mysqli_query($con, $sqlTurnos);


if($queryTurnos){
    Header("Location: index.php");
}
?>