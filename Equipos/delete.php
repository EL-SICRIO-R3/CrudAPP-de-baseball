<?php

include("conexiones.php");
$con=conectar();

$id=$_GET['id'];

$sqlIMG="SELECT IDLogo FROM Equipos  WHERE IDEquipo='$id'";
$queryIMG=mysqli_query($con,$sqlIMG);
$row=mysqli_fetch_array($queryIMG);

unlink('../img/logos/'.$row['IDLogo']);

$sql="DELETE FROM Equipos  WHERE IDEquipo='$id'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: index.php");
    }
?>