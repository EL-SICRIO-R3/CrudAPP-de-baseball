<?php 
    include("conexiones.php");
    $con=conectar();

    $id=$_GET['id'];

    $sql="SELECT * FROM Temporadas WHERE IDTemporada='$id'";
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
        <form class="row g-3" action="update.php?id=<?php echo $row['IDTemporada']?>" method="POST">
            <div class="col-md-2">
                <label for="inputIDTemporada" class="form-label"><strong>IDTemporada</strong></label>
                <input type="text" class="form-control" id="inputIDTemporada" name="IDTemporada" required="true" disabled value="<?php echo $row['IDTemporada']?>">
            </div>
            <div class="col-md-3">
                <label for="inputIDLiga" class="form-label"><strong>IDLiga</strong></label>
                <select id="inputIDLiga" class="form-select" name="IDLiga" value="<?php echo $row['IDLiga']?>" required="true">
                    <option selected ><?php echo $row['IDLiga']?></option>
                    <option>RCV</option>
                    <option>SDF</option>
                    <option>RJU</option>
                    <option>DFH</option>
                    <option>NHD</option>
                    <option>ERH</option>
                    <option>UJF</option>
                    <option>JKL</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="inputGrupo" class="form-label"><strong>Grupo</strong></label>
                <select id="inputGrupo" class="form-select" name="Grupo" value="<?php echo $row['Grupo']?>" required="true" >
                    <option selected><?php echo $row['Grupo']?></option>
                    <option>Novatas</option>
                    <option>Intermedio</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="inputTemporada" class="form-label"><strong>Temporada</strong></label>
                <input type="text" class="form-control" id="inputTemporada" name="Temporada" required="true" value="<?php echo $row['Temporada']?>">
            </div>
            <div class="col-md-3">
                <label for="inputCategoria" class="form-label"><strong>Categoria</strong></label>
                <select id="inputCategoria" class="form-select" name="Categoria" value="<?php echo $row['Categoria']?>" required="true" >
                    <option selected><?php echo $row['Categoria']?></option>
                    <option>Varonil</option>
                    <option>Femenil</option>
                    
                </select>
            </div>
            <div class="col-md-3">
                <label for="inputMomento" class="form-label"><strong>Momento</strong></label>
                <select id="inputMomento" class="form-select" name="Momento" value="<?php echo $row['Momento']?>" required="true" >
                    <option selected><?php echo $row['Momento']?></option>
                    <option>Amistoso</option>
                    <option>Torneo</option>
                    
                </select>
            </div>
            <div class="col-md-2">
                <label for="inputState" class="form-label">Status</label>
                <select id="inputState" class="form-select" name="Status" value="<?php echo $row['Status']?>">
                    <option selected ><?php echo $row['Status']?></option>
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