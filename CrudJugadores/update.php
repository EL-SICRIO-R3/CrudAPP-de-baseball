<?php

include("conexiones.php");
$con=conectar();
$id=$_GET['id'];

//$IDAfiliacion=$_POST['IDAfiliacion'];
$Nombre=$_POST['Nombre'];
$Apellidos=$_POST['Apellidos'];
$Fecha=$_POST['Fecha'];
$CURP=$_POST['CURP'];
$Posicion=$_POST['Posicion'];
$Golpea=$_POST['Golpea'];
$Tira=$_POST['Tira'];
$Pagina=$_POST['Pagina'];
$Abreviacion=$_POST['Abreviacion'];
$Status=$_POST['Status'];

//$sql="INSERT INTO Jugadores (Nombre, Apellidos, Fecha, CURP, Posicion, Golpea, Tira, Pagina, Abreviacion, Status) VALUES('$Nombre','$Apellidos','$Fecha','$CURP','$Posicion','$Golpea','$Tira','$Pagina','$Abreviacion',$Status)";

$sql="UPDATE Jugadores SET  Nombre='$Nombre', Apellidos='$Apellidos', Fecha='$Fecha', CURP='$CURP', Posicion='$Posicion', Golpea='$Golpea', Tira='$Tira', Pagina='$Pagina', Abreviacion='$Abreviacion', Status=$Status WHERE IDAfiliacion='$id'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: index.php");
    }
?>