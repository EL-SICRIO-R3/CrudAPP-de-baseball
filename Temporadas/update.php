<?php

include("conexiones.php");
$con=conectar();
$id=$_GET['id'];

//$IDAfiliacion=$_POST['IDAfiliacion'];
$IDLiga=$_POST['IDLiga'];
$Grupo=$_POST['Grupo'];
$Temporada=$_POST['Temporada'];
$Categoria=$_POST['Categoria'];
$Momento=$_POST['Momento'];
$Status=$_POST['Status'];

//$sql="INSERT INTO Jugadores (Nombre, Apellidos, Fecha, CURP, Posicion, Golpea, Tira, Pagina, Abreviacion, Status) VALUES('$Nombre','$Apellidos','$Fecha','$CURP','$Posicion','$Golpea','$Tira','$Pagina','$Abreviacion',$Status)";

$sql="UPDATE Temporadas SET IDLiga='$IDLiga', Grupo='$Grupo', Categoria='$Categoria', Momento='$Momento', Temporada='$Temporada', Status=$Status WHERE IDTemporada='$id'";
$query=mysqli_query($con, $sql);

    if ($query) {
        Header("Location: index.php");
    }
?>