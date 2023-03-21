<?php
include("conexiones.php");
$con=conectar();



$IDTemporada=$_GET['id'];
$IDLiga=$_POST['IDLiga'];
$Grupo=$_POST['Grupo'];
$Temporada=$_POST['Temporada'];
$Categoria=$_POST['Categoria'];
$Momento=$_POST['Momento'];
$Status=$_POST['Status'];

$sql="INSERT INTO Temporadas (IDTemporada, IDLiga, Grupo, Temporada, Categoria, Momento, Status) VALUES ($IDTemporada,'$IDLiga','$Grupo',$Temporada,'$Categoria','$Momento',$Status)";
$query= mysqli_query($con, $sql);

if ($query) {
    Header("Location: index.php");
   
}
?>