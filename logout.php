<?php
/**
 * Created by PhpStorm.
 * User: Daniel
 * Date: 24/05/2017
 * Time: 02:15 AM
 */


SESSION_START();

SESSION_UNSET();

SESSION_DESTROY();

header('Location: index.php?e=logout');
?>