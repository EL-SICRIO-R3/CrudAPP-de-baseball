<?php 
    include("conexiones.php");
    $con=conectar();

    $id=$_GET['id'];

    $sql="SELECT * FROM Parques WHERE IDCampo='$id'";
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
        <form class="row g-3" action="update.php?id=<?php echo $row['IDCampo']?>" method="POST">
            <div class="col-md-2">
                <label for="inputIDCampo" class="form-label"><strong>IDCampo</strong></label>
                <input type="text" class="form-control" id="inputIDCampo" name="IDCampo" required="true" disabled value="<?php echo $row['IDCampo']?>">
            </div>
            <div class="col-md-6">
                <label for="inputDescripcion" class="form-label">Descripcion</label>
                <input type="text" class="form-control" id="inputDescripcion" name="Descripcion"
                    value="<?php echo $row['Descripcion']?>">
            </div>
            
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Editar</button>
            </div>
        </form>
    </div>

</body>

</html>