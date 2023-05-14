<?php
include("conexiones.php");
$con=conectar();



$IDCampo=$_GET['id'];
$Descripcion=$_POST['Descripcion'];


$sql="INSERT INTO Parques (IDCampo, Descripcion) VALUES($IDCampo,'$Descripcion')";
$query= mysqli_query($con,$sql);


if($query){
    Header("Location: index.php");
}
?>