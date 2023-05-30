<?php

include("conexiones.php");
$con=conectar();

$idEquipo = $_GET['id'];

$sql = "SELECT IDLogo FROM Equipos WHERE IDEquipo = $idEquipo";

$query=mysqli_query($con,$sql);

$row=mysqli_fetch_array($query);

$nombreLogo = $row['IDLogo'];


// Convertir el resultado en un arreglo JSON
$response = array("nombreLogo" => $nombreLogo);

// Enviar la respuesta como JSON
header('Content-Type: application/json');
echo json_encode($response);


?>