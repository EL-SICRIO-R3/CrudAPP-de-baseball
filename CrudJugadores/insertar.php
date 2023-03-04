<?php
include("conexiones.php");
$con=conectar();



$IDAfiliacion=$_GET['id'];
$Nombre=$_POST['Nombre'];
$Apellidos=$_POST['Apellidos'];
$Fecha=$_POST['Fecha'];
$CURP=$_POST['CURP'];
$Posicion=$_POST['Posicion'];
$Golpea=$_POST['Golpea'];
$Tira=$_POST['Tira'];
$Pagina=$_POST['Pagina'];
$Abreviacion=$_POST['Abreviacion'];
$Status=$_POST['Status'];

$sql="INSERT INTO Jugadores (IDAfiliacion, Nombre, Apellidos, Fecha, CURP, Posicion, Golpea, Tira, Pagina, Abreviacion, Status) VALUES($IDAfiliacion,'$Nombre','$Apellidos','$Fecha','$CURP','$Posicion','$Golpea','$Tira','$Pagina','$Abreviacion',$Status)";
$query= mysqli_query($con,$sql);


if($query){
    Header("Location: index.php");
}
?>