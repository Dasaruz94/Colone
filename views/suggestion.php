<?php
/**
 * Created by PhpStorm.
 * User: Daniel
 * Date: 28/05/2017
 * Time: 02:09 AM
 */

SESSION_START();
if(isset($_SESSION['email'])) {

    if($_SESSION['tipo_usuario']== 1){

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Coloné">
    <link rel="shortcut icon" href="../images/favicon.png">

    <title>Sugerencias | Administrador por zona</title>

    <!--Core CSS -->
    <link href="../assets/bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/bootstrap-reset.css" rel="stylesheet">
    <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <link rel="stylesheet" href="../assets/js/data-tables/DT_bootstrap.css" />

    <link href="../assets/js/mini-upload-form/assets/css/bucketmin.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../assets/css/flaticon.css">
    <!-- Custom styles for this template -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/style-responsive.css" rel="stylesheet" />
    <link href="../assets/css/sweetalert2.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]>
    <script src="../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<section id="container" >


    <?php
    include 'menu.php';
    ?>


    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <!-- page start-->

                        <header class="panel-heading">
                          <i class="fa fa-2x flaticon-chat"></i>   Sugerencias
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>

                            <p style="font-weight: 200; text-transform: none; margin-top: 20px;"> Depósito de sugerencias de los usuarios de tú zona.  </p>
                        </header>
            <?php

            $conNot = "SELECT * FROM suggestion WHERE id_place LIKE '".$_SESSION['id_place']."' AND active LIKE 1 ORDER BY id_suggestion desc";
            $resNot = $mysqli->query($conNot);

            while ($row1=mysqli_fetch_row($resNot))
            {
            ?>
                            <!--Content-->
                            <div class="row">

                            <div class="col-xs-11"  style="margin: 10px 50px 2px 50px; padding: 15px; display: block; background: #f4f4f4;">


                                <button onclick="validateRemoveSuggestion(<?php echo $row1[0]; ?>)" type="button" class="btn" style="border-radius: 50px; font-size: 25px; color: #ffffff; background: transparent ; margin-left: 4px; margin-right: 4px; position: absolute; top: 5px ; left: 90%;"><i class="fa fa-times-circle"></i> </button>



                                <div  style="background: #0086ff; padding: 0px; margin: 0;"> <a href="#" style=" color: white;"><i class="flaticon-users-1" style="color: white;"> </i>   <?php echo $row1[3]; ?> </a>
                                </div>


                            <tbody style="margin: 15px; padding: 15px;">

                            <br/>
                                <td ><a href="#"><i style="color: #0086ff;"  class="flaticon-mail"> </i>   <?php echo $row1[4]; ?></a></td>
                                <br/>
                                <td class="view-message  text-right" style="color: "><i style="color: #0086ff;" class="flaticon-calendar"></i><?php echo $row1[5]; ?></td>
                            </tbody>


                        </div>
                            </div>

            <?php
            }
            ?>
            <!-- page end-->
        </section>
    </section>
    <!--main content end-->


<!--right sidebar start-->



    <?php
    include 'sidebar.php';
    ?>


<!--right sidebar end-->

</section>

<!-- Placed js at the end of the document so the pages load faster -->

<!--Core js-->
<script src="../assets/js/jquery-1.8.3.min.js"></script>
<script src="../assets/bs3/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="../assets/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="../assets/js/jquery.scrollTo.min.js"></script>
<script src="../assets/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js"></script>
<script src="../assets/js/jquery.nicescroll.js"></script>
<!--Easy Pie Chart-->
<script src="../assets/js/easypiechart/jquery.easypiechart.js"></script>
<!--Sparkline Chart-->
<script src="../assets/js/sparkline/jquery.sparkline.js"></script>
<!--jQuery Flot Chart-->
<script src="../assets/js/flot-chart/jquery.flot.js"></script>
<script src="../assets/js/flot-chart/jquery.flot.tooltip.min.js"></script>
<script src="../assets/js/flot-chart/jquery.flot.resize.js"></script>
<script src="../assets/js/flot-chart/jquery.flot.pie.resize.js"></script>


<script type="text/javascript" src="../assets/js/data-tables/jquery.dataTables.js"></script>
<script type="text/javascript" src="../assets/js/data-tables/DT_bootstrap.js"></script>

<!--common script init for all pages-->
<script src="../assets/js/scripts.js"></script>
<script src="../assets/js/alerts.js"></script>
<script src="../assets/js/sweetalert2.js"></script>
<!--script for this page only-->
<script src="../assets/js/table-editable.js"></script>

<!-- END JAVASCRIPTS -->
<script>
    jQuery(document).ready(function() {
        EditableTable.init();
    });
</script>



</body>
</html>
<?php
}else{

    SESSION_UNSET();

    SESSION_DESTROY();
    header('Location: ../index.php?e=error1');

}
}else{

    header('Location: ../../sesiondestroy.html');
    echo 'El usuario no es correcto';
}
?>