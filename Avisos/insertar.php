<?php
include("conexiones.php");
$con=conectar();



$IDAviso=$_GET['id'];
$Aviso=$_POST['Aviso'];



$sql="INSERT INTO Avisos (IDAviso, Aviso) VALUES($IDAviso,'$Aviso')";
$query= mysqli_query($con,$sql);


if($query){
    Header("Location: index.php");
}
?>