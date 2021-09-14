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
    $nombre = $request->nombre;
    $ap = $request->ap;
    $am = $request->am;
    $email = $request->email;
    $contra = $request->password;
    $code = $request->code;
    $token = $request->token;

    if($token != '12345'){
        header('Location: https://media.giphy.com/media/JF98Z2md85OFi/giphy_s.gif');
    }

    if ($nombre != "") {

        include 'conexion.php';

        $consulta = "SELECT * FROM place WHERE code LIKE '" . $code . "'";

        $resultado = $mysqli->query($consulta);


        $total = mysqli_num_rows($resultado);

        if ($total > 0) {

            $consulta1 = "SELECT * FROM user WHERE username LIKE '" . $email . "'";

            $resultado1 = $mysqli->query($consulta1);


            $total1 = mysqli_num_rows($resultado1);

            if ($total1 == 0) {


                //Checamos si se lleno el campo de usuario en el formulario
                $b=$contra;
                $patron='Zn5G7hnkL0bhgf1';
                $b=$patron.md5($b);


                    $sql = "INSERT INTO user (id_place,username,password,user_type,created_at,created_by,updated_at,updated_by,active) VALUES ('".$code[2]."','".$email."', '".$b."','2','".date('Y-m-d h:i:s')."','0', '".date('Y-m-d h:i:s')."','0', '1')";

                if (mysqli_query($mysqli, $sql)) {

                    echo json_encode(2);

                }else{

                    echo json_encode(3);
                }

            }else{

                echo json_encode(1);

            }


        }else{

            echo json_encode(0);

    }

    }
    else {
        echo "Empty latitude parameter!";
    }
}
else {
    echo "Not called properly with username parameter!";
}
?>