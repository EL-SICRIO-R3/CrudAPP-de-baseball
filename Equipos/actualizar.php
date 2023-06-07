<?php 
    include("conexiones.php");
    $con=conectar();

    $id=$_GET['id'];

    $sql="SELECT * FROM Equipos WHERE IDEquipo='$id'";
    $query=mysqli_query($con,$sql);

    $sqlTecnico="SELECT * FROM Manejadores";
    $queryTecnico=mysqli_query($con, $sqlTecnico);

    $row=mysqli_fetch_array($query);



    $TecnicoActual="SELECT *  FROM Manejadores WHERE IDTecnico = '$row[IDTecnico]'";
    $qTecnicoActual=mysqli_query($con, $TecnicoActual);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="styles.css">
    <script src="./validaciones.js"></script>
    <script src="../js/Validaciones.js"></script>
</head>

<body>
    <div class="container" style="margin-top: 10px;">
    <form class="row g-3" action="update.php?id=<?php echo $row['IDEquipo']?>" method="POST" id="formulario">
            <div class="col-md-2">
                <label for="inputIDEquipo" class="form-label"><strong>IDEquipo</strong></label>
                <input type="text" class="form-control" id="inputIDEquipo" name="IDEquipo" required="true" readonly value="<?php echo $row['IDEquipo']?> ">
            </div>
            <div class="col-md-5">
                <label for="inputNombre" class="form-label"><strong>Nombre</strong></label>
                <input type="text" class="form-control" id="inputNombre" name="Nombre" required="true" value="<?php echo $row['Nombre']?>">
            </div>
            <div class="col-md-5">
                <label for="inputLogo" class="form-label"><strong>Logo</strong></label>
                <input type="text" class="form-control" id="inputLogo" name="Logo" required="true" value="<?php echo $row['IDLogo']?>">
            </div>
            
            <div class="col-md-4">
                <label for="inputCiudad" class="form-label"><strong>Ciudad</strong></label>
                <input type="text" class="form-control" required="true"  id="inputCiudad" name="Ciudad" value="<?php echo $row['Ciudad']?>" >
                <pre id="resultado"></pre>
            </div>
            
            <div class="col-md-2">
                <label for="inputIDTecnico" class="form-label"><strong>Tecnico</strong></label>
                <select id="inputIDTecnico" class="form-select" name="Tecnico" required="true" value="<?php echo $row['IDTecnico']?>">
                    <?php

                        $rowTecnicoActual=mysqli_fetch_array($qTecnicoActual);
                        echo "<option value=".$rowTecnicoActual['IDTecnico']." selected>".$rowTecnicoActual['Nombre']."</option>";

                        while ($rowT=mysqli_fetch_array($queryTecnico)) {
                            echo "<option value=".$rowT['IDTecnico'].">".$rowT['Nombre']."</option>";
                        }
                    ?>
                </select>
            </div>
            
            <div class="col-12">
                <button type="submit" class="btn btn-primary"><strong>Editar</strong></button>
            </div>
        </form>
    </div>

</body>

</html>