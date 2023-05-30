<?php   
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Verificar si se ha seleccionado un archivo
        if(isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        $file = $_FILES["image"];
    
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
    }

?>