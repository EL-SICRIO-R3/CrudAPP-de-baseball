<?php

include("conexiones.php");
$con=conectar();

$id=$_GET['id'];

$sql="DELETE FROM Ampayers  WHERE IDAmpayer='$id'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: index.php");
    }
?>