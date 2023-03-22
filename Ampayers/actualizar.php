<?php 
    include("conexiones.php");
    $con=conectar();

    $id=$_GET['id'];

    $sql="SELECT * FROM Ampayers WHERE IDAmpayer='$id'";
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
        <form class="row g-3" action="update.php?id=<?php echo $row['IDAmpayer']?>" method="POST">
            <div class="col-md-2">
                <label for="inputIDAmpayer" class="form-label"><strong>IDAfiliacion</strong></label>
                <input type="text" class="form-control" id="inputIDAmpayer" name="IDAmpayer" required="true" disabled value="<?php echo $row['IDAmpayer']?>">
            </div>
            <div class="col-md-6">
                <label for="inputNombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="inputNombre" name="Nombre"
                    value="<?php echo $row['Nombre']?>">
            </div>
            <div class="col-md-6">
                <label for="inputApellido" class="form-label">Apellidos</label>
                <input type="text" class="form-control" id="inputApellido" name="Apellidos"
                    value="<?php echo $row['Apellidos']?>">
            </div>
            <div class="col-md-6">
                <label for="inputFecha" class="form-label">Fecha de Nacimiento</label>
                <input type="date" class="form-control" id="inputFecha" name="Fecha" value="<?php echo $row['Fecha']?>">
            </div>
            <div class="col-md-6">
                <label for="inputCurp" class="form-label">Curp</label>
                <input type="text" class="form-control" id="inputCurp" name="CURP" value="<?php echo $row['CURP']?>">
            </div>
    
            <div class="col-md-4">
                <label for="inputAbreviacion" class="form-label">Abreviacion</label>
                <input type="text" class="form-control" id="inputAbreviacion" name="Abreviacion"
                    value="<?php echo $row['Abreviacion']?>">
            </div>
            <div class="col-md-2">
                <label for="inputState" class="form-label">Status</label>
                <select id="inputState" class="form-select" name="Status" value="<?php echo $row['Status']?>">
                    <option selected><?php echo $row['Status']?></option>
                    <option>1</option>
                    <option>0</option>
                </select>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Editar</button>
            </div>
        </form>
    </div>

</body>

</html>