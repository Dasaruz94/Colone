<?php
/**
 * Created by PhpStorm.
 * User: Daniel
 * Date: 12/09/2017
 * Time: 12:00 PM
 */

date_default_timezone_set('America/Mexico_City');

SESSION_START();

include '../libs/conexion.php';

if($_GET['a'] == 'mensaje'){

    function send_notification ($tokens, $message)
    {

        $url = 'https://fcm.googleapis.com/fcm/send';
        $fields = array(
            'to' => $tokens,
            'priority' => 10,
            'notification' => $message
        );
        $headers = array(
            'Authorization:key = AAAANZghrig:APA91bHPnlkAcM7T0dpxs9FwCEeL7uhKyBNKER-DFxthjE4ACZdWU_nuQv5tHLXMptO54ufOIeTfxPVhn3FoDPNlV--cJ5k4KwsQLR_ZHZYmU5WHHFoheT1FDM3u-dPJ6PN_QZ6cZJ9V',
            'Content-Type: application/json'
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
        curl_close($ch);
        return $result;
    }


    $sql = " Select token From user WHERE id_user LIKE ".$_GET['id'];
    $result = mysqli_query($mysqli,$sql);

    if(mysqli_num_rows($result) > 0 ){
        while ($row = mysqli_fetch_assoc($result)) {
            $tokens = $row["token"];
        }
    }

    $message = array("body" => $_POST['body'], "title" => $_POST['title'], "click_action"=>"FCM_PLUGIN_ACTIVITY","image"=>"icon");
    $message_status = send_notification($tokens, $message);
    //echo $message_status;



    $sql = "insert into notification (id_user,title,notification,created_at,created_by,updated_at,updated_by,active) VALUES ('" . $_GET['id'] . "','" . $_POST['title'] . "','" . $_POST['body'] ."','".date('Y-m-d h:i:s')."', '".$_SESSION['id']."', '".date('Y-m-d h:i:s')."', '".$_SESSION['id']."', '1')";

    if (mysqli_query($mysqli, $sql)) {

        header('Location: ../views/users.php?e=enviado');
    } else {
        echo "Error updating record: " . mysqli_error($mysqli);
    }

    mysqli_close($mysqli);



}