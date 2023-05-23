<?php

include("conexiones.php");
$con=conectar();

$id=$_GET['id'];

echo $id;

$sqlAmpayersJuego="DELETE FROM AmpayersJuego  WHERE IDJuego='$id'";
$queryAmpayersJuego=mysqli_query($con,$sqlAmpayersJuego);

$sqlEntradas="DELETE FROM Entradas  WHERE IDJuego='$id'";
$queryEntradas=mysqli_query($con,$sqlEntradas);

$sqlJuegos="DELETE FROM Juegos  WHERE IDJuego='$id'";
$queryJuegos=mysqli_query($con,$sqlJuegos);







    if($queryJuegos){
        Header("Location: index.php");
    }
?>