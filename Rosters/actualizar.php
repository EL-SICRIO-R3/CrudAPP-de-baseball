<?php 
    include("conexiones.php");
    $con=conectar();

    $id=$_GET['id'];

    $sql="SELECT * FROM Rosters WHERE IDRoster='$id'";
    $query=mysqli_query($con,$sql);

    $row=mysqli_fetch_array($query);
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
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container" style="margin-top: 10px;">
    <form class="row g-3" action="update.php?id=<?php echo $IDRoster?>" method="POST" id="formulario">
            <div class="col-md-2">
                <label for="inputIDRoster" class="form-label"><strong>IDRoster</strong></label>
                <input type="text" class="form-control" id="inputIDRoster" name="IDRoster" required="true" readonly value = "<?php echo($id); ?>">
            </div>
            
            <div class="col-md-2">
                <label for="inputIDEquipo" class="form-label"><strong>Equipo</strong></label>
                <select id="inputIDEquipo" class="form-select" name="IDEquipo" required="true" value="<?php echo $row['IDEquipo']?>">
                    <option selected ><?php echo $row['IDEquipo']?></option>
                    <?php
                        while ($rowT=mysqli_fetch_array($queryEquipo)) {
                            echo "<option>".$rowL['Equipo']."</option>";
                        }
                    ?>
                </select>
            </div>


            <div class="col-md-2">
                <label for="inputIDTemporada" class="form-label"><strong>Temporada</strong></label>
                <select id="inputIDTemporada" class="form-select" name="IDTemporada" required="true" value="<?php echo $row['IDTemporada']?>">
                    <option selected ><?php echo $row['IDTemporada']?></option>

                    <?php
                        while ($rowT=mysqli_fetch_array($queryTemporada)) {
                            echo "<option>".$rowL['IDLiga']."</option>";
                        }
                    ?>
                </select>
            </div>

            <div class="col-md-2">
                <label for="inputIDAfiliacion" class="form-label" disabled selected><strong>Jugadores</strong></label>
                <select id="inputIDAfiliacion" class="form-select" name="IDAfiliacion" required="true" value="<?php echo $row['IDAfiliacion']?>">

                    <?php
                        while ($rowT=mysqli_fetch_array($queryAfiliacion)) {
                            echo "<option>".$rowL['Nombre']."</option>";
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