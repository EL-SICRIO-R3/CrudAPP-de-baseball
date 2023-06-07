<?php

include("conexiones.php");
$con=conectar();
$id=$_GET['id'];


$Descripcion=$_POST['Descripcion'];


$sql="UPDATE Parques SET  Descripcion='$Descripcion' WHERE IDCampo='$id'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: index.php");
    }
?>