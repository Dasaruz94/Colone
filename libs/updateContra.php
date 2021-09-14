<?php
date_default_timezone_set('America/Mexico_City');
mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');
ob_start();

include '../lib/conexion.php';
if($_GET['a'] == 'contrasena'){


    $sql = "UPDATE usuarios SET password = '".$_POST['password']."' WHERE id_usuarios = ".$_GET['id'];

    if (mysqli_query($mysqli, $sql)) {
        ob_end_clean();
        header('Location: ../index.php?e=contrasena');
    }else{
        echo "Error updating record: " . mysqli_error($mysqli);
    }
    mysqli_close($mysqli);
}

?>