<?php 
    include("conexiones.php");
    $con=conectar();

    $id=$_GET['id'];

    $sql="SELECT * FROM Rosters WHERE IDRoster='$id'";
    $query=mysqli_query($con,$sql);

    $sqlEquipo="SELECT *  FROM Equipos";
    $queryEquipo=mysqli_query($con, $sqlEquipo);

    $sqlTemporada="SELECT * FROM Temporadas";
    $queryTemporada=mysqli_query($con, $sqlTemporada);

    $sqlAfiliacion="SELECT * FROM Jugadores";
    $queryAfiliacion=mysqli_query($con, $sqlAfiliacion);

    
    $row=mysqli_fetch_array($query);


    $EquipoActual="SELECT *  FROM Equipos WHERE IDEquipo = '$row[IDEquipo]'";
    $qEquipoActual=mysqli_query($con, $EquipoActual);

    $TemporadaActual="SELECT *  FROM Temporadas WHERE IDTemporada = '$row[IDTemporada]'";
    $qTemporadaActual=mysqli_query($con, $TemporadaActual);

    $JugadorActual="SELECT *  FROM Jugadores WHERE IDAfiliacion = '$row[IDAfiliacion]'";
    $qJugadorActual=mysqli_query($con, $JugadorActual);

    
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
    <form class="row g-3" action="update.php?id=<?php echo $id?>" method="POST" id="formulario">
            <div class="col-md-2">
                <label for="inputIDRoster" class="form-label"><strong>IDRoster</strong></label>
                <input type="text" class="form-control" id="inputIDRoster" name="IDRoster" required="true" readonly value = "<?php echo($id); ?>">
            </div>
            
            <div class="col-md-2">
                <label for="inputIDEquipo" class="form-label"><strong>Equipo</strong></label>
                <select id="inputIDEquipo" class="form-select" name="IDEquipo" required="true" value="<?php echo $row['IDEquipo']?>">
                    <?php
                        $rowEquipoActual=mysqli_fetch_array($qEquipoActual);
                        echo "<option value=".$rowEquipoActual['IDEquipo']." selected>".$rowEquipoActual['Nombre']."</option>";
                    
                        while ($rowE=mysqli_fetch_array($queryEquipo)) {
                            echo "<option value=".$rowE['IDEquipo'].">".$rowE['Nombre']."</option>";
                        }
                    ?>
                </select>
            </div>


            <div class="col-md-2">
                <label for="inputIDTemporada" class="form-label"><strong>Temporada</strong></label>
                <select id="inputIDTemporada" class="form-select" name="IDTemporada" required="true" value="<?php echo $row['IDTemporada']?>">
                    <?php
                        $rowTemporadaActual=mysqli_fetch_array($qTemporadaActual);
                        echo "<option value=".$rowTemporadaActual['IDTemporada']." selected>".$rowTemporadaActual['IDTemporada']." ".$rowTemporadaActual['IDLiga']." ".$rowTemporadaActual['Grupo']."</option>";
                
                        while ($rowT=mysqli_fetch_array($queryTemporada)) {
                            echo "<option value=".$rowT['IDTemporada'].">".$rowT['IDTemporada']." ".$rowT['IDLiga']." ".$rowT['Grupo']."</option>";
                        }
                    ?>
                </select>
            </div>

            <div class="col-md-2">
                <label for="inputIDAfiliacion" class="form-label" ><strong>Jugador</strong></label>
                <select id="inputIDAfiliacion" class="form-select" name="IDAfiliacion" required="true" value="<?php echo $row['IDAfiliacion']?>">
                    <?php
                        $rowJugadorActual=mysqli_fetch_array($qJugadorActual);
                        echo "<option value=".$rowJugadorActual['IDAfiliacion']." selected>".$rowJugadorActual['Abreviacion']."</option>";

                        while ($rowA=mysqli_fetch_array($queryAfiliacion)) {
                            echo "<option value=".$rowA['IDAfiliacion'].">".$rowA['Abreviacion']."</option>";
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