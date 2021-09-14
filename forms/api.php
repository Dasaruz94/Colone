<?php
/**
 * Created by PhpStorm.
 * User: Daniel
 * Date: 14/06/2017
 * Time: 02:38 PM
 */
date_default_timezone_set('America/Mexico_City');

include '../libs/conexion.php';

$consulta = "SELECT * FROM reserve WHERE id_space LIKE '".$_POST['space']."' AND reserve_date LIKE '".$_POST['date']."' AND active LIKE 1";
$resultado = $mysqli->query($consulta);

$total = mysqli_num_rows($resultado); //Contamos la cantidad de filas que nos arrojo el resultado

if($total > 0){


$reserves = array();

while ($row=mysqli_fetch_row($resultado)) {


    $consulta1 = "SELECT * FROM user_data WHERE id_user LIKE '".$row[3]."'";
    $resultado1 = $mysqli->query($consulta1);

    while ($row1=mysqli_fetch_row($resultado1)) {

        $name = $row1[2].' '.$row1[3];

    }

    $use = $row[6].'-'.$row[7];

    $reserves[] = array('name'=> $name, 'use'=> $use);

}

    $json_string = json_encode($reserves);
    echo $json_string;


}else{
    echo json_encode(0);
}


?>