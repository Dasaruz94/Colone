<?php
/**
 * Created by PhpStorm.
 * User: Daniel
 * Date: 21/05/2017
 * Time: 06:17 PM
 */


date_default_timezone_set('America/Mexico_City');

SESSION_START();

include '../libs/conexion.php';



if($_GET['a'] == 'deleteUser'){

    $sql = 'UPDATE user SET active="0",updated_at="'.date('Y-m-d h:i:s').'", updated_by="'.$_SESSION['id'].'" WHERE id_user ="'.$_GET['id'].'"';

    if (mysqli_query($mysqli, $sql)) {

        mysqli_close($mysqli);

        header('Location: ../views/users.php?e=eliminado');
    } else {
        echo "Error updating record: " . mysqli_error($mysqli);
    }


}


if($_GET['a'] == 'deleteSpace'){

    $sql = 'UPDATE space SET active="0", updated_at="'.date('Y-m-d h:i:s').'", updated_by="'.$_SESSION['id'].'" WHERE id_space ="'.$_GET['id'].'"';

    if (mysqli_query($mysqli, $sql)) {

        mysqli_close($mysqli);

        header('Location: ../views/space.php?e=eliminado');
    } else {
        echo "Error updating record: " . mysqli_error($mysqli);
    }


}

if($_GET['a'] == 'deleteVigilant'){

    $sql = 'UPDATE vigilant SET active="0", updated_at="'.date('Y-m-d h:i:s').'", updated_by="'.$_SESSION['id'].'" WHERE id_vigilant ="'.$_GET['id'].'"';

    if (mysqli_query($mysqli, $sql)) {

        mysqli_close($mysqli);

        header('Location: ../views/vigilant.php?e=eliminado');
    } else {
        echo "Error updating record: " . mysqli_error($mysqli);
    }


}


//Desactivar un documento
if($_GET['a'] == 'deleteDocument'){

    $sql = 'UPDATE document SET active="0", updated_at="'.date('Y-m-d h:i:s').'", updated_by="'.$_SESSION['id'].'" WHERE id_document ="'.$_GET['id'].'"';

    if (mysqli_query($mysqli, $sql)) {

        mysqli_close($mysqli);

        header('Location: ../views/files.php?e=eliminado');
    } else {
        echo "Error updating record: " . mysqli_error($mysqli);
    }


}



//Desactivar un contacto del directorio
if($_GET['a'] == 'deleteDirectory'){

    $sql = 'UPDATE directory SET active="0", updated_at="'.date('Y-m-d h:i:s').'", updated_by="'.$_SESSION['id'].'" WHERE id_directory ="'.$_GET['id'].'"';

    if (mysqli_query($mysqli, $sql)) {

        mysqli_close($mysqli);

        header('Location: ../views/directory.php?e=eliminado');
    } else {
        echo "Error updating record: " . mysqli_error($mysqli);
    }


}

//Desactivar un aviso
if($_GET['a'] == 'deleteNotice'){

    $sql = 'UPDATE notice SET active="0", updated_at="'.date('Y-m-d h:i:s').'", updated_by="'.$_SESSION['id'].'" WHERE id_notice ="'.$_GET['id'].'"';

    if (mysqli_query($mysqli, $sql)) {

        mysqli_close($mysqli);

        header('Location: ../views/notice.php?e=eliminado');
    } else {
        echo "Error updating record: " . mysqli_error($mysqli);
    }


}


//Eliminar un ingreso
if($_GET['a'] == 'deleteEntry'){


    $sql = 'UPDATE finance SET total_money = total_money - (SELECT total_entry FROM entry WHERE id_entry="'.$_GET['id'].'")
    WHERE id_finance =(SELECT id_finance FROM entry WHERE id_entry="'.$_GET['id'].'")';


    if (mysqli_query($mysqli, $sql)) {



        $sql2 = "DELETE FROM entry WHERE id_entry=('".$_GET['id']."')";



        if (mysqli_query($mysqli, $sql2)) {



            mysqli_close($mysqli);

            header('Location: ../views/entry.php?id='.$_SESSION['id_place'].'');

        } else {
            echo "Error add record: " . mysqli_error($mysqli);
        }

    } else {
        echo "Error add record: " . mysqli_error($mysqli);
    }

}



//Eliminar un egreso
if($_GET['a'] == 'deleteExpenditure'){


    $sql = 'UPDATE finance SET total_money = total_money + (SELECT total_expenditure FROM expenditure WHERE id_expenditure="'.$_GET['id'].'")
    WHERE id_finance =(SELECT id_finance FROM expenditure WHERE id_expenditure="'.$_GET['id'].'")';


    if (mysqli_query($mysqli, $sql)) {



        $sql2 = "DELETE FROM expenditure WHERE id_expenditure=('".$_GET['id']."')";



        if (mysqli_query($mysqli, $sql2)) {



            mysqli_close($mysqli);

            header('Location: ../views/expenditure.php?id='.$_SESSION['id_place'].'');

        } else {
            echo "Error add record: " . mysqli_error($mysqli);
        }

    } else {
        echo "Error add record: " . mysqli_error($mysqli);
    }

}