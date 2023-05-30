<?php

include("conexiones.php");
$con=conectar();
$id=$_GET['id'];


$Aviso=$_POST['Aviso'];



$sql="UPDATE Avisos SET  Aviso='$Aviso' WHERE IDAviso='$id'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: index.php");
    }
?>