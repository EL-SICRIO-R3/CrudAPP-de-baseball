<?php 
    include("conexiones.php");
    $con=conectar();

    $id=$_GET['id'];

    $sql="SELECT * FROM Jugadores WHERE IDAfiliacion='$id'";
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
        <form class="row g-3" action="update.php?id=<?php echo $row['IDAfiliacion']?>" method="POST">
            <div class="col-md-2">
                <label for="inputIDAfiliacion" class="form-label"><strong>IDAfiliacion</strong></label>
                <input type="text" class="form-control" id="inputIDAfiliacion" name="IDAfiliacion" required="true" disabled value="<?php echo $row['IDAfiliacion']?>">
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
                <label for="inputFecha" class="form-label">Fecha</label>
                <input type="date" class="form-control" id="inputFecha" name="Fecha" value="<?php echo $row['Fecha']?>">
            </div>
            <div class="col-md-6">
                <label for="inputCurp" class="form-label">Curp</label>
                <input type="text" class="form-control" id="inputCurp" name="CURP" value="<?php echo $row['CURP']?>">
            </div>
            <div class="col-md-2">
                <label for="inputState" class="form-label">Posición</label>
                <select id="inputState" class="form-select" name="Posicion" value="<?php echo $row['Posicion']?>">
                    <option selected><?php echo $row['Posicion']?></option>
                    <option>P</option>
                    <option>C</option>
                    <option>1B</option>
                    <option>2B</option>
                    <option>3B</option>
                    <option>SS</option>
                    <option>LF</option>
                    <option>CF</option>
                    <option>RF</option>
                    <option>DE</option>
                    <option>JD</option>
                    <option>BC</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="inputState" class="form-label">Golpea</label>
                <select id="inputState" class="form-select" name="Golpea" value="<?php echo $row['Golpea']?>">
                    <option selected><?php echo $row['Golpea']?></option>
                    <option>Derecho</option>
                    <option>Zurdo</option>
                    <option>Ambidiestro</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="inputState" class="form-label">Tira</label>
                <select id="inputState" class="form-select" name="Tira" value="<?php echo $row['Tira']?>">
                    <option selected><?php echo $row['Tira']?></option>
                    <option>Derecho</option>
                    <option>Zurdo</option>
                    <option>Ambidiestro</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="inputPagina" class="form-label">Pagina</label>
                <input type="text" class="form-control" id="inputPagina" name="Pagina"
                    value="<?php echo $row['Pagina']?>">
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