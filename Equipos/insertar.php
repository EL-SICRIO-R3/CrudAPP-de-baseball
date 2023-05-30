<?php
include("conexiones.php");
$con=conectar();



$IDEquipo=$_GET['id'];
$Nombre=$_POST['Nombre'];
$Ciudad=$_POST['Ciudad'];
$IDTecnico=$_POST['IDTecnico'];

if(isset($_FILES["Logo"]) && $_FILES["Logo"]["error"] == 0) {
    $file = $_FILES["Logo"];

    // Obtener información del archivo
    $fileName = $file["name"];
    $fileType = $file["type"];
    $fileTmp = $file["tmp_name"];
    $fileError = $file["error"];
    $fileSize = $file["size"];

    // Directorio de destino para guardar la imagen
    $uploadDir = "../img/logos/";

    // Mover el archivo a la ubicación deseada
    if (move_uploaded_file($fileTmp, $uploadDir . $fileName)) {
        echo "La imagen se ha subido correctamente.";
    } else {
        echo "Error al subir la imagen.";
    }
    } else {
    echo "No se ha seleccionado ninguna imagen.";
}

$sql="INSERT INTO Equipos (IDEquipo, Nombre, IDLogo, Ciudad, IDTecnico) VALUES($IDEquipo,'$Nombre','$fileName','$Ciudad',$IDTecnico)";
$query= mysqli_query($con,$sql);


if($query){
    Header("Location: index.php");
}
?>