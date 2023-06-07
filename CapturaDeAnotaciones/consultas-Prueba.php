<?php
    include("conexiones.php");
    $con=conectar();

    $Inn = $_GET['inning'];

    $sqlInn="SELECT COUNT(*) FROM entradas WHERE IDJuego = " . $Inn;
    $queryInn=mysqli_query($con, $sqlInn);
    $idInn=mysqli_fetch_array($queryInn);
    echo json_encode(array('Resultado' => $idInn[0]));
   

?>