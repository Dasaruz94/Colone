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


    $idUser = $request->idUser;
    $idPlace = $request->idPlace;
    $name = $request->name;
    $cantidad = $request->cantidad;
    $token = $request->token;

    if($token != '12345'){
        header('Location: https://media.giphy.com/media/JF98Z2md85OFi/giphy_s.gif');
    }


    if ($cantidad != "") {


                include 'conexion.php';

                $consulta = "SELECT * FROM place WHERE id_place LIKE '".$idPlace."' AND active LIKE 1";
                $resultado = $mysqli->query($consulta);


             $total = mysqli_num_rows($resultado);

                 while ($row = mysqli_fetch_row($resultado)){

                  $codePlace = $row[6];

                   // echo $codePlace;
                }


                $randomNumber = rand(0, 1000);

                $codeVisit = $codePlace.$randomNumber.$idUser;


                $contador = 1;

                $proceso = 0;

                while($contador <= $cantidad){

                    $sql = "INSERT INTO visits (id_user,name,code,created_at,created_by,updated_at,updated_by,active,pending) VALUES ('".$idUser."','".$name."', '".$codeVisit."','".date('Y-m-d h:i:s')."','".$idUser."', '".date('Y-m-d h:i:s')."','".$idUser."', '1', '0')";

                    if (mysqli_query($mysqli, $sql)) {
                        $proceso ++;
                    }else{
                        echo 'Error';
                    }

                    $contador ++;

                }

                if($proceso = $cantidad){
                    echo "correcto";
                }


    }else{
        echo 'holi';
    }

}
else {
    echo "Not called properly with username parameter!";
}
?>