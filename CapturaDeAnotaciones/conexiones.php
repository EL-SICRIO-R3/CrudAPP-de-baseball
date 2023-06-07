<?php
    function conectar(){
        $host="localhost";
        $user="root";
        $pass="";

        $bd="programacionweb";

        $con=mysqli_connect($host,$user,$pass);

        mysqli_select_db($con,$bd);

        return $con;
    }

    function Probar($busqueda)
    {
        $con=conectar();
        $sqlTemporada="SELECT *  FROM Temporadas";
        $queryTemporada=mysqli_query($con, $sqlTemporada);
    }
   
?>