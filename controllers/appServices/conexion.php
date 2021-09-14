<?php
/**
 * Created by PhpStorm.
 * User: Daniel
 * Date: 21/05/2017
 * Time: 06:04 PM
 */

$servername = "localhost";
$username = "colone";
$password = "colone1q2w3e4r5t";
$dbname = "colone";

// Create connection
$mysqli = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$mysqli) {
    die("Connection failed: " . mysqli_connect_error());
}



?>