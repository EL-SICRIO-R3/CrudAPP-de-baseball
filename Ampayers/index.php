<?php 
    include("conexiones.php");
    $con=conectar();

    $sql="SELECT *  FROM Ampayers";
    $query=mysqli_query($con,$sql);

    $sqlId="SELECT count(IDAmpayer) as id  FROM Ampayers";
    $queryId=mysqli_query($con,$sqlId);

    $id=mysqli_fetch_array($queryId);



    //$row=mysqli_fetch_array($query);
    /*$idAmpayer=date("y");
    $idAmpayer=$idAmpayer*100; */

    $idAmpayer=$id['id']+1;

    $idA = strlen($idAmpayer);

    if($idA==1)
        $idAmpayer = "000$idAmpayer";
    elseif ($idA==2)
        $idAmpayer = "00$idAmpayer";
    elseif ($idA == 3)
        $idAmpayer = "0$idAmpayer";
    else ($idAmpayer = $idA)
    //echo($idAfiliacion);
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIGA MLB</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <script src="./validaciones.js"></script>
    
    
    
</head>



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
                            <a class="nav-link active" aria-current="page" href="http://localhost:8080/partidos-app/Git/CrudAPP-de-baseball/CapturaDeJuegos/">Partidos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost:8080/partidos-app/Git/CrudAPP-de-baseball/Equipos/">Equipos</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost:8080/partidos-app/Git/CrudAPP-de-baseball/Jugadores/">Jugadores</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost:8080/partidos-app/Git/CrudAPP-de-baseball/Ampayers/">Ampayers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost:8080/partidos-app/Git/CrudAPP-de-baseball/Manejadores/">Manejadores</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost:8080/partidos-app/Git/CrudAPP-de-baseball/Parques/">Parques</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost:8080/partidos-app/Git/CrudAPP-de-baseball/Ligas/">Ligas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost:8080/partidos-app/Git/CrudAPP-de-baseball/Temporadas/">Temporadas</a>
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
        <form class="row g-3" action="insertar.php?id=<?php echo $idAmpayer ?>" method="POST" id="formulario">
            <div class="col-md-2">
                <label for="inputIDAmpayer" class="form-label"><strong>IDAmpayer</strong></label>
                <input type="text" class="form-control" id="inputIDAmpayer" name="IDAmpayer" required="true" readonly value="<?php echo($idAmpayer); ?>">
            </div>
            <div class="col-md-5">
                <label for="inputNombre" class="form-label"><strong>Nombre</strong></label>
                <input type="text" class="form-control" id="inputNombre" name="Nombre" required="true"  onblur="abreviacion()" >
            </div>
            <div class="col-md-5">
                <label for="inputApellido" class="form-label"><strong>Apellidos</strong></label>
                <input type="text" class="form-control" id="inputApellidos" name="Apellidos" required="true" onblur="abreviacion()"  >
            </div>
            <div class="col-md-2">
                <label for="inputFecha" class="form-label"><strong>Fecha de nacimiento</strong></label>
                <input type="date" class="form-control" id="inputFecha" name="Fecha" required="true" >
            </div>
            <div class="col-md-4">
                <label for="inputCurp" class="form-label"><strong>Curp</strong></label>
                <input type="text" class="form-control" required="true"  id="inputCurp" name="CURP" pattern="([A-Z]{4}([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[HM](AS|BC|BS|CC|CL|CM|CS|CH|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|YN|ZS|NE)[A-Z]{3}[0-9A-Z]\d)">
                <pre id="resultado"></pre>
            </div>
            
            <div class="col-md-2">
                <label for="inputAbreviacion" class="form-label"><strong>Abreviacion</strong></label>
                <input type="text" class="form-control" id="inputAbreviacion" name="Abreviacion" required="true" readonly >
            </div>
            <div class="col-md-2">
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
                        <th>IDAmpayer</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Fecha de Nacimiento</th>
                        <th>CURP</th>
                        <th>Abreviacion</th>
                        <th>Status</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php
                        while($row=mysqli_fetch_array($query)){
                    ?>
                    <tr>
                        <th><?php  echo $row['IDAmpayer']?></th>
                        <th><?php  echo $row['Nombre']?></th>
                        <th><?php  echo $row['Apellidos']?></th>
                        <th><?php  echo $row['Fecha']?></th>
                        <th><?php  echo $row['CURP']?></th>
                        <th><?php  echo $row['Abreviacion']?></th>
                        <th><?php  echo $row['Status']?></th>
                        <th><a href="actualizar.php?id=<?php echo $row['IDAmpayer'] ?>"
                            class="btn btn-primary">Editar</a></th>
                        <th><a href="delete.php?id=<?php echo $row['IDAmpayer'] ?>"
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