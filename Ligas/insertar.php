<?php
include("conexiones.php");
$con=conectar();



$IDLiga=$_POST['IDLiga'];
$Descripcion=$_POST['Descripcion'];
$Presidente=$_POST['Presidente'];
$Coordinador=$_POST['Coordinador'];
$Mapa=$_POST['Mapa'];
$Direccion=$_POST['Direccion'];
$Telefono=$_POST['Telefono'];
$Redes=$_POST['Redes'];
$Status=$_POST['Status'];

$sql="INSERT INTO Ligas (IDLiga, Descripcion, Presidente, Coordinador, Mapa, Direccion, Telefono, Redes, Status) VALUES ('$IDLiga','$Descripcion','$Presidente','$Coordinador','$Mapa','$Direccion','$Telefono','$Redes',$Status)";
$query= mysqli_query($con, $sql);

if ($query) {
    Header("Location: index.php");
}

?>