<?php
include("conexiones.php");
$con=conectar();



$IDManejadore=$_GET['id'];
$Nombre=$_POST['Nombre'];
$Tipo=$_POST['Tipo'];


$sql="INSERT INTO Parques (IDManejadores, Nombre, Tipo) VALUES($IDManejadore,'$Nombre','$Tipo')";
$query= mysqli_query($con,$sql);


if($query){
    Header("Location: index.php");
}
?>