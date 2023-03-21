<?php 
    include("conexiones.php");
    $con=conectar();

    $id=$_GET['id'];

    $sql="SELECT * FROM Jugadores WHERE IDAfiliacion='$id'";
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    
    <script src="./validaciones.js"></script>

    <style>
        input:invalid { border-color: red; } input, input:valid { border-color: #ccc; }
        
    </style>
</head>


<body>
    <div class="container" style="margin-top: 10px;">
        <form class="row g-3" action="update.php?id=<?php echo $row['IDAfiliacion']?>" method="POST">
            <div class="col-md-2">
                <label for="inputIDAfiliacion" class="form-label"><strong>IDAfiliacion</strong></label>
                <input type="text" class="form-control" id="inputIDAfiliacion" name="IDAfiliacion" required="true" readonly value="<?php echo($id); ?>">
            </div>
            <div class="col-md-5">
                <label for="inputNombre" class="form-label"><strong>Nombre</strong></label>
                <input type="text" class="form-control" id="inputNombre" name="Nombre" required="true"  onblur="abreviacion()" value="<?php echo $row['Nombre']?>">
            </div>
            <div class="col-md-5">
                <label for="inputApellido" class="form-label"><strong>Apellidos</strong></label>
                <input type="text" class="form-control" id="inputApellidos" name="Apellidos" required="true" onblur="abreviacion()" value="<?php echo $row['Apellidos']?>" >
            </div>
            <div class="col-md-2">
                <label for="inputFecha" class="form-label"><strong>Fecha de nacimiento</strong></label>
                <input type="date" class="form-control" id="inputFecha" name="Fecha" required="true" value="<?php echo $row['Fecha']?>">
            </div>
            <div class="col-md-4">
                <label for="inputCurp" class="form-label"><strong>Curp</strong></label>
                <input type="text" class="form-control" required="true"  id="inputCurp" name="CURP" value="<?php echo $row['CURP']?>" pattern="([A-Z]{4}([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[HM](AS|BC|BS|CC|CL|CM|CS|CH|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|YN|ZS|NE)[A-Z]{3}[0-9A-Z]\d)">
                <pre id="resultado"></pre>
            </div>
            <div class="col-md-2">
                <label for="inputState" class="form-label"><strong>Posición</strong></label>
                <select id="inputState" class="form-select" name="Posicion" required="true" value="<?php echo $row['Posicion']?>">
                    <option selected><?php echo $row['Posicion']?></option>
                    <option >P</option>
                    <option>C</option>
                    <option>1B</option>
                    <option>2B</option>
                    <option>3B</option>
                    <option>SS</option>
                    <option>LF</option>
                    <option>CF</option>
                    <option>RF</option>
                    <option>DE</option>
                    <option>JD</option>
                    <option>BC</option>
                </select>
            </div>
            <div class="col-md-2">
                <label for="inputState" class="form-label"><strong>Golpea</strong></label>
                <select id="inputState" class="form-select" name="Golpea" required="true" value="<?php echo $row['Golpea']?>">
                    <option selected><?php echo $row['Golpea']?></option>
                    <option selected>Derecho</option>
                    <option>Zurdo</option>
                    <option>Ambidiestro</option>
                </select>
            </div>
            <div class="col-md-2">
                <label for="inputState" class="form-label"><strong>Tira</strong></label>
                <select id="inputState" class="form-select" name="Tira" required="true" value="<?php echo $row['Tira']?>">
                    <option selected><?php echo $row['Tira']?></option>
                    <option selected>Derecho</option>
                    <option>Zurdo</option>
                    <option>Ambidiestro</option>
                </select>
            </div>
            <div class="col-md-10">
                <label for="inputPagina" class="form-label"><strong>Pagina</strong></label>
                <input type="text" class="form-control" id="inputPagina" name="Pagina" required="true" readonly value="<?php echo $row['Pagina']?>">
            </div>
            <div class="col-md-2">
                <label for="inputAbreviacion" class="form-label"><strong>Abreviacion</strong></label>
                <input type="text" class="form-control" id="inputAbreviacion" name="Abreviacion" required="true" readonly value="<?php echo $row['Abreviacion']?>">
            </div>
            <div class="col-md-2">
                <label for="inputState" class="form-label"><strong>Status</strong></label>
                <select id="inputState" class="form-select" name="Status" required="true" value="<?php echo $row['Status']?>" >
                    <option selected><?php echo $row['Status']?></option>
                    <option selected>1</option>
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