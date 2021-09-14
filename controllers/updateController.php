<?php
/**
 * Created by PhpStorm.
 * User: Daniel
 * Date: 21/05/2017
 * Time: 06:04 PM
 */

date_default_timezone_set('America/Mexico_City');

SESSION_START();

include '../libs/conexion.php';

/////// Creacion de Cliente (lugar y usuario administrador)


if($_GET['a'] == 'updateAdmin'){

    ///   username password name ap am email set_kind logotype direction tel name_set information

    // Recibo los datos de la logotype

    if($_FILES['logotype']['name'] != NULL){

        $nombre_img = date('Y-m-d').'_'.$_FILES['logotype']['name'];
        $tipo = $_FILES['logotype']['type'];
        $tamano = $_FILES['logotype']['size'];


//Si existe logotype y tiene un tamaño correcto

        //indicamos los formatos que permitimos subir a nuestro servidor
        if (($_FILES["logotype"]["type"] == "image/jpeg")
            || ($_FILES["logotype"]["type"] == "image/jpg")
            || ($_FILES["logotype"]["type"] == "image/png"))
        {
            // Ruta donde se guardar�n las im�genes que subamos
            $directorio = '../assets/images/places/';
            // Muevo la logotype desde el directorio temporal a nuestra ruta indicada anteriormente
            move_uploaded_file($_FILES['logotype']['tmp_name'],$directorio.$nombre_img);
        }else{
            //si no cumple con el formato
            echo "No se puede subir una logotype con ese formato ";
        }



    }else{

    }

        $b=$_POST['password'];
        $patron='Zn5G7hnkL0bhgf1';
        $b=$patron.md5($b);

        $sql = 'UPDATE user_data SET name="'.$_POST['name'].'", ap="'.$_POST['ap'].'", am="'.$_POST['am'].'", email="'.$_POST['email'].'", tel="'.$_POST['tel'].'", updated_at="'.date('Y-m-d h:i:s').'", updated_by="'.$_SESSION['id'].'" WHERE id_user ="'.$_SESSION['id'].'"';

        if (mysqli_query($mysqli, $sql)) {

            $sql = 'UPDATE user SET username="'.$_POST['email'].'", password="'.$b.'", updated_at="'.date('Y-m-d h:i:s').'", updated_by="'.$_SESSION['id'].'" WHERE id_user ="'.$_SESSION['id'].'"';

            if (mysqli_query($mysqli, $sql)) {

                if($nombre_img != NULL){

                    $sql = 'UPDATE place SET logotype="'.$nombre_img.'", updated_at="'.date('Y-m-d h:i:s').'", updated_by="'.$_SESSION['id'].'" WHERE id_place ="'.$_SESSION['id_place'].'"';

                    if (mysqli_query($mysqli, $sql)) {

                        mysqli_close($mysqli);

                        header('Location: ../inicio.php?e=update');

                    } else {
                        echo "Error updating record: " . mysqli_error($mysqli);
                    }

                }else{

                    mysqli_close($mysqli);

                    header('Location: ../inicio.php?e=update');

                }

            } else {
                echo "Error updating record: " . mysqli_error($mysqli);
            }

        } else {
            echo "Error updating record: " . mysqli_error($mysqli);
        }


}


///////// update de espacio

if($_GET['a'] == 'updateSpace'){

//Si existe logotype y tiene un tama�o correcto
    if (($_FILES['image']['name'] != '')){

        // Recibo los datos de la logotype
        $nombre_img = $_SESSION['id_place'].'_'.$_FILES['image']['name'];
        $tipo = $_FILES['image']['type'];
        $tamano = $_FILES['image']['size'];

        //indicamos los formatos que permitimos subir a nuestro servidor
        if (($_FILES["image"]["type"] == "image/jpeg")
            || ($_FILES["image"]["type"] == "image/jpg")
            || ($_FILES["image"]["type"] == "image/png"))
        {
            // Ruta donde se guardar�n las im�genes que subamos
            $directorio = '../assets/images/spaces/';
            // Muevo la logotype desde el directorio temporal a nuestra ruta indicada anteriormente
            move_uploaded_file($_FILES['image']['tmp_name'],$directorio.$nombre_img);

            $sql = 'UPDATE space SET name="'.$_POST['name_space'].'", description="'.$_POST['description'].'", image="'.$nombre_img.'", start_hour="'.$_POST['start_hour'].'", end_hour="'.$_POST['end_hour'].'", updated_at="'.date('Y-m-d h:i:s').'", updated_by="'.$_SESSION['id'].'" WHERE id_space ="'.$_GET['id'].'"';

        }else{
            //si no cumple con el formato
            echo "No se puede subir una logotype con ese formato ";
        }
    }else{

        $sql = 'UPDATE space SET name="'.$_POST['name_space'].'", description="'.$_POST['description'].'", start_hour="'.$_POST['start_hour'].'", end_hour="'.$_POST['end_hour'].'", updated_at="'.date('Y-m-d h:i:s').'", updated_by="'.$_SESSION['id'].'" WHERE id_space ="'.$_GET['id'].'"';

        //si existe la variable pero se pasa del tama�o permitido
        if($nombre_img == NULL){
            echo "no se subio logotype";
        }
    }

    if (mysqli_query($mysqli, $sql)) {

        mysqli_close($mysqli);

        header('Location: ../views/space.php?e=update');
    } else {
        echo "Error updating record: " . mysqli_error($mysqli);
    }


}

/// update de vigilante

if($_GET['a'] == 'updateVigilant'){

//Si existe logotype y tiene un tama�o correcto
    if (($_FILES['image']['name'] != '')){

        // Recibo los datos de la logotype
        $nombre_img = $_SESSION['id_place'].'_'.$_FILES['image']['name'];
        $tipo = $_FILES['image']['type'];
        $tamano = $_FILES['image']['size'];

        //indicamos los formatos que permitimos subir a nuestro servidor
        if (($_FILES["image"]["type"] == "image/jpeg")
            || ($_FILES["image"]["type"] == "image/jpg")
            || ($_FILES["image"]["type"] == "image/png"))
        {
            // Ruta donde se guardar�n las im�genes que subamos
            $directorio = '../assets/images/vigilants/';
            // Muevo la logotype desde el directorio temporal a nuestra ruta indicada anteriormente
            move_uploaded_file($_FILES['image']['tmp_name'],$directorio.$nombre_img);

            $sql = 'UPDATE vigilant SET name="'.$_POST['name'].'", photo="'.$nombre_img.'", updated_at="'.date('Y-m-d h:i:s').'", updated_by="'.$_SESSION['id'].'" WHERE id_vigilant ="'.$_GET['id'].'"';

        }else{
            //si no cumple con el formato
            echo "No se puede subir una logotype con ese formato ";
        }
    }else{

        $sql = 'UPDATE vigilant SET name="'.$_POST['name'].'", updated_at="'.date('Y-m-d h:i:s').'", updated_by="'.$_SESSION['id'].'" WHERE id_vigilant ="'.$_GET['id'].'"';

        //si existe la variable pero se pasa del tama�o permitido
        if($nombre_img == NULL){
            echo "no se subio logotype";
        }
    }

    if (mysqli_query($mysqli, $sql)) {

        mysqli_close($mysqli);

        header('Location: ../views/vigilant.php?e=update');
    } else {
        echo "Error updating record: " . mysqli_error($mysqli);
    }


}


if($_GET['a'] == 'payCharge'){

    $sql = 'UPDATE charge SET status = 1, updated_at="'.date('Y-m-d h:i:s').'", updated_by="'.$_SESSION['id'].'" WHERE id_charge ="'.$_GET['id'].'"';

    if (mysqli_query($mysqli, $sql)) {

        mysqli_close($mysqli);

    header('Location: ../views/estados.php');

    } else {
        echo "Error updating record: " . mysqli_error($mysqli);
    }

}







