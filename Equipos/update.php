<?php

include("conexiones.php");
$con=conectar();
$id=$_GET['id'];


$Nombre=$_POST['Nombre'];
$Logo=$_POST['IDLogo'];
$Ciudad=$_POST['Ciudad'];
$IDTecnico=$_POST['IDTecnico'];


$sql="UPDATE Equipos SET  Nombre='$Nombre', IDLogo='$Logo', Ciudad='$Ciudad', IDTecnico='$IDTecnico' WHERE IDEquipo='$id'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: index.php");
    }
?>