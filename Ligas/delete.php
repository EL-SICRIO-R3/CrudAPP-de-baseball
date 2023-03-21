<?php

include("conexiones.php");
$con=conectar();

$id=$_GET['id'];

$sql="DELETE FROM Ligas  WHERE IDLiga='$id'";
$query=mysqli_query($con, $sql);

    if ($query) {
        Header("Location: index.php");
    }
?>