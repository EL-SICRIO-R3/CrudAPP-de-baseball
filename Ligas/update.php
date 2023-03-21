<?php

include("conexiones.php");
$con=conectar();
$id=$_GET['id'];

//$IDLiga=$_POST['IDLiga'];
$Descripcion=$_POST['Descripcion'];
$Presidente=$_POST['Presidente'];
$Coordinador=$_POST['Coordinador'];
$Mapa=$_POST['Mapa'];
$Direccion=$_POST['Direccion'];
$Telefono=$_POST['Telefono'];
$Redes=$_POST['Redes'];
$Status=$_POST['Status'];

//$IDAfiliacion=$_POST['IDAfiliacion'];
/*$IDLiga=$_POST['IDLiga'];
$Grupo=$_POST['Grupo'];
$Temporada=$_POST['Temporada'];
$Categoria=$_POST['Categoria'];
$Momento=$_POST['Momento'];
$Status=$_POST['Status'];*/

//$sql="INSERT INTO Jugadores (Nombre, Apellidos, Fecha, CURP, Posicion, Golpea, Tira, Pagina, Abreviacion, Status) VALUES('$Nombre','$Apellidos','$Fecha','$CURP','$Posicion','$Golpea','$Tira','$Pagina','$Abreviacion',$Status)";

$sql="UPDATE Ligas SET Descripcion='$Descripcion', Presidente='$Presidente', Coordinador='$Coordinador', Mapa='$Mapa', Direccion='$Direccion', Telefono='$Telefono', Redes='$Redes', Status=$Status WHERE IDLiga='$id'";
$query=mysqli_query($con, $sql);

    if ($query) {
        Header("Location: index.php");
    }
?>