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
    $correo = $request->correo;
    $token = $request->token;

    if($token != '12345'){
        header('Location: https://media.giphy.com/media/JF98Z2md85OFi/giphy_s.gif');
    }

    if ($correo != "") {

        include 'conexion.php';

        $consulta = "SELECT * FROM user WHERE username LIKE '" . $correo . "'";

        $resultado = $mysqli->query($consulta);

        $total = mysqli_num_rows($resultado); //Contamos la cantidad de filas que nos arrojo el resultado

        if($total > 0){


        while ($row=mysqli_fetch_row($resultado))
        {
                $idUser = $row[0];
        }


               /*         $para  = $correo;


                        $t�tulo = 'Cambiar contrese�a | Nom ads';


                        $mensaje = '
                <html>
                <head>
                  <title>Cambiar contrase�a</title>
                </head>
                <body>
                  <p>En el siguiente link podr�s reestablecer tu contrase�a</p>

                <a href="http://www.nom-ads.com/Ocontrasena.php?id='.$idUser.'">Cambiar contrase�a</a>

                </body>
                </html>
                ';

                        // Para enviar un correo HTML, debe establecerse la cabecera Content-type
                        $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
                        $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

                        // Cabeceras adicionales
                        $cabeceras .= 'To: ' . "\r\n";
                        $cabeceras .= 'From: Cambiar <nomads@example.com>' . "\r\n";
                        $cabeceras .= 'Cc: ' . "\r\n";
                        $cabeceras .= 'Bcc: ' . "\r\n";

                        // Enviarlo
                        if(mail($para, $t�tulo, $mensaje, $cabeceras)){

                            echo 'correcto';
                        }else{
                            echo 'error';
                        }
*/


            /// enviado
            echo json_encode(2);



            /// error de envio
           /// echo json_encode(3);


        }else{

            /// no existe ese usuario
            echo json_encode(0);

        }



    }
    else {

        /// no se agrego un mail
        echo json_encode(1);
    }
}
else {
    echo "Not called properly with username parameter!";
}
?>