<?php

include("conexiones.php");
$con=conectar();
$id=$_GET['id'];


$Nombre=$_POST['Nombre'];
$Apellidos=$_POST['Apellidos'];
$Fecha=$_POST['Fecha'];
$CURP=$_POST['CURP'];

$Abreviacion=$_POST['Abreviacion'];
$Status=$_POST['Status'];

$sql="UPDATE Ampayers SET  Nombre='$Nombre', Apellidos='$Apellidos', Fecha='$Fecha', CURP='$CURP', Abreviacion='$Abreviacion', Status=$Status WHERE IDAmpayer='$id'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: index.php");
    }
?>