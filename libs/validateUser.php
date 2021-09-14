<?php
include '../lib/conexion.php';

$id = $_GET["id"];

$sql = "UPDATE usuarios SET active = 1 WHERE id_usuarios = ".$id;

    if (mysqli_query($mysqli, $sql)) {

        header('Location: ../verificar.html');

    }

 ?>
