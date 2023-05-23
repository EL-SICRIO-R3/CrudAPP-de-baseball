<?php
include("conexiones.php");
$con=conectar();



$IDRoster=$_GET['id'];

$IDEquipo=$_POST['IDEquipo'];

$IDTemporada = $_POST['IDTemporada'];

$IDAfiliacion = $_POST['IDAfiliacion'];


$sql="INSERT INTO Rosters (IDRoster,IDEquipo,IDTemporada,IDAfiliacion) VALUES($IDRoster,$IDEquipo,$IDTemporada,$IDAfiliacion)";
$query= mysqli_query($con,$sql);


if($query){
    Header("Location: index.php");
}
?>