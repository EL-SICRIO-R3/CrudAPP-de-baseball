<?php

include("conexiones.php");
$con=conectar();

$id=$_GET['id'];

$sql="DELETE FROM Jugadores  WHERE IDAfiliacion='$id'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: index.php");
    }
?>