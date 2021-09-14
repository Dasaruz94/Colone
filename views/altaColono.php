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



<form action="controllers/createController.php?a=createColono" method="post">

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
    telefono:<br>
    <input type="text" name="tel"><br>
    codigo lugar:<br>
    <input type="text" name="code"><br>
    numero de lugar:<br>
    <input type="text" name="num_place"><br>

    <input type="submit" value="Submit">
</form>
</body>
</html>