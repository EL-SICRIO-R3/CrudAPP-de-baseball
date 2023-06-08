<?php 
    include("conexiones.php");
    $con=conectar();

    $sql="SELECT *  FROM Avisos";
    $query=mysqli_query($con,$sql);

    $sqlId="SELECT count(IDAviso) as id  FROM Avisos";
    $queryId=mysqli_query($con,$sqlId);

    $id=mysqli_fetch_array($queryId);



    //$row=mysqli_fetch_array($query);
    /*$idAmpayer=date("y");
    $idAmpayer=$idAmpayer*100; */

    $IDAviso=$id['id']+1;

    $idM = strlen($IDAviso);

    if($idM==1)
        $IDAviso = "000$IDAviso";
    elseif ($idM==2)
        $IDAviso = "00$IDAviso";
    elseif ($idM == 3)
        $IDAviso = "0$IDAviso";
    else ($IDAviso = $idM)
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
                            <a class="nav-link " aria-current="page" href="../CapturaDeJuegos/">Partidos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../Equipos/">Equipos</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="../Jugadores/">Jugadores</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " href="../Ampayers/">Ampayers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../Manejadores/">Manejadores</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../Parques/">Parques</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../Ligas/">Ligas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../Temporadas/">Temporadas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../Rosters/">Rosters</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="../Avisos/">Avisos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../CapturaDeAnotaciones/">Anotaciones</a>
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
        <form class="row g-3" action="insertar.php?id=<?php echo $IDAviso?>" method="POST" id="formulario">
            <div class="col-md-2">
                <label for="inputIDAviso" class="form-label"><strong>IDAviso</strong></label>
                <input type="text" class="form-control" id="inputIDAviso" name="IDAviso" required="true" readonly value="<?php echo($IDAviso); ?>">
            </div>
            <div class="col-md-5">
                <label for="inputAviso" class="form-label"><strong>Aviso</strong></label>
                <input type="text" class="form-control" id="inputAviso" name="Aviso" required="true" >
            </div>
    
            <div class="col-12">
                <button type="submit" class="btn btn-primary"><strong>Registrar</strong></button>
            </div>
        </form>
        <br>
        <br>
        
        <div class="col-md-10" style="height:300px; overflow: auto;">
            <table class="table">
                <thead class="table-success table-striped">
                    <tr>
                        <th>IDAviso</th>
                        <th>Aviso</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                        
                    </tr>
                </thead>
                
                <tbody>
                    <?php
                        while($row=mysqli_fetch_array($query)){
                    ?>
                    <tr>
                        <th><?php  echo $row['IDAviso']?></th>
                        <th><?php  echo $row['Aviso']?></th>
                        <th><a href="actualizar.php?id=<?php echo $row['IDAviso'] ?>"
                            class="btn btn-primary">Editar</a></th>
                        <th><a href="delete.php?id=<?php echo $row['IDAviso'] ?>"
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