<?php
/**
 * Created by PhpStorm.
 * User: Daniel
 * Date: 14/06/2017
 * Time: 02:38 PM
 */
date_default_timezone_set('America/Mexico_City');


include '../libs/conexion.php';

$consulta = "SELECT * FROM space WHERE id_space LIKE '".$_POST['space']."' AND active LIKE 1";
$resultado = $mysqli->query($consulta);

$total = mysqli_num_rows($resultado); //Contamos la cantidad de filas que nos arrojo el resultado


if($total > 0){

    while ($row=mysqli_fetch_row($resultado)) {

        $start_hour = $row[5];
        $end_hour = $row[6];

    }


    $hi = $_POST['timeStart'].':00';
    $hf = $_POST['timeEnd'].':00';

    if($hi == '00:00:00'){

        $hi = '24:00:00';
    }
    if($hf == '00:00:00'){

        $hf = '24:00:00';
    }

    if($hi >= $start_hour && $hf <= $end_hour){

        $consultaReserve = "SELECT * FROM reserve WHERE id_space LIKE '".$_POST['space']."' AND reserve_date = '".$_POST['date']."' AND active LIKE 1";
        $resultadoReserve = $mysqli->query($consultaReserve);

       //Contamos la cantidad de filas que nos arrojo el resultado


        $totalReserve = mysqli_num_rows($resultadoReserve); //Contamos la cantidad de filas que nos arrojo el resultado


        if($totalReserve > 0){

            while ($row1=mysqli_fetch_row($resultadoReserve)) {

                $hri = $row1[6];
                $hrf = $row1[7];

                if ($hi >= $hri && $hi < $hrf) {

                    echo json_encode(0);

                    break;

                } else {

                    if ($hf <= $hri && $hf <= $hrf) {

                        /// en este caso ya esta reservado el espacio

                        echo json_encode(0);

                        break;

                    } else {
                        $status = 1;
                    }

                }

            }

        }else{
            $status = 1;
        }





        if(@$status == 1){

            /////// en caso de que si este disponible ese horario.

            echo json_encode(1);
        }

    }else{

        ///// en caso de que el lugar no este disponible en ese horario

        echo json_encode(2);
    }



}else{
    echo json_encode(3);
}



?>