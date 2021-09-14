<?php
/**
 * Created by PhpStorm.
 * User: Daniel
 * Date: 22/05/2017
 * Time: 12:52 AM
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>


<!--
 Usuario, contraseña, nombre, apellido paterno, apellido materno, email, tipo de lugar (condominio, departamento, oficinas).

 Logotipo, dirección, teléfono, nombre lugar, información opcional




 -->



<form action="controllers/createController.php?a=createClient" method="post">

    email:<br>
    <input type="text" name="email"><br>
    Contraseña:<br>
    <input type="text" name="password"><br>
    Nombre:<br>
    <input type="text" name="name"><br>
    Ap:<br>
    <input type="text" name="ap"><br>
    Am:<br>
    <input type="text" name="am"><br>

    tipo lugar:<br>
    <input type="text" name="place_kind"><br>
    logotipo:<br>
    <input type="text" name="logotype"><br>
    direccion:<br>
    <input type="text" name="direction"><br>
    telefono:<br>
    <input type="text" name="tel"><br>
    nombre lugar:<br>
    <input type="text" name="name_place"><br>
    informacion opcional:<br>
    <input type="text" name="information"><br>

    <input type="submit" value="Submit">
</form>
</body>
</html>