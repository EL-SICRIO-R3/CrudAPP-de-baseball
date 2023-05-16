<?php 
    include("conexiones.php");
    $con=conectar();

    $sql="SELECT *  FROM Juegos";
    $query=mysqli_query($con,$sql);

    $sqlId="SELECT count(IDJuego) as id  FROM Juegos";
    $queryId=mysqli_query($con,$sqlId);



    $id=mysqli_fetch_array($queryId);
 
    $sqlTemporada="SELECT *  FROM Temporadas";
    $queryTemporada=mysqli_query($con, $sqlTemporada);

    $sqlParque="SELECT *  FROM Parques";
    $queryParque=mysqli_query($con, $sqlParque);

    $sqlEquipo="SELECT *  FROM Equipos";
    $queryEquipo=mysqli_query($con, $sqlEquipo);

    $sqlEquipoLocal="SELECT *  FROM Equipos";
    $queryEquipoLocal=mysqli_query($con, $sqlEquipoLocal);
    
    



    //$row=mysqli_fetch_array($query);
    /*$idAmpayer=date("y");
    $idAmpayer=$idAmpayer*100; */

    $IDJuego=$id['id']+1;

    $idJ = strlen($IDJuego);

    if($idJ==1)
        $IDJuego = "000$IDJuego";
    elseif ($idJ==2)
        $IDJuego = "00$IDJuego";
    elseif ($idJ == 3)
        $IDJuego = "0$IDJuego";
    else ($IDJuego = $idJ)
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
    
    
</head>



<body>


    <div class="container" style="margin-top: 10px; " >
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

    <div class="container" style="margin-top: 40px; background-color: white; border-radius: 40px; height:620px; " id="contenedorFormulario">
        <form class="row g-3" action="insertar.php?id=<?php echo $IDJuego ?>" method="POST" id="formulario">
            <div class="col-md-2">
                <label for="inputIDJuego" class="form-label"><strong>Nuevo Juego</strong></label>
                <input type="text" class="form-control" id="inputIDJuego" name="IDJuego" required="true" readonly value="<?php echo($IDJuego); ?>">
            </div>
            
            <div class="col-md-5" >
                <label for="inputTemporadas" class="form-label"><strong>Temporadas</strong></label>
                <select id="inputIDTemporada" class="form-select" name="IDTemporada" required="true" >
                    <?php
                        while ($rowT=mysqli_fetch_array($queryTemporada)) {
                            echo "<option value=".$rowTL['IDTemporada'].">".$rowT['IDTemporada']." ".$rowT['IDLiga']." ".$rowT['Grupo']."</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="col-md-3" >
                <label for="inputCampo" class="form-label"><strong>Campo</strong></label>
                <select id="inputIDCampo" class="form-select" name="IDCampo" required="true" >
                    <?php
                        while ($rowT=mysqli_fetch_array($queryParque)) {
                            echo "<option>".$rowT['IDCampo']."</option>";
                        }
                    ?>
                </select>
            </div>

            <div class="col-12" style="height: 25px;  display: inline">
                <label for="inputJornada" class="form-label"><strong>Jornada</strong></label>
                <div class="col-12" style="display: inline;  height: 25px; width: 25px; position: relative;" ><input type="button" value="01"></div>
                <div class="col-12" style="display: inline;  height: 25px; width: 25px; position: relative;" ><input type="button" value="02"></div>
                <div class="col-12" style="display: inline;  height: 25px; width: 25px; position: relative;" ><input type="button" value="03"></div>
                <div class="col-12" style="display: inline;  height: 25px; width: 25px; position: relative;" ><input type="button" value="04"></div>
                <div class="col-12" style="display: inline;  height: 25px; width: 25px; position: relative;" ><input type="button" value="05"></div>
                <div class="col-12" style="display: inline;  height: 25px; width: 25px; position: relative;" ><input type="button" value="06"></div>
                <div class="col-12" style="display: inline;  height: 25px; width: 25px; position: relative;" ><input type="button" value="07"></div>
                <div class="col-12" style="display: inline;  height: 25px; width: 25px; position: relative;" ><input type="button" value="08"></div>
                <div class="col-12" style="display: inline;  height: 25px; width: 25px; position: relative;" ><input type="button" value="09"></div>
                <div class="col-12" style="display: inline;  height: 25px; width: 25px; position: relative;" ><input type="button" value="10"></div>
                <div class="col-12" style="display: inline;  height: 25px; width: 25px; position: relative;" ><input type="button" value="11"></div>
                <div class="col-12" style="display: inline;  height: 25px; width: 25px; position: relative;" ><input type="button" value="12"></div>
                <div class="col-12" style="display: inline;  height: 25px; width: 25px; position: relative;" ><input type="button" value="13"></div>
                <div class="col-12" style="display: inline;  height: 25px; width: 25px; position: relative;" ><input type="button" value="14"></div>
                <div class="col-12" style="display: inline;  height: 25px; width: 25px; position: relative;" ><input type="button" value="15"></div>
                <div class="col-12" style="display: inline;  height: 25px; width: 25px; position: relative;" ><input type="button" value="X"></div>
            </div>
            
            <div class="col-2">
                <label for="inputClima" class="form-label"><strong>Clima</strong></label>
                
                <select id="inputClima" class="form-select" name="Clima" required="true">
                   <option>Despejado</option>
                   <option>Soleado</option>
                </select>
            </div>

            <div class="col-md-2">
                <label for="inputFecha" class="form-label"><strong>Fecha</strong></label>
                <input type="date" class="form-control" id="inputFecha" name="Fecha" required="true" >
            </div>
            <div class="col-md-2">
                <label for="inputHora" class="form-label"><strong>Hora</strong></label>
                <input type="time" class="form-control" id="inputHora" name="Hora" required="true" >
            </div>
            <div class="col-md-2">
                <label for="inputFinal" class="form-label"><strong>Final</strong></label>
                <input type="Text" class="form-control" id="inputFinal" name="Final" required="true" >
            </div>
            <div class="col-md-2">
                <label for="inputInning" class="form-label"><strong>Innings</strong></label>
                <input type="Number"  class="form-control" id="inputInning" name="Inning" required="true"  oninput="if( this.value.length > 2 )  this.value = this.value.slice(0,2)" max="12">
            </div>

            <div class="row" style="margin-top: 15px; ">
                <div class="col-md-5" style="width: 300px;">
                    <select id="inputEquipoVisitante" class="form-select" name="EquipoVisitante" required="true" >
                        <option value="" disabled selected>Equipo Visitante</option>
                        <?php
                            while ($rowT=mysqli_fetch_array($queryEquipo)) {
                                echo "<option value=".$rowT['IDEquipo'].">".$rowT['Nombre']."</option>";
                            }
                        ?>
                    </select>
                </div>
            </div>

            <div class="row" >
                <div class="col-md-5" style="width: 300px; margin-top: 10px;">
                    <select id="inputEquipoLocal" class="form-select" name="EquipoLocal" required="true" >
                        <option value="" disabled selected>Equipo Local</option>
                        <?php
                            while ($rowTL=mysqli_fetch_array($queryEquipoLocal)) {
                                echo "<option value=".$rowTL['IDEquipo'].">".$rowTL['Nombre']."</option>";
                            }
                        ?>
                    </select>
                </div>
            </div>

            <div class="col-md-1">
                <label for="inputFinal" class="form-label"><strong>Ganó</strong></label>
            </div>
            <div class="col-md-2">
                <input type="Text" class="form-control" id="inputFinal" name="Final" required="true" >
            </div>
            

            <div class="col-12" >
                <button type="submit" class="btn btn-primary"><strong>Registrar</strong></button>
            </div>
        </form>
        <br>
        <br>
        
        <div class="col-md-12" style="height:220px; overflow: scroll; background-color: white; width: 100%;">
            <table class="table" >
                <thead class="table-success table-striped" >
                    <tr>
                        <th style="background-color: white;">IDJuego</th>
                        <th style="background-color: white;">Jornada</th>
                        <th style="background-color: white;">Fecha</th>
                        <th style="background-color: white;">Visitante</th>
                        <th style="background-color: white;">Local</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php
                        while($row=mysqli_fetch_array($query)){
                    ?>
                    <tr>
                        <th><?php  echo $row['IDCampo']?></th>
                        <th><?php  echo $row['Descripcion']?></th>
                        <th><a href="actualizar.php?id=<?php echo $row['IDCampo'] ?>"
                            class="btn btn-primary">Editar</a></th>
                        <th><a href="delete.php?id=<?php echo $row['IDCampo'] ?>"
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