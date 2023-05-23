<?php 
    include("conexiones.php");
    $con=conectar();

    $sql="SELECT *  FROM Equipos";
    $query=mysqli_query($con,$sql);

    $sqlId="SELECT count(IDEquipo) as id  FROM Equipos";
    $queryId=mysqli_query($con,$sqlId);

    $id=mysqli_fetch_array($queryId);



    //$row=mysqli_fetch_array($query);
    /*$idAmpayer=date("y");
    $idAmpayer=$idAmpayer*100; */

    $idEquipo=$id['id']+1;

    $idE = strlen($idEquipo);

    if($idE==1)
        $idEquipo = "000$idEquipo";
    elseif ($idE==2)
        $idEquipo = "00$idEquipo";
    elseif ($idE == 3)
        $idEquipo = "0$idEquipo";
    else
        $idEquipo=$idE;
    //echo($idAfiliacion);
    $sqlTecnico="SELECT *  FROM Manejadores";
    $queryTecnico=mysqli_query($con, $sqlTecnico);

    
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
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="styles.css">
    <script src="./validaciones.js"></script>
    <script src="../js/Validaciones.js"></script>
    
    
    
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
                            <a class="nav-link " aria-current="page" href="http://localhost:8080/partidos-app/Git/CrudAPP-de-baseball/CapturaDeJuegos/">Partidos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="http://localhost:8080/partidos-app/Git/CrudAPP-de-baseball/Equipos/">Equipos</a>
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
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost:8080/partidos-app/Git/CrudAPP-de-baseball/Rosters/">Rosters</a>
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
        <form class="row g-3" action="insertar.php?id=<?php echo $idEquipo ?>" method="POST" id="formulario">
            <div class="col-md-2">
                <label for="inputIDEquipo" class="form-label"><strong>IDEquipo</strong></label>
                <input type="text" class="form-control" id="inputIDEquipo" name="IDEquipo" required="true" readonly value="<?php echo($idEquipo); ?>">
            </div>
            <div class="col-md-5">
                <label for="inputNombre" class="form-label"><strong>Nombre</strong></label>
                <input type="text" class="form-control" id="inputNombre" name="Nombre" required="true">
            </div>
            <div class="col-md-5">
                <label for="inputLogo" class="form-label"><strong>Logo</strong></label>
                <input type="number" class="form-control" id="inputLogo" name="Logo" required="true">
            </div>
            
            <div class="col-md-4">
                <label for="inputCiudad" class="form-label"><strong>Ciudad</strong></label>
                <input type="text" class="form-control" required="true"  id="inputCiudad" name="Ciudad" >
                <pre id="resultado"></pre>
            </div>
            
            <div class="col-md-2">
                <label for="inputIDTecnico" class="form-label"><strong>Tecnico</strong></label>
                <select id="inputIDTecnico" class="form-select" name="IDTecnico" required="true" >
                    <?php
                        while ($rowT=mysqli_fetch_array($queryTecnico)) {
                            echo "<option value=".$rowT['IDTecnico'].">".$rowT['Nombre']."</option>";
                        }
                    ?>
                </select>
            </div>
            
            <div class="col-12">
                <button type="submit" class="btn btn-primary"><strong>Registrar</strong></button>
            </div>
        </form>
        <br>
        
        <div class="col-md-12" style="height:300px; overflow: auto;">
            <table class="table">
                <thead class="table-success table-striped">
                    <tr>
                        <th>IDEquipo</th>
                        <th>Nombre</th>
                        <th>IDLogo</th>
                        <th>Ciudad</th>
                        <th>IDTecnico</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php
                        while($row=mysqli_fetch_array($query)){
                    ?>
                    <tr>
                        <th><?php  echo $row['IDEquipo']?></th>
                        <th><?php  echo $row['Nombre']?></th>
                        <th><?php  echo $row['IDLogo']?></th>
                        <th><?php  echo $row['Ciudad']?></th>
                        <th><?php  echo $row['IDTecnico']?></th>
                        <th><a href="actualizar.php?id=<?php echo $row['IDEquipo'] ?>"
                            class="btn btn-primary">Editar</a></th>
                        <th><a href="delete.php?id=<?php echo $row['IDEquipo'] ?>"
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