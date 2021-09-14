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
    $asunto = $request->asunto;
    $mensaje = $request->mensaje;
    $token = $request->token;

    if($token != '12345'){
        header('Location: https://media.giphy.com/media/JF98Z2md85OFi/giphy_s.gif');
    }

    if ($asunto != "") {

        include 'conexion.php';




            $sql = "INSERT INTO suggestion (id_user,id_place,title,text,created_at,created_by,updated_at,updated_by,active)VALUES('". $idUser ."','" . $idPlace . "','" . $asunto . "','" . $mensaje . "','" . date('Y-m-d h:i:s') . "','" . $idUser . "','" . date('Y-m-d h:i:s') . "','" . $idUser . "','1')";

            if (mysqli_query($mysqli, $sql)) {
                echo 'correcto';
            }else{
                echo 'Error';
            }

            }

}
else {
    echo "Not called properly with username parameter!";
}
?>