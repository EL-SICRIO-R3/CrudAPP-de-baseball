<?php 
    include("conexiones.php");
    $con=conectar();
    
    $sql="SELECT *  FROM Temporadas";
    $query=mysqli_query($con, $sql);

    $sqlId="SELECT count(IDTemporada) as id  FROM Temporadas";
    $queryId=mysqli_query($con, $sqlId);

    $id=mysqli_fetch_array($queryId);

    //$row=mysqli_fetch_array($query);
    $idTemporada= 1 . date("m") . date("y");
    $idTemporada=$idTemporada*10;
    $idTemporada=$idTemporada+$id['id']+1;
    $DateA = date("Y");
    
    
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
    #inputTemporada{
        background: #E9ECEF;
    }
</style>

<script>
    var CURP = document.getElementById('inputCurp');
    CURP.oninvalid = function(event) { event.target.setCustomValidity('Username should only contain lowercase letters. e.g. john'); }
    function reload() {
        //setTimeout('document.location.reload()',2000);
        location.reload()
    }

    

    
    function abreviacion(){
        var nombre = document.getElementById('inputNombre');
        var apellido = document.getElementById('inputApellido');
        var abreviacion = document.getElementById('inputAbreviacion');
        document.formulario.inputAbreviacion.value=apellido;
        /*if(nombre != null && apellido != null){
            nom: String=nombre;
            apell: String=apellido;
            abre: String = abreviacion;
            nom.indexOf(2,0);
            document.formulario.abreviacion=nom;
        }*/
    }

</script>

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
        <form class="row g-3" action="insertar.php?id=<?php echo $idTemporada ?>" method="POST" id="formulario">
            <div class="col-md-3">
                <label for="inputIDTemporada" class="form-label"><strong>IDTemporada</strong></label>
                <input type="text" class="form-control" id="inputIDTemporada" name="IDTemporada" required="true" disabled value="<?php echo($idTemporada); ?>">
            </div>
            <div class="col-md-3">
                <label for="inputIDLiga" class="form-label"><strong>IDLiga</strong></label>
                <select id="inputIDLiga" class="form-select" name="IDLiga" required="true" >
                    <option select >RCV</option>
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
                <select id="inputGrupo" class="form-select" name="Grupo" required="true" >
                    <option selected >Novatas</option>
                    <option>Intermedio</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="inputTemporada" class="form-label"><strong>Temporada</strong></label>
                <input type="text" class="form-control" id="inputTemporada" name="Temporada" required="true" value="<?php echo($DateA)?>" readonly=»readonly»>
            </div>
            <div class="col-md-3">
                <label for="inputCategoria" class="form-label"><strong>Categoria</strong></label>
                <select id="inputCategoria" class="form-select" name="Categoria" required="true" >
                    <option selected >Varonil</option>
                    <option>Femenil</option>
                    
                </select>
            </div>
            <div class="col-md-3">
                <label for="inputMomento" class="form-label"><strong>Momento</strong></label>
                <select id="inputMomento" class="form-select" name="Momento" required="true" >
                    <option selected >Amistoso</option>
                    <option>Torneo</option>
                    
                </select>
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
                        <th>IDTemporada</th>
                        <th>IDLiga</th>
                        <th>Grupo</th>
                        <th>Categoria</th>
                        <th>Momento</th>
                        <th>Temporada</th>
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
                        <th><?php  echo $row['IDTemporada']?></th>
                        <th><?php  echo $row['IDLiga']?></th>
                        <th><?php  echo $row['Grupo']?></th>
                        <th><?php  echo $row['Categoria']?></th>
                        <th><?php  echo $row['Momento']?></th>
                        <th><?php  echo $row['Temporada']?></th>
                        <th><?php  echo $row['Status']?></th>
                        <th><a href="actualizar.php?id=<?php echo $row['IDTemporada'] ?>"
                            class="btn btn-primary">Editar</a></th>
                        <th><a href="delete.php?id=<?php echo $row['IDTemporada'] ?>"
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