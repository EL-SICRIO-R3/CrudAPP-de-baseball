<?php

include("conexiones.php");
$con=conectar();
$id=$_GET['id'];


$Nombre=$_POST['Nombre'];
$Tipo=$_POST['Tipo'];


$sql="UPDATE Manejadores SET  Nombre='$Nombre', Tipo='$Tipo' WHERE IDTecnico='$id'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: index.php");
    }
?>