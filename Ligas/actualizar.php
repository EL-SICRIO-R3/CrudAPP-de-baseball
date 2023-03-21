<?php 
    include("conexiones.php");
    $con=conectar();

    $id=$_GET['id'];

    $sql="SELECT * FROM Ligas WHERE IDLiga='$id'";
    $query=mysqli_query($con, $sql);

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
        <form class="row g-3" action="update.php?id=<?php echo $row['IDLiga']?>" method="POST">
            <div class="col-md-3">
                <label for="inputIDLiga" class="form-label"><strong>IDLiga</strong></label>
                <input type="text" class="form-control" id="inputIDLiga" name="IDLiga" required="true" disabled value="<?php echo $row['IDLiga']?>">
            </div>
            <div class="col-md-4">
                <label for="inputDescripcion" class="form-label"><strong>Descripcion</strong></label>
                <input type="text" class="form-control" id="inputDescripcion" name="Descripcion"
                    value="<?php echo $row['Descripcion']?>" required="true">
            </div>
            <div class="col-md-4">
                <label for="inputPresidente" class="form-label"><strong>Presidente</strong></label>
                <input type="text" class="form-control" id="inputPresidente" name="Presidente"
                    value="<?php echo $row['Presidente']?>" required="true">
            </div>
            <div class="col-md-3">
                <label for="inputCoordinador" class="form-label"><strong>Coordinador</strong></label>
                <input type="text" class="form-control" id="inputCoordinador" name="Coordinador"
                    value="<?php echo $row['Coordinador']?>" required="true">
            </div>
            <div class="col-md-2">
                <label for="inputMapa" class="form-label"><strong>Mapa</strong></label>
                <input type="text" class="form-control" id="inputMapa" name="Mapa"
                    value="<?php echo $row['Mapa']?>" required="true">
            </div>
            <div class="col-md-3">
                <label for="inputDireccion" class="form-label"><strong>Direccion</strong></label>
                <input type="text" class="form-control" id="inputDireccion" name="Direccion"
                    value="<?php echo $row['Direccion']?>" required="true">
            </div>
            <div class="col-md-3">
                <label for="inputTelefono" class="form-label"><strong>Telefono</strong></label>
                <input type="tel" class="form-control" id="inputTelefono" name="Telefono" maxlength="10"
                    onkeypress="return soloNumeros(event)" value="<?php echo $row['Telefono']?>"required="true">
            </div>
            <div class="col-md-5">
                <label for="inputRedes" class="form-label"><strong>Redes</strong></label>
                <input type="text" class="form-control" id="inputRedes" name="Redes"
                    value="<?php echo $row['Redes']?>" required="true">
            </div>
            <div class="col-md-3">
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