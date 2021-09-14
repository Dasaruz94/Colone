<?php
date_default_timezone_set('America/Mexico_City');
mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');
ob_start();
include '../lib/conexion.php';
if($_GET['a'] == 'registro'){
    $correo = $_POST['correo'];


    $sql = "INSERT INTO usuarios (username,password,codigo,status,update_at,active) values ('".$_POST['correo']."','".$_POST['password']."','".$_POST['codigo']."','1','".date('Y-m-d h:i:s')."','0')";
    if (mysqli_query($mysqli, $sql)) {
        $sql1 = 'SELECT MAX(id_usuarios) FROM usuarios';
        $resultado = $mysqli->query($sql1);
        while ($row=mysqli_fetch_row($resultado))
        {
            $id_usuario = $row[0];

        }
		$nombre = $_POST['nombre'];
		$clave = $nombre.$id_usuario;


        $sql00 = "INSERT INTO cuenta (id_usuarios,dinero_ganado,por_pagar,update_at) values ('".$id_usuario."','0','0','" . date('Y-m-d h:i:s') . "')";

        if (mysqli_query($mysqli, $sql00)) {
            $sql0 = "UPDATE usuarios SET clave = '$clave' WHERE id_usuarios = ".$id_usuario;

        }

		if (mysqli_query($mysqli, $sql0)) {
        $sql2 = "INSERT INTO datos_usuario (id_usuarios,nombre,apellido_pat,apellido_mat,correo,telefono) values ('".$id_usuario."','".$_POST['nombre']. "','".$_POST['apellido_pat']."','".$_POST['apellido_mat']."','".$_POST['correo']."','". $_POST['telefono']."')";
        }
		if (mysqli_query($mysqli, $sql2)) {
            $sql = 'SELECT * FROM marca WHERE id_marca LIKE '.$_POST['marca'];

            $resultado = $mysqli->query($sql);


            while ($row1=mysqli_fetch_row($resultado))
            {

                $marca= $row1[1];


            }

            $sql = 'SELECT * FROM modelo WHERE id_marca LIKE '.$_POST['marca'];

            $resultado = $mysqli->query($sql);


            while ($row2=mysqli_fetch_row($resultado))
            {

                $modelo= $row2[2];


            }
            $sql4 ="INSERT INTO datos_coche (id_usuarios,color,marca,modelo,anio) values ('".$id_usuario."','" . $_POST['color'] . "','" .$marca. "','" .$modelo. "','" . $_POST['anio'] . "')";
            if (mysqli_query($mysqli, $sql4)) {
                $sql5 = "INSERT INTO habitos (id_usuarios, lugares, cp_casa, descripcion, recorrido) values ('".$id_usuario."','".$_POST['lugares']."','".$_POST['cp_casa']."','".$_POST['descripcion']."','".$_POST['recorrido']."')";

            }
			if (mysqli_query($mysqli, $sql5)) {

                $sql6="INSERT INTO documentos (id_usuarios, licencia_conducir, tarjeta_circulacion, comprobante_domicilio) values ('".$id_usuario."', null, null, null)";
            if (mysqli_query($mysqli, $sql6)) {
			
		        $idUser = $id_usuario;

                $para  = $correo;

                
                $título = 'Verificar correo | activación de cuenta | Nom ads';

                
                $mensaje = '
                <html>
                <head>
                  <title>Verificar correo</title>
                </head>
                <body>
                  <p>Verifica tu correo con el siguiente link</p>

                <a href="http://heylemur.com/santiago/controllers/validateUser.php?id='.$id_usuario.'">Validar</a>

                </body>
                </html>
                ';

                // Para enviar un correo HTML, debe establecerse la cabecera Content-type
                $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
                $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

                // Cabeceras adicionales
                $cabeceras .= 'To: ' . "\r\n";
                $cabeceras .= 'From: Verificar <nomads@example.com>' . "\r\n";
                $cabeceras .= 'Cc: ' . "\r\n";
                $cabeceras .= 'Bcc: ' . "\r\n";

                // Enviarlo
                if(mail($para, $título, $mensaje, $cabeceras)){
				
				ob_end_clean();
				header('Location: ../registrado.php');
				}else{
				echo 'error';
				}
               
            }
                    
            }else {
                echo "Error updating record: error en consulta documnetos" . mysqli_error($mysqli);
            }



        }else {
            echo "Error updating record: error en datos usuario" . mysqli_error($mysqli);
        }


    }else {
        echo "Error updating record: error en isercion de usuarios" . mysqli_error($mysqli);
    }
    mysqli_close($mysqli);
}
?>