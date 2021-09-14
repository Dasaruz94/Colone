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
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="../images/favicon.png">

    <title>Usuarios</title>

    <!--Core CSS -->
    <link href="../assets/bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/bootstrap-reset.css" rel="stylesheet">
    <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/js/data-tables/DT_bootstrap.css" />
    <!-- Custom styles for this template -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/sweetalert2.css" rel="stylesheet">
    <link href="../assets/css/style-responsive.css" rel="stylesheet" />
    <!--responsive table-->
    <link href="../assets/css/table-responsive.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/style-responsive.css" rel="stylesheet" />

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]>
    <script src="../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

<body  style="background-image: url('../images/lock-screen.jpg'); background-size: cover;">
<section id="container" >

    <?php
    include 'menu.php';
    ?>

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
        <!-- page start-->

        <div class="row">
            <div class="col-sm-12">
                <section class="panel" style="background: transparent;">
                    <header class="panel-heading">
                        <i class="fa fa-2x fa-usd"></i> Caja
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>

                        <p style="font-weight: 200; text-transform: none; margin-top: 20px;">
                            Administra las finanzas de tu zona, <span style="color: #003cff;"><i class="fa fa-plus"></i>ingresos</span>, <span style="color: #ff0034;"> <i class="fa fa-times"></i>egresos</span> y podres ver el
                           total, ingresa la descripción como concepto de cada movimiento monetario, y la fecha en que fue realizada.
                        </p>

                    </header>
                    <div class="panel-body">

    <?php
    $consulta = "SELECT * FROM finance WHERE id_place LIKE '".$_SESSION['id_place']."' AND active LIKE 1";
    $resultado = $mysqli->query($consulta);

    // $total = mysqli_num_rows($resultado); //Contamos la cantidad de filas que nos arrojo el resultado

    while ($row1=mysqli_fetch_row($resultado))
    {
        $id_finance = $row1[0];
        $total_money =  $row1[2];
    }
    ?>

                        <div class="col-lg-4" >
                        <div style=" border: 5px solid rgba(255, 179, 0, 0.9);  margin: 5px; border-radius: 10px;">
                        <div style=" background: rgba(255, 179, 0, 0.9); padding: 20px;">
                            <h1 style="font-size: 15px; color: white;"><i class="fa fa-2x fa-money" style="color: white; padding-right: 10px;"></i> CAJA</h1>
                        </div>
                            <div style="background: rgba(31, 31, 31, 0.74); padding: 40px; border-radius: 0px; color: white;">

                                <span style="font-size: 20px; text-align: center;">Total:</span>
                                <span style="font-size: 23px; text-align: center;"><?php echo '$'.number_format($total_money,2); ?></span>
                             </div>
                            </div>
                        </div>

    <?php


    $entrySql = "SELECT IFNULL(SUM(total_entry), 0) FROM entry WHERE id_finance lIKE '".$id_finance."'";

    $entryResult = $mysqli->query($entrySql);

    // $total = mysqli_num_rows($resultado); //Contamos la cantidad de filas que nos arrojo el resultado

    $total_entry = 0;
    if ($rowTotalEntry=mysqli_fetch_row($entryResult))
    {

        $total_entry =  $rowTotalEntry[0];
    }

    ?>

            <div class="col-lg-4" >
                <div style=" border: 5px solid rgba(0, 143, 206, 0.9);  margin: 5px; border-radius: 10px;">
                    <div style=" background: rgba(0, 143, 206, 0.9); padding: 20px;">

                        <h1 style="font-size: 15px; color: white;"><i class="fa fa-2x fa-money" style="color: white; padding-right: 10px;"></i> INGRESOS</h1>

                    </div>
                    <div style="background: rgba(31, 31, 31, 0.74); padding: 40px; border-radius: 0px; color: white;">

                    <span style="font-size: 20px; text-align: center;">Total:</span>
                    <span style="font-size: 23px; text-align: center;"><?php echo'$'.number_format($total_entry,2); ?></span>
                    </div>
                    <div class="btn-group" style="position: absolute; top: 210px; left: 40px;">
                        <a href="../views/entry.php?id=<?php echo $id_finance; ?> " class="tooltipcolone"><button  id="editable-sample_new" class="btn btn-primary tooltipcolone  hvr-wobble-horizontal"
                                style="background: #008fce; border: none;">
                                <span class="tooltipcolone-content">Más información <br/>sobre ingresos</span>

                                Ver más <i class="fa fa-arrow-right"></i>
                            </button></a>

                    </div>
                </div>
            </div>

     <?php

                        $expenditureSql = "SELECT IFNULL(SUM(total_expenditure), 0) FROM expenditure WHERE id_finance lIKE '".$id_finance."'";

                        $expenditureResult = $mysqli->query($expenditureSql);

                        // $total = mysqli_num_rows($resultado); //Contamos la cantidad de filas que nos arrojo el resultado

                        $total_expenditure = 0;
                        if ($rowTotalExpenditure=mysqli_fetch_row($expenditureResult))
                        {

                            $total_expenditure =  $rowTotalExpenditure[0];
                        }

                        ?>

                        <div class="col-lg-4" >
                            <div style=" border: 5px solid rgba(255, 0, 52, 0.9);  margin: 5px; border-radius: 10px;">
                                <div style=" background: rgba(255, 0, 52, 0.9); padding: 20px;">

                                    <h1 style="font-size: 15px; color: white;"><i class="fa fa-2x fa-money" style="color: white; padding-right: 10px;"></i> EGRESOS</h1>

                                </div>
                                <div style=" background: rgba(31, 31, 31, 0.74); padding: 40px; border-radius: 0px; color: white;">

                                    <span style="font-size: 20px; text-align: center;">Total:</span>
                                    <span style="font-size: 23px; text-align: center;"><?php echo '$'.number_format($total_expenditure,2);  ?></span>
                                </div>
                                <div class="btn-group" style="position: absolute; top: 210px; left: 40px;">
                                    <a href="../views/expenditure.php?id=<?php echo $id_finance; ?> " class="tooltipcolone"><button  id="editable-sample_new" class="btn btn-primary tooltipcolone  hvr-wobble-horizontal"
                                            style="background: #ce4053; border: none;">
                                            <span class="tooltipcolone-content">Más información <br/>sobre egresos</span>

                                            Ver más <i class="fa fa-arrow-right"></i>
                                        </button></a>
                                </div>
                            </div>
                        </div>

                    </div>
                </section>
            </div>
        </div>
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