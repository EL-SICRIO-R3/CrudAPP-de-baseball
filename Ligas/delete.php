<?php

include("conexiones.php");
$con=conectar();

$id=$_GET['id'];

$sqlUpd = "UPDATE Ligas SET Status = 0 WHERE IDLiga='$id'";
$query=mysqli_query($con, $sqlUpd);

    if ($query) {
        Header("Location: index.php");
    }
?>