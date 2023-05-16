<?php
include("conexiones.php");
$con=conectar();



$IDTecnico=$_GET['id'];
$Nombre=$_POST['Nombre'];
$Tipo=$_POST['Tipo'];


$sql="INSERT INTO Manejadores (IDTecnico, Nombre, Tipo) VALUES($IDTecnico,'$Nombre','$Tipo')";
$query= mysqli_query($con,$sql);


if($query){
    Header("Location: index.php");
}
?>