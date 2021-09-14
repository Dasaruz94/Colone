<?php
date_default_timezone_set('America/Mexico_City');
mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');
//http://stackoverflow.com/questions/18382740/cors-not-working-php
if (isset($_SERVER['HTTP_ORIGIN'])) {
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Max-Age: 86400');    // cache for 1 day
}

// Access-Control headers are received during OPTIONS requests
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers:        {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

    exit(0);
}


$postdata = file_get_contents("php://input");
if (isset($postdata)) {
    $request = json_decode($postdata);


    $idPlace = $request->idPlace;
    $idSpace = $request->idSpace;
    $idUser = $request->idUser;
    $asunto = $request->asunto;
    $date = $request->date;
    $horaEntrada = $request->horaEntrada;
    $horaSalida = $request->horaSalida;
    $token = $request->token;

    if($token != '12345'){
        header('Location: https://media.giphy.com/media/JF98Z2md85OFi/giphy_s.gif');
    }


    if ($horaEntrada != "") {

       //include 'conexion.php';

        $horaInicio = new DateTime($horaEntrada);

        $resultado = date_format($horaInicio, 'H:i:s');

        $nuevaHora = date('H:i:s',strtotime('-6 hour',strtotime($resultado))); /// esta es la hora chida
        ///
        ///
        $horaTermino = new DateTime($horaSalida);

        $resultado2 = date_format($horaTermino, 'H:i:s');

        $nuevaHora2 = date('H:i:s',strtotime('-6 hour',strtotime($resultado2))); /// esta es la hora chida 2


        $fecha = new DateTime($date);
        $result = $fecha->format('Y-m-d'); /// Esta es la fecha chida
        ///

        include 'conexion.php';


        $consulta = "SELECT * FROM space WHERE id_space LIKE '".$idSpace."' AND active LIKE 1";
        $resultado = $mysqli->query($consulta);

        $total = mysqli_num_rows($resultado); //Contamos la cantidad de filas que nos arrojo el resultado


        if($total > 0){

            while ($row=mysqli_fetch_row($resultado)) {

                $start_hour = $row[5];
                $end_hour = $row[6];

            }


            $hi = $nuevaHora;
            $hf = $nuevaHora2;

            if($hi == '00:00:00'){

                $hi = '24:00:00';
            }
            if($hf == '00:00:00'){

                $hf = '24:00:00';
            }

            if($hi >= $start_hour && $hf <= $end_hour){

                $consultaReserve = "SELECT * FROM reserve WHERE id_space LIKE '".$idSpace."' AND reserve_date = '".$result."' AND active LIKE 1";
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

                    $sql = "INSERT INTO reserve (id_place,id_space,id_user,reserve_date,subject,start_hour,end_hour,created_at,created_by,updated_at,updated_by,active) VALUES ('".$idPlace."','".$idSpace."', '".$idUser."','".$result."','".$asunto."','".$nuevaHora."','".$nuevaHora2."','".date('Y-m-d h:i:s')."','".$idUser."', '".date('Y-m-d h:i:s')."','".$idUser."', '1')";

                    if (mysqli_query($mysqli, $sql)) {

                        echo json_encode(1);
                       // echo 'correcto';
                    }else{
                        // echo 'Error';
                    }
                    /////// en caso de que si este disponible ese horario.


                }

            }else{

                ///// en caso de que el lugar no este disponible en ese horario

                echo json_encode(2);
            }



        }else{
            echo json_encode(3);
        }




    }

}
else {
    echo "Not called properly with username parameter!";
}
?>