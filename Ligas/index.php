<?php 
    include("conexiones.php");
    $con=conectar();
    
    $sql="SELECT * FROM Ligas";
    $query=mysqli_query($con, $sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partidos-App</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <script src="../js/Validaciones.js"></script>
    


</head>
<style>
    #resultado {
    background-color: red;
    color: white;
    font-weight: bold;
    }
    #resultado.ok {
        background-color: green;
    }
    input:invalid { border-color: red; } input, input:valid { border-color: #ccc; }
   
</style>

<body>


    <div class="container" style="margin-top: 10px;" >
        <nav class="navbar navbar-expand-lg bg-body-tertiary" id="header">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Liga MLB</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Partidos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Equipos</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link disabled">Jugadores</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Buscar</button>
                    </form>
                </div>
            </div>
        </nav>
    </div>

    <div class="container" style="margin-top: 10px;">
        <form class="row g-3" action="insertar.php" method="POST" id="formulario">
            <div class="col-md-3">
                <label for="inputIDLiga" class="form-label"><strong>IDLiga</strong></label>
                <input type="text" class="form-control" id="inputIDLiga" name="IDLiga" required="true" onkeypress="return soloLetras(event)" maxlength="3">
            </div>
            <div class="col-md-4">
                <label for="inputDescripcion" class="form-label"><strong>Descripcion</strong></label>
                <input type="text" class="form-control" id="inputDescripcion" name="Descripcion" required="true">
            </div>
            <div class="col-md-4">
                <label for="inputPresidente" class="form-label"><strong>Presidente</strong></label>
                <input type="text" class="form-control" id="inputPresidente" name="Presidente" required="true">
            </div>
            <div class="col-md-3">
                <label for="inputCoordinador" class="form-label"><strong>Coordinador</strong></label>
                <input type="text" class="form-control" id="inputCoordinador" name="Coordinador" required="true">
            </div>
            <div class="col-md-2">
                <label for="inputMapa" class="form-label"><strong>Mapa</strong></label>
                <input type="text" class="form-control" id="inputMapa" name="Mapa" required="true">
            </div>
            <div class="col-md-3">
                <label for="inputDireccion" class="form-label"><strong>Direccion</strong></label>
                <input type="text" class="form-control" id="inputDireccion" name="Direccion" required="true">
            </div>
            <div class="col-md-3">
                <label for="inputTelefono" class="form-label"><strong>Telefono</strong></label>
                <input type="tel" class="form-control" id="inputTelefono" name="Telefono" maxlength="10" onkeypress="return soloNumeros(event)" required="true">
            </div>
            <div class="col-md-5">
                <label for="inputRedes" class="form-label"><strong>Redes</strong></label>
                <input type="text" class="form-control" id="inputRedes" name="Redes" required="true">
            </div>
            <div class="col-md-3">
                <label for="inputState" class="form-label"><strong>Status</strong></label>
                <select id="inputState" class="form-select" name="Status" required="true" >
                    <option selected>1</option>
                    <option>0</option>
                </select>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary"><strong>Registrar</strong></button>
            </div>
        </form>
        <br>
        
        <div class="col-md-12" style="height:300px; overflow: scroll;">
            <table class="table">
                <thead class="table-success table-striped">
                    <tr>
                        <th>IDLiga</th>
                        <th>Descripcion</th>
                        <th>Presidente</th>
                        <th>Coordinador</th>
                        <th>Mapa</th>
                        <th>Direccion</th>
                        <th>Telefono</th>
                        <th>Redes</th>
                        <th>Status</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php
                        while ($row=mysqli_fetch_array($query)) {
                    ?>
                    <tr>
                        <th><?php  echo $row['IDLiga']?></th>
                        <th><?php  echo $row['Descripcion']?></th>
                        <th><?php  echo $row['Presidente']?></th>
                        <th><?php  echo $row['Coordinador']?></th>
                        <th><?php  echo $row['Mapa']?></th>
                        <th><?php  echo $row['Direccion']?></th>
                        <th><?php  echo $row['Telefono']?></th>
                        <th><?php  echo $row['Redes']?></th>
                        <th><?php  echo $row['Status']?></th>
                        <th><a href="actualizar.php?id=<?php echo $row['IDLiga'] ?>"
                            class="btn btn-primary">Editar</a></th>
                        <th><a href="delete.php?id=<?php echo $row['IDLigaa'] ?>"
                            class="btn btn-danger">Eliminar</a></th>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>

                
            </table>
        </div>
    </div>

</body>

</html>