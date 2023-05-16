<?php
include("conexiones.php");
$con=conectar();



$IDEquipo=$_GET['id'];
$Nombre=$_POST['Nombre'];
$Logo=$_POST['Logo'];
$Ciudad=$_POST['Ciudad'];
$IDTecnico=$_POST['IDTecnico'];

$sql="INSERT INTO Equipos (IDEquipo, Nombre, IDLogo, Ciudad, IDTecnico) VALUES($IDEquipo,'$Nombre',$Logo,'$Ciudad',$IDTecnico)";
$query= mysqli_query($con,$sql);


if($query){
    Header("Location: index.php");
}
?>