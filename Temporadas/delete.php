<?php

include("conexiones.php");
$con=conectar();

$id=$_GET['id'];

$sqlUpd = "UPDATE Temporadas SET Status = 0 WHERE IDTemporada='$id'";
$query=mysqli_query($con, $sqlUpd);

    if ($query) {
        Header("Location: index.php");
    }
?>