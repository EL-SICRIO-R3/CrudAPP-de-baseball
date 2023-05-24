<?php

include("conexiones.php");
$con=conectar();
$id=$_GET['id'];


$IDEquipo=$_POST['IDEquipo'];
$IDTemporada=$_POST['IDTemporada'];
$IDAfiliacion=$_POST['IDAfiliacion'];



$sql="UPDATE Rosters SET  IDEquipo='$IDEquipo', IDTemporada='$IDTemporada', IDAfiliacion='$IDAfiliacion' WHERE IDRoster='$id'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: index.php");
    }
?>