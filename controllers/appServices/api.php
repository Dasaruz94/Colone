<?php
date_default_timezone_set('America/Mexico_City');
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

if(@$_GET['token'] == '1234'){

    if(@$_GET['a']=='loginStart') {

        include 'conexion.php';

        $b=$_GET['password'];
        $patron='Zn5G7hnkL0bhgf1';
        $b=$patron.md5($b);

        $consulta = "SELECT * FROM user WHERE username LIKE '" . $_GET['username'] . "' AND password LIKE '" . $b . "' AND active LIKE 1";
        $resultado = $mysqli->query($consulta);


        $total = mysqli_num_rows($resultado); //Contamos la cantidad de filas que nos arrojo el resultado

        if($total > 0){
            echo 'correcto';
        }else{
            echo 'error';
        }

    }

    if(@$_GET['a']=='login') {



        include 'conexion.php';

        $b=$_GET['password'];
        $patron='Zn5G7hnkL0bhgf1';
        $b=$patron.md5($b);

        $consulta = "SELECT * FROM user WHERE username LIKE '" . $_GET['username'] . "' AND password LIKE '" . $b . "' AND active LIKE 1";
        $resultado = $mysqli->query($consulta);


        $total = mysqli_num_rows($resultado); //Contamos la cantidad de filas que nos arrojo el resultado

        if($total > 0){
            $emparray = array();
            while ($row = mysqli_fetch_assoc($resultado)){
                $emparray[] = $row;
            }


            echo json_encode($emparray);
        }else{
            echo 'error';
        }

    }

    if(@$_GET['a']=='noti') {

        include 'conexion.php';

        $consulta = "SELECT * FROM notificacion WHERE id_usuarios LIKE '".$_GET['id'] ."' AND active LIKE 1 ORDER BY id_notificacion DESC";
        $resultado = $mysqli->query($consulta);


        $total = mysqli_num_rows($resultado); //Contamos la cantidad de filas que nos arrojo el resultado

        if($total > 0){
            $emparray = array();
            while ($row = mysqli_fetch_assoc($resultado)){

                $emparray[] = $row;
            }


            echo json_encode($emparray);
        }else{

        }


    }

    if(@$_GET['a']=='finance') {

        include 'conexion.php';

        $consulta = "SELECT * FROM charge WHERE id_user LIKE '".$_GET['id'] ."' AND active LIKE 1 order by id_charge DESC";
        $resultado = $mysqli->query($consulta);


        $total = mysqli_num_rows($resultado); //Contamos la cantidad de filas que nos arrojo el resultado

        if($total > 0){
            $emparray = array();
            while ($row = mysqli_fetch_assoc($resultado)){

                $emparray[] = $row;
            }


            echo json_encode($emparray);
        }else{

        }


    }

    if(@$_GET['a']=='info') {

        include 'conexion.php';

        $consulta = "SELECT * FROM user_data WHERE id_user LIKE '".$_GET['id'] ."' AND active LIKE 1";
        $resultado = $mysqli->query($consulta);

        $total = mysqli_num_rows($resultado); //Contamos la cantidad de filas que nos arrojo el resultado

        if($total > 0){

            while ($row = mysqli_fetch_row($resultado)){

                    $name = $row[2];

            }
            echo $name;
        }else{

        }

    }

    if(@$_GET['a']=='spaces') {

        include 'conexion.php';

        $consulta = "SELECT * FROM space WHERE id_place LIKE '".$_GET['id'] ."' AND active LIKE 1";
        $resultado = $mysqli->query($consulta);


        $total = mysqli_num_rows($resultado); //Contamos la cantidad de filas que nos arrojo el resultado

        if($total > 0){
            $emparray = array();
            while ($row = mysqli_fetch_assoc($resultado)){

                $emparray[] = $row;
            }


            echo json_encode($emparray);
        }else{

        }

    }

    if(@$_GET['a']=='invCode') {

        include 'conexion.php';

        $consulta = "SELECT * FROM visits WHERE id_user LIKE '".$_GET['id'] ."' AND active LIKE 1 order by id_visit DESC LIMIT 1";
        $resultado = $mysqli->query($consulta);


        $total = mysqli_num_rows($resultado); //Contamos la cantidad de filas que nos arrojo el resultado

        if($total > 0){

            while ($row = mysqli_fetch_row($resultado)){

                $name = $row[3];

            }
            echo $name;
        }else{

        }

    }

    if(@$_GET['a']=='notice') {

        include 'conexion.php';

        $consulta = "SELECT * FROM notice WHERE id_place LIKE '".$_GET['id'] ."' AND active LIKE 1 ORDER BY id_notice DESC";
        $resultado = $mysqli->query($consulta);


        $total = mysqli_num_rows($resultado); //Contamos la cantidad de filas que nos arrojo el resultado

        if($total > 0){
            $emparray = array();
            while ($row = mysqli_fetch_assoc($resultado)){

                $emparray[] = $row;
            }


            echo json_encode($emparray);
        }else{

        }


    }

    if(@$_GET['a']=='noti') {

        include 'conexion.php';

        $consulta = "SELECT * FROM notification WHERE id_user LIKE '".$_GET['id'] ."' AND active LIKE 1";
        $resultado = $mysqli->query($consulta);


        $total = mysqli_num_rows($resultado); //Contamos la cantidad de filas que nos arrojo el resultado

        if($total > 0){
            $emparray = array();
            while ($row = mysqli_fetch_assoc($resultado)){

                $emparray[] = $row;
            }


            echo json_encode($emparray);
        }else{

        }


    }

    if(@$_GET['a']=='vigilant') {

        include 'conexion.php';

        $consulta = "SELECT * FROM vigilant WHERE id_place LIKE '".$_GET['id'] ."' AND status LIKE 1 AND active LIKE 1";
        $resultado = $mysqli->query($consulta);


        $total = mysqli_num_rows($resultado); //Contamos la cantidad de filas que nos arrojo el resultado

        if($total > 0){
            $emparray = array();
            while ($row = mysqli_fetch_assoc($resultado)){

                $emparray[] = $row;
            }


            echo json_encode($emparray);
        }else{

        }


    }

    if(@$_GET['a']=='place') {

        include 'conexion.php';

        $consulta = "SELECT * FROM place WHERE id_place LIKE '".$_GET['id'] ."' AND active LIKE 1";
        $resultado = $mysqli->query($consulta);


        $total = mysqli_num_rows($resultado); //Contamos la cantidad de filas que nos arrojo el resultado

        if($total > 0){
            $emparray = array();
            while ($row = mysqli_fetch_assoc($resultado)){

                $emparray[] = $row;
            }


            echo json_encode($emparray);
        }else{

        }


    }

    if(@$_GET['a']=='notidelete') {

        include 'conexion.php';


        $sql = 'UPDATE notification SET active = 0 WHERE id_notification = "'.$_GET['id'].'"';
        if (mysqli_query($mysqli, $sql)) {

            echo 'exito';
        } else {
            echo "Server returns: Error ";
        }

    }

}
?>