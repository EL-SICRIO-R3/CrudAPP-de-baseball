<?php 
    include("conexiones.php");
    $con=conectar();

    $sql="SELECT *  FROM Rosters";
    $query=mysqli_query($con,$sql);

    $sqlId="SELECT count(IDRoster) as id  FROM Rosters";
    $queryId=mysqli_query($con,$sqlId);

    $id=mysqli_fetch_array($queryId);



    //$row=mysqli_fetch_array($query);
    /*$idAmpayer=date("y");
    $idAmpayer=$idAmpayer*100; */

    $idRosters=$id['id']+1;

    $idE = strlen($idRosters);

    if($idE==1)
        $idRosters = "000$idRosters";
    elseif ($idE==2)
        $idRosters = "00$idRosters";
    elseif ($idE == 3)
        $idRosters = "0$idRosters";
    else
        $idRosters=$idE;
    //echo($idAfiliacion);

    
    $sqlEquipo="SELECT *  FROM Equipos";
    $queryEquipo=mysqli_query($con, $sqlEquipo);

    $sqlTemporada="SELECT * FROM Temporadas";
    $queryTemporada=mysqli_query($con, $sqlTemporada);

    $sqlAfiliacion="SELECT * FROM Jugadores";
    $queryAfiliacion=mysqli_query($con, $sqlAfiliacion);
    
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
                        <li class="nav-item">
                            <a class="nav-link active" href="http://localhost:8080/partidos-app/Git/CrudAPP-de-baseball/Rosters/">Rosters</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="http://localhost:8080/partidos-app/Git/CrudAPP-de-baseball/Avisos/">Avisos</a>
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
        <form class="row g-3" action="insertar.php?id=<?php echo $idRosters ?>" method="POST" id="formulario">
            <div class="col-md-2">
                <label for="inputIDRoster" class="form-label"><strong>IDEquipo</strong></label>
                <input type="text" class="form-control" id="inputIDRoster" name="IDRoster" required="true" readonly value="<?php echo($idRosters); ?>">
            </div>
          
            
            <div class="col-md-2">
                <label for="inputIDEquipo" class="form-label"><strong>Equipo</strong></label>
                <select id="inputIDEquipo" class="form-select" name="IDEquipo" required="true" >
                    <?php
                        while ($rowT=mysqli_fetch_array($queryEquipo)) {
                            echo "<option value=".$rowT['IDEquipo'].">".$rowT['Nombre']."</option>";
                        }
                    ?>
                </select>
            </div>

            
            <div class="col-md-2">
                <label for="inputIDTemporada" class="form-label" disabled selected><strong>Temporada</strong></label>
                <select id="inputIDTemporada" class="form-select" name="IDTemporada" required="true" >

                    <?php
                        while ($rowT=mysqli_fetch_array($queryTemporada)) {
                            echo "<option value=".$rowT['IDTemporada'].">".$rowT['IDTemporada']." ".$rowT['IDLiga']." ".$rowT['Grupo']."</option>";
                        }
                    ?>


                </select>
            </div>


            <div class="col-md-2">
                <label for="inputIDAfiliacion" class="form-label" disabled selected><strong>Jugador</strong></label>
                <select id="inputIDAfiliacion" class="form-select" name="IDAfiliacion" required="true" >

                    <?php
                        while ($rowT=mysqli_fetch_array($queryAfiliacion)) {
                            echo "<option value=".$rowT['IDAfiliacion'].">".$rowT['IDAfiliacion']."-".$rowT['Abreviacion']."</option>";
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
                        <th>IDRoster</th>
                        <th>Equipo</th>
                        <th>Temporada</th>
                        <th>Afiliacion</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php
                        while($row=mysqli_fetch_array($query)){
                    ?>
                    <tr>
                        <th><?php  echo $row['IDRoster']?></th>
                        <th>
                            <?php 
                                $idEquipo= $row['IDEquipo'];
                                $qEquipo="SELECT *  FROM Equipos WHERE IDEquipo='$idEquipo'";
                                $queryE=mysqli_query($con, $qEquipo);  
 
                                $rowEquipo=mysqli_fetch_array($queryE);
                                echo $rowEquipo['Nombre']
                            ?>
                        </th>
                        <th>
                            <?php 
                                $idTemporada= $row['IDTemporada'];
                                $qTemporada="SELECT *  FROM Temporadas WHERE IDTemporada='$idTemporada'";
                                $queryT=mysqli_query($con, $qTemporada);  
 
                                $rowTemporada=mysqli_fetch_array($queryT);
                                echo $rowTemporada['IDTemporada']." ".$rowTemporada['IDLiga']." ".$rowTemporada['Grupo'];
                            ?>
                        </th>
                        <th>
                            <?php 
                                $idAfiliacion= $row['IDAfiliacion'];
                                $qAfiliacion="SELECT *  FROM Jugadores WHERE IDAfiliacion='$idAfiliacion'";
                                $queryA=mysqli_query($con, $qAfiliacion);  
 
                                $rowAfiliacion=mysqli_fetch_array($queryA);
                                echo $rowAfiliacion['IDAfiliacion']."-".$rowAfiliacion['Abreviacion'];
                            ?>
                        </th>


                        <th><a href="actualizar.php?id=<?php echo $row['IDRoster'] ?>"
                            class="btn btn-primary">Editar</a></th>
                        <th><a href="delete.php?id=<?php echo $row['IDRoster'] ?>"
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