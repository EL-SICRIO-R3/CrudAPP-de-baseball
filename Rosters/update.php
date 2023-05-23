<?php

include("conexiones.php");
$con=conectar();
$id=$_GET['id'];


$IDEquipo=$_POST['IDEquipo'];


$sql="UPDATE Rosters SET  IDEquipo='$IDEquipo' WHERE IDEquipo='$id'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: index.php");
    }
?>