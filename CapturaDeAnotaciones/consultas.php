<?php
    include("conexiones.php");
    $con=conectar();
    error_reporting(0);
    $arrV = array();
    $arrL = array();
    if($_GET['Option'] != null){
        $Op=$_GET['Option'];
        $Inn = $_GET['inning'];
    }else{
        $Op=$_POST['Option'];
    }
       
    
    
    $responseV = array();
    $responseL = array();
    $responseTur = array();

    if ($Op == 1) {

        $sqlInn="SELECT COUNT(*) FROM Entradas WHERE IDJuego = " . $Inn;
        $queryInn=mysqli_query($con, $sqlInn);
        $idInn=mysqli_fetch_array($queryInn);
        echo json_encode(array('Resultado' => $idInn[0]));

    } elseif ($Op == 2) {
        //Equipo Visitante
        $sqlEqV="SELECT IDEquipoVisitante FROM Juegos WHERE IDJuego = " . $Inn;
        $queryEqV=mysqli_query($con, $sqlEqV);
        $idEqV=mysqli_fetch_array($queryEqV);

        $sqlRV="SELECT * FROM Rosters WHERE IDEquipo = " . $idEqV['IDEquipoVisitante'];
        $queryRV=mysqli_query($con, $sqlRV);
        //$idRV=mysqli_fetch_array($queryRV);
        while ($rowRV=mysqli_fetch_array($queryRV)) {
            $sqlRV1="SELECT * FROM Jugadores WHERE IDAfiliacion = " . $rowRV['IDAfiliacion'];
            $queryRV1=mysqli_query($con, $sqlRV1);
            $idRV1=mysqli_fetch_array($queryRV1);
            array_push($responseV, $idRV1);
        }

        //Equipo Local
        $sqlEqL="SELECT IDEquipoLocal FROM Juegos WHERE IDJuego = " . $Inn;
        $queryEqL=mysqli_query($con, $sqlEqL);
        $idEqL=mysqli_fetch_array($queryEqL);

        $sqlRL="SELECT * FROM Rosters WHERE IDEquipo = " . $idEqL['IDEquipoLocal'];
        $queryRL=mysqli_query($con, $sqlRL);
        //$idRL=mysqli_fetch_array($queryRL);
        while ($rowRL=mysqli_fetch_array($queryRL)) {
            $sqlRL1="SELECT * FROM Jugadores WHERE IDAfiliacion = " . $rowRL['IDAfiliacion'];
            $queryRL1=mysqli_query($con, $sqlRL1);
            $idRL1=mysqli_fetch_array($queryRL1);
            array_push($responseL, $idRL1);
        }

        echo json_encode(array('ResultV' => $responseV, 'ResultL' => $responseL, 'EquipoV' => $idEqV['IDEquipoVisitante'], 'EquipoL' => $idEqL['IDEquipoLocal']));
          
    } elseif ($Op == 3) {

      
        $sqlTur="SELECT * FROM Turnos WHERE IDJuego = " . $Inn;
        $queryTur=mysqli_query($con, $sqlTur);
        //$Consulta=mysqli_fetch_array($queryTur);
        while ($rowTur=mysqli_fetch_assoc($queryTur)) {
            array_push($responseTur, $rowTur);
        }

        

        echo json_encode(array('Result' => $responseTur));
    }elseif ($Op == 4) {
        $IdJuego=$_POST['IdJuego'];
        $IDBateador=$_POST['IDBateador'];
        $AB=$_POST['AB'];
        $C=$_POST['C'];
        $H=$_POST['H'];
        $CP=$_POST['CP'];
        $BB=$_POST['BB'];
        $K=$_POST['K'];
        $PJE=$_POST['PJE'];
        $OBP=$_POST['OBP'];


        $sqlBat="INSERT INTO bateadores(IDJuego, IDAfiliacion, AB, C, H, CP, BB, K, PJE, OBP)
        VALUES ($IdJuego,$IDBateador,$AB,$C,$H,$CP,$BB,$K,$PJE,$OBP)";
        $queryBat=mysqli_query($con, $sqlBat);

        echo json_encode(array('Result' => 1));

    }elseif ($Op == 5) {
        $IdJuego=$_POST['IdJuego'];
        $IDLanzador=$_POST['IDLanzador'];
        $IPE=$_POST['IP'];
        $BA=$_POST['BA'];
        $C=$_POST['C'];
        $H=$_POST['H'];
        $BB=$_POST['BB'];
        $K=$_POST['K'];
        $PCA=$_POST['PCA'];
        $POP=$_POST['POP'];


        $sqlLan="INSERT INTO lanzadores(IDJuego, IDAfiliacion, IP, BA, C, H, BB, K, PCA, POP)
        VALUES ($IdJuego,$IDLanzador,$IPE,$BA,$C,$H,$BB,$K,$PCA,$POP)";
        $queryLan=mysqli_query($con, $sqlLan);

        echo json_encode(array('Result' => 1));


    }
   
   
?>