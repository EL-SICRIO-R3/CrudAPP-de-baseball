<?php
include("conexiones.php");
$con=conectar();



$IDAmpayer=$_GET['id'];
$Nombre=$_POST['Nombre'];
$Apellidos=$_POST['Apellidos'];
$Fecha=$_POST['Fecha'];
$CURP=$_POST['CURP'];
$Abreviacion=$_POST['Abreviacion'];
$Status=$_POST['Status'];

$sql="INSERT INTO Ampayers (IDAmpayer, Nombre, Apellidos, Fecha, CURP, Abreviacion, Status) VALUES($IDAmpayer,'$Nombre','$Apellidos','$Fecha','$CURP','$Abreviacion',$Status)";
$query= mysqli_query($con,$sql);


if($query){
    Header("Location: index.php");
}
?>