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


if($_GET['a'] == 'createClient'){

    ///   username password name ap am email set_kind logotype direction tel name_set information

    // Recibo los datos de la logotype
    $nombre_img = date('Y-m-d').'_'.$_FILES['logotype']['name'];
    $tipo = $_FILES['logotype']['type'];
    $tamano = $_FILES['logotype']['size'];

//Si existe logotype y tiene un tama�o correcto
    if (($nombre_img == !NULL)){
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
        //si existe la variable pero se pasa del tama�o permitido
        if($nombre_img == NULL){
            echo "no se subio logotype";
        }
    }

    $b=$_POST['password'];
    $patron='Zn5G7hnkL0bhgf1';
    $b=$patron.md5($b);

    /// se registra el lugar

    $sql = "INSERT INTO place (name,logotype,place_kind,address,information,code,start_date,created_at,created_by,updated_at,updated_by,active) VALUES ('".$_POST['name_place']."', '".$nombre_img."', '".$_POST['place_kind']."', '".$_POST['address']."', '".$_POST['information']."', 'null', '".date('Y-m-d h:i:s')."', '".date('Y-m-d h:i:s')."', '0', '".date('Y-m-d h:i:s')."', '0', '1')";

    if (mysqli_query($mysqli, $sql)) {


        ////se obtiene el ultimo lugar registrado y se saca su id para crear el codigo correspondiente

        $consulta = "SELECT * FROM place ORDER BY id_place DESC LIMIT 1";
        $resultado = $mysqli->query($consulta);

        while ($row=mysqli_fetch_row($resultado))
        {

            $id_place = $row[0];

        }

        $nameplaceExplode = str_split($_POST['name_place']);

        $code = $nameplaceExplode[0].$nameplaceExplode[1].$id_place;

        $sql = 'UPDATE place SET code="'.$code.'" WHERE id_place ="'.$id_place.'"';

        if (mysqli_query($mysqli, $sql)) {

            ////registro de tabla usuarios


            $sql = "INSERT INTO user (id_place,username,password,user_type,created_at,created_by,updated_at,updated_by,active) VALUES ('".$id_place."', '".$_POST['email']."', '".$b."', '1', '".date('Y-m-d h:i:s')."', '0', '".date('Y-m-d h:i:s')."', '0', '1')";

            if (mysqli_query($mysqli, $sql)) {

                /////si el registro se completa con exito se consulta el usuario registrado para llenar los datos de usuario

                $consulta = "SELECT * FROM user WHERE username LIKE '".$_POST['email']."' AND password LIKE '".$b."' AND active LIKE 1 ";
                $resultado = $mysqli->query($consulta);

                while ($row=mysqli_fetch_row($resultado))
                {

                    $id_user = $row[0];

                }

                $sql = "INSERT INTO user_data (id_user,name,ap,am,num_place,tel,email,created_at,created_by,updated_at,updated_by,active) VALUES ('".$id_user."', '".$_POST['name']."', '".$_POST['ap']."', '".$_POST['am']."', '0', '".$_POST['tel']."', '".$_POST['email']."', '".date('Y-m-d h:i:s')."', '0', '".date('Y-m-d h:i:s')."', '0', '1')";

                if (mysqli_query($mysqli, $sql)) {

                    header('Location: ../../success.html');

                } else {
                    echo "Error add record: " . mysqli_error($mysqli);
                }


            } else {
                echo "Error add record: " . mysqli_error($mysqli);
            }

        } else {
            echo "Error updating record: " . mysqli_error($mysqli);
        }

    } else {
        echo "Error add record: " . mysqli_error($mysqli);
    }


}


///////// Creación de colono

if($_GET['a'] == 'createColono'){

    ///   username password name ap am email set_kind logotype direction tel name_set information

    $b=$_POST['password'];
    $patron='Zn5G7hnkL0bhgf1';
    $b=$patron.md5($b);


    ////se obtiene el ultimo lugar registrado y se saca su id para crear el codigo correspondiente

    $consulta = "SELECT * FROM place WHERE code LIKE '".$_POST['code']."'";
    $resultado = $mysqli->query($consulta);

    while ($row=mysqli_fetch_row($resultado))
    {

        $id_place = $row[0];

    }

    ////registro de tabla usuarios


    $sql = "INSERT INTO user (id_place,username,password,user_type,created_at,created_by,updated_at,updated_by,active) VALUES ('".$id_place."', '".$_POST['email']."', '".$b."', '2', '".date('Y-m-d h:i:s')."', '0', '".date('Y-m-d h:i:s')."', '0', '1')";

    if (mysqli_query($mysqli, $sql)) {

        /////si el registro se completa con exito se consulta el usuario registrado para llenar los datos de usuario

        $consulta = "SELECT * FROM user WHERE username LIKE '".$_POST['email']."' AND password LIKE '".$b."' AND active LIKE 1 ";
        $resultado = $mysqli->query($consulta);

        while ($row=mysqli_fetch_row($resultado))
        {

            $id_user = $row[0];

        }

        $sql = "INSERT INTO user_data (id_user,name,ap,am,num_place,tel,email,created_at,created_by,updated_at,updated_by,active) VALUES ('".$id_user."', '".$_POST['name']."', '".$_POST['ap']."', '".$_POST['am']."', '".$_POST['num_place']."', '".$_POST['tel']."', '".$_POST['email']."', '".date('Y-m-d h:i:s')."', '0', '".date('Y-m-d h:i:s')."', '0', '1')";

        if (mysqli_query($mysqli, $sql)) {

            header('Location: ../../success-users.html');

        } else {
            echo "Error add record: " . mysqli_error($mysqli);
        }


    } else {
        echo "Error add record: " . mysqli_error($mysqli);
    }

}

//// CREACION DE COLONOS DESDE SISTEMA
if($_GET['a'] == 'createColonoAdm'){

    ///   username password name ap am email set_kind logotype direction tel name_set information

    $b=$_POST['password'];
    $patron='Zn5G7hnkL0bhgf1';
    $b=$patron.md5($b);


    ////se obtiene el ultimo lugar registrado y se saca su id para crear el codigo correspondiente

    ////registro de tabla usuarios


    $sql = "INSERT INTO user (id_place,username,password,user_type,created_at,created_by,updated_at,updated_by,active) VALUES ('".$_SESSION['id_place']."', '".$_POST['email']."', '".$b."', '2', '".date('Y-m-d h:i:s')."', '0', '".date('Y-m-d h:i:s')."', '0', '1')";

    if (mysqli_query($mysqli, $sql)) {

        /////si el registro se completa con exito se consulta el usuario registrado para llenar los datos de usuario

        $consulta = "SELECT * FROM user WHERE username LIKE '".$_POST['email']."' AND password LIKE '".$b."' AND active LIKE 1 ";
        $resultado = $mysqli->query($consulta);

        while ($row=mysqli_fetch_row($resultado))
        {

            $id_user = $row[0];

        }

        $sql = "INSERT INTO user_data (id_user,name,ap,am,num_place,tel,email,created_at,created_by,updated_at,updated_by,active) VALUES ('".$id_user."', '".$_POST['name']."', '".$_POST['ap']."', '".$_POST['am']."', '".$_POST['num_place']."', '".$_POST['tel']."', '".$_POST['email']."', '".date('Y-m-d h:i:s')."', '0', '".date('Y-m-d h:i:s')."', '0', '1')";

        if (mysqli_query($mysqli, $sql)) {

            header('Location: ../views/users.php');

        } else {
            echo "Error add record: " . mysqli_error($mysqli);
        }


    } else {
        echo "Error add record: " . mysqli_error($mysqli);
    }

}


/// creacion de espacio
if($_GET['a'] == 'createSpace'){

    // Recibo los datos de la logotype
    $nombre_img = $SESSION['id_place'].''.$_FILES['image']['name'];
    $tipo = $_FILES['image']['type'];
    $tamano = $_FILES['image']['size'];

//Si existe logotype y tiene un tama�o correcto
    if (($nombre_img == !NULL)){
        //indicamos los formatos que permitimos subir a nuestro servidor
        if (($_FILES["image"]["type"] == "image/jpeg")
            || ($_FILES["image"]["type"] == "image/jpg")
            || ($_FILES["image"]["type"] == "image/png"))
        {
            // Ruta donde se guardar�n las im�genes que subamos
            $directorio = '../assets/images/spaces/';
            // Muevo la logotype desde el directorio temporal a nuestra ruta indicada anteriormente
            move_uploaded_file($_FILES['image']['tmp_name'],$directorio.$nombre_img);
        }else{
            //si no cumple con el formato
            echo "No se puede subir una logotype con ese formato ";
        }
    }else{
        //si existe la variable pero se pasa del tama�o permitido
        if($nombre_img == NULL){
            echo "no se subio logotype";
        }
    }


    $sql = "INSERT INTO space (id_place,name,description,image,start_hour,end_hour,created_at,created_by,updated_at,updated_by,active) VALUES ('".$_SESSION['id_place']."','".$_POST['name_space']."', '".$_POST['description']."', '".$nombre_img."', '".$_POST['start_hour']."', '".$_POST['end_hour']."',
    '".date('Y-m-d h:i:s')."', '".$_SESSION['id']."', '".date('Y-m-d h:i:s')."', '".$_SESSION['id']."', '1')";

    if (mysqli_query($mysqli, $sql)) {

        mysqli_close($mysqli);
        header('Location: ../views/space.php');

    } else {
        echo "Error add record: " . mysqli_error($mysqli);
    }


}




/// creacion de vigilante
if($_GET['a'] == 'createVigilant'){

    // Recibo los datos de la logotype
    $nombre_img = $SESSION['id_place'].''.$_FILES['image']['name'];
    $tipo = $_FILES['image']['type'];
    $tamano = $_FILES['image']['size'];

//Si existe logotype y tiene un tama�o correcto
    if (($nombre_img == !NULL)){
        //indicamos los formatos que permitimos subir a nuestro servidor
        if (($_FILES["image"]["type"] == "image/jpeg")
            || ($_FILES["image"]["type"] == "image/jpg")
            || ($_FILES["image"]["type"] == "image/png"))
        {
            // Ruta donde se guardar�n las im�genes que subamos
            $directorio = '../assets/images/vigilants/';
            // Muevo la logotype desde el directorio temporal a nuestra ruta indicada anteriormente
            move_uploaded_file($_FILES['image']['tmp_name'],$directorio.$nombre_img);
        }else{
            //si no cumple con el formato
            echo "No se puede subir una logotype con ese formato ";
        }
    }else{
        //si existe la variable pero se pasa del tama�o permitido
        if($nombre_img == NULL){
            echo "no se subio logotype";
        }
    }

    $c=$_POST['password'];
    $patron='Zn5G7hnkL0bhgf1';
    $c=$patron.md5($c);


    $sql1 = "INSERT INTO vigilant (id_place,name,photo,status,uservigilant, password, created_at,created_by,updated_at,updated_by,active)
    VALUES ('".$_SESSION['id_place']."','".$_POST['name']."', '".$nombre_img."', '0', '".$_POST['uservigilant']."', '".$c."', '".date('Y-m-d h:i:s')."',
    '".$_SESSION['id']."', '".date('Y-m-d h:i:s')."', '".$_SESSION['id']."', '1')";

    if (mysqli_query($mysqli, $sql1)) {

        mysqli_close($mysqli);
        header('Location: ../views/vigilant.php');


    } else {
        echo "Error add record: " . mysqli_error($mysqli);
    }


}


/// creacion de documento
if($_GET['a'] == 'createDocument'){


    // echo $_FILES['image']['name'];



//Si existe logotype y tiene un tama�o correcto
    if (($_FILES['document'] != '')){

        // Recibo los datos de la logotype


            $document = $_FILES['document'];

            $nombre_doc = $_SESSION['id_place'].'_'.$document["name"];
            $tipo = $document['type'];
            $tamano = $document['size'];

            //indicamos los formatos que permitimos subir a nuestro servidor

            // Ruta donde se guardar�n las im�genes que subamos
            $directorio = '../assets/documentos/';
            // Muevo la logotype desde el directorio temporal a nuestra ruta indicada anteriormente
            move_uploaded_file($document['tmp_name'],$directorio.$nombre_doc);

            $sql = "INSERT INTO document (id_place,document,created_at,created_by,updated_at,updated_by,active) VALUES
                ('".$_SESSION['id_place']."', '".$nombre_doc."', '".date('Y-m-d h:i:s')."', '".$_SESSION['id']."', '".
                date('Y-m-d h:i:s')."', '".$_SESSION['id']."', '1')";

            if (mysqli_query($mysqli, $sql)) {

                mysqli_close($mysqli);

                header('Location: ../views/files.php');

            } else {
                echo "Error add record: " . mysqli_error($mysqli);
            }



    }else{
        //si existe la variable pero se pasa del tama�o permitido
        if($nombre_doc == NULL){
            echo "No se puede subir este documento, excede el tamaño.";
        }
    }
}





if($_GET['a'] == 'createDirectory'){



    ////se obtiene el ultimo lugar registrado y se saca su id para crear el codigo correspondiente


    ////registro de tabla usuarios

   $sql = "INSERT INTO directory (id_place,title,address,phone,email,website,created_at,created_by,updated_at,updated_by,active) VALUES ('".$_SESSION['id_place']."', '".$_POST['title']."','".$_POST['address']."','".$_POST['phone']."','".$_POST['email']."','".$_POST['website']."','".date('Y-m-d h:i:s')."', '0', '".date('Y-m-d h:i:s')."', '0', '1')";

        if (mysqli_query($mysqli, $sql)) {

            header('Location: ../views/directory.php');

        } else {
            echo "Error add record: " . mysqli_error($mysqli);
        }


    } else {
        echo "Error add record: " . mysqli_error($mysqli);


}




if($_GET['a'] == 'createReserve'){


    $sql = "INSERT INTO reserve (id_place,id_space,id_user,reserve_date,subject,start_hour,end_hour,created_at,created_by,updated_at,updated_by,active) VALUES ('".$_SESSION['id_place']."','".$_POST['space']."', '".$_SESSION['id']."','".$_POST['date']."','".$_POST['subject_reserve']."','".$_POST['time_start']."','".$_POST['time_end']."','".date('Y-m-d h:i:s')."','".$_SESSION['id']."', '".date('Y-m-d h:i:s')."','".$_SESSION['id']."', '1')";

    if (mysqli_query($mysqli, $sql)) {

        header('Location: ../views/reserve.php');

    } else {
        echo "Error add record: " . mysqli_error($mysqli);
    }


} else {
    echo "Error add record: " . mysqli_error($mysqli);


}









/// creacion de vigilante
if($_GET['a'] == 'createNotice'){


    // echo $_FILES['image']['name'];

   // $sql = "INSERT INTO notice (id_place,title,notice,file,created_at,created_by,updated_at,updated_by,active) VALUES ('".$_SESSION['id_place']."', '".$_POST['title']."','".$_POST['notice']."','".$nombre_doc."','".date('Y-m-d h:i:s')."', '0', '".date('Y-m-d h:i:s')."', '0', '1')";


//Si existe logotype y tiene un tama�o correcto
    if (($_FILES['document'] != '')){

        // Recibo los datos de la logotype


        $document = $_FILES['document'];

        $nombre_doc = $_SESSION['id_place'].'_'.$document["name"];
        $tipo = $document['type'];
        $tamano = $document['size'];

        //indicamos los formatos que permitimos subir a nuestro servidor

        // Ruta donde se guardar�n las im�genes que subamos
        $directorio = '../assets/documentos/notice/';
        // Muevo la logotype desde el directorio temporal a nuestra ruta indicada anteriormente
        move_uploaded_file($document['tmp_name'],$directorio.$nombre_doc);

        $sql = "INSERT INTO notice (id_place,title,notice,file,created_at,created_by,updated_at,updated_by,active) VALUES ('".$_SESSION['id_place']."', '".$_POST['title']."','".$_POST['notice']."','".$nombre_doc."','".date('Y-m-d h:i:s')."', '0', '".date('Y-m-d h:i:s')."', '0', '1')";


        if (mysqli_query($mysqli, $sql)) {

            mysqli_close($mysqli);

            header('Location: ../views/notice.php');

        } else {
            echo "Error add record: " . mysqli_error($mysqli);
        }



    }else{
        //si existe la variable pero se pasa del tama�o permitido
        if($nombre_doc == NULL){
            echo "No se puede subir este documento, excede el tamaño.";
        }
    }
}




/// creacion de Ingreso
if($_GET['a'] == 'createEntry'){


    $sql = "INSERT INTO entry (id_finance,concept,total_entry, created_at,created_by,updated_at,updated_by,active) VALUES ('".$_GET['id']."', '".$_POST['concept']."','".$_POST['total_entry']."','".date('Y-m-d h:i:s')."', '0', '".date('Y-m-d h:i:s')."', '0', '1')";


        if (mysqli_query($mysqli, $sql)) {



            $sql2 = 'UPDATE finance SET total_money = total_money + ('.$_POST['total_entry'].') WHERE id_finance ="'.$_GET['id'].'"';


            if (mysqli_query($mysqli, $sql2)) {



                mysqli_close($mysqli);

                header('Location: ../views/entry.php?id='.$_GET['id'].'');

            } else {
                echo "Error add record: " . mysqli_error($mysqli);
            }

        } else {
            echo "Error add record: " . mysqli_error($mysqli);
        }

    }



/// creacion de Egreso
if($_GET['a'] == 'createExpenditure'){


    $sql = "INSERT INTO expenditure (id_finance,concept,total_expenditure, created_at,created_by,updated_at,updated_by,active) VALUES ('".$_GET['id']."', '".$_POST['concept']."','".$_POST['total_expenditure']."','".date('Y-m-d h:i:s')."', '0', '".date('Y-m-d h:i:s')."', '0', '1')";


    if (mysqli_query($mysqli, $sql)) {



        $sql2 = 'UPDATE finance SET total_money = total_money - ('.$_POST['total_expenditure'].') WHERE id_finance ="'.$_GET['id'].'"';


        if (mysqli_query($mysqli, $sql2)) {



            mysqli_close($mysqli);

            header('Location: ../views/expenditure.php?id='.$_GET['id'].'');

        } else {
            echo "Error add record: " . mysqli_error($mysqli);
        }

    } else {
        echo "Error add record: " . mysqli_error($mysqli);
    }

}



if($_GET['a'] == 'createChargeOne'){



    ////se obtiene el ultimo lugar registrado y se saca su id para crear el codigo correspondiente


    ////registro de tabla usuarios

    $sql = "INSERT INTO charge (id_place,id_user,subject, total, status, limit_date, created_at,created_by,updated_at,updated_by,active) VALUES ('".$_SESSION['id_place']."', '".$_POST['id_user']."','".$_POST['subject']."','".$_POST['total']."','0','".$_POST['limit_date']."','".date('Y-m-d h:i:s')."', '0', '".date('Y-m-d h:i:s')."', '0', '1')";

    if (mysqli_query($mysqli, $sql)) {

        header('Location: ../views/estados.php');

    } else {
        echo "Error add record: " . mysqli_error($mysqli);
    }


} else {
    echo "Error add record: " . mysqli_error($mysqli);


}


if($_GET['a'] == 'createChargeAll'){



    ////se obtiene el ultimo lugar registrado y se saca su id para crear el codigo correspondiente

    $sql = "SELECT id_user FROM user WHERE id_place LIKE '".$_SESSION['id_place']."'";
    $resultado = $mysqli->query($sql);

    WHILE ($row=mysqli_fetch_row($resultado))
    {

    $id_user = $row[0];

    $sql1 = "INSERT INTO charge (id_place,id_user,subject, total, status, limit_date, created_at,created_by,updated_at,updated_by,active) VALUES
     ('".$_SESSION['id_place']."', '".$id_user."','".$_POST['subject']."','".$_POST['total']."','0','".$_POST['limit_date']."',
     '".date('Y-m-d h:i:s')."', '0', '".date('Y-m-d h:i:s')."', '0', '1') ";

    if (mysqli_query($mysqli, $sql1)) {

        header('Location: ../views/estados.php');

    } else {
        echo "Error add record: " . mysqli_error($mysqli);
    }

    }
} else {
    echo "Error add record: " . mysqli_error($mysqli);


}

