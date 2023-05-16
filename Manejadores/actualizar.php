<?php 
    include("conexiones.php");
    $con=conectar();

    $id=$_GET['id'];

    $sql="SELECT * FROM Manejadores WHERE IDTecnico='$id'";
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
        <form class="row g-3" action="update.php?id=<?php echo $row['IDTecnico'] ?>" method="POST" id="formulario">
            <div class="col-md-2">
                <label for="inputIDTecnico" class="form-label"><strong>IDTecnico</strong></label>
                <input type="text" class="form-control" id="inputIDTecnico" name="IDTecnico" required="true" readonly value="<?php echo($id); ?>">
            </div>
            <div class="col-md-5">
                <label for="inputNombre" class="form-label"><strong>Nombre</strong></label>
                <input type="text" class="form-control" id="inputNombre" name="Nombre" required="true" value="<?php echo $row['Nombre']?>">
            </div>
            <div class="col-md-5">
                <label for="inputTipo" class="form-label"><strong>Tipo</strong></label>
                <input type="text" class="form-control" id="inputTipo" name="Tipo" required="true" value="<?php echo $row['Tipo']?>">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary"><strong>Editar</strong></button>
            </div>
        </form>
    </div>

</body>

</html>