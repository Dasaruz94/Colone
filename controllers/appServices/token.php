<?php
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


//http://stackoverflow.com/questions/15485354/angular-http-post-to-php-and-undefined
$postdata = file_get_contents("php://input");
if (isset($postdata)) {
    $request = json_decode($postdata);
    $id = $request->idUser;
    $celToken = $request->celToken;
    $token = $request->token;

    if($token != '12345'){
        header('Location: https://media.giphy.com/media/JF98Z2md85OFi/giphy_s.gif');
    }

    if ($id != "") {

        include 'conexion.php';


        $sql = 'UPDATE user SET token="'.$celToken.'" WHERE id_user="'.$id.'"';
        if (mysqli_query($mysqli, $sql)) {

            echo 'correcto';
        } else {
            echo "Server returns: Error ";
        }



    }else{
        echo 'usuario inexistente';
    }


}
else {
    echo "Empty username parameter!";
}


?>