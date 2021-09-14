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

<body>
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
                <section class="panel">
                    <header class="panel-heading">
                        <i class="fa fa-2x fa-users"></i>  Usuarios
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>

                        <p style="font-weight: 200; text-transform: none; margin-top: 20px;">  Lista de usuarios registrados, aquí podrás ver los datos personales y llevar el control de los mismos.  </p>

                    </header>
                    <div class="panel-body">
                        <section id="no-more-tables">
                        <div class="adv-table editable-table ">
                            <div class="clearfix">

                                    <div class="btn-group">
                                        <a href="../forms/expenditure.php?id=<?php echo $_GET['id']?>" class="tooltipcolone"><button  id="editable-sample_new" class="btn btn-primary tooltipcolone">
                                                <span class="tooltipcolone-content">Nuevo ingreso </span>

                                                Egreso <i class="fa fa-plus"></i>
                                            </button></a>

                                    </div>


                                <div class="btn-group pull-right">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">Herramientas <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="#">Imprimir</a></li>
                                        <li><a href="#">Guardar como PDF</a></li>
                                        <li><a href="#">Exportar a Excel</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="space15"></div>
                            <table class="table table-bordered table-striped table-condensed cf" id="editable-sample">
                                <thead class="cf">
                                <tr>
                                    <th>Cantidad</th>
                                    <th>Concepto</th>
                                    <th>Fecha</th>
                                    <th>Eliminar</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                    $consulta = "SELECT * FROM expenditure WHERE id_finance LIKE '".$_GET['id']."' AND active LIKE 1";
                                    $resultado = $mysqli->query($consulta);

                                    while ($row1=mysqli_fetch_row($resultado))
                                    {

                                    $concept = $row1[2];
                                    $total_expenditure = $row1[3];
                                    $created_at = $row1[4];


                                    ?>

                                    <td class="center" style="color: #ff2444;"><?php echo '$'.number_format($total_expenditure,2);?></td>
                                    <td class="center"><?php echo $concept; ?></td>
                                    <td class="center"><?php echo $created_at; ?></td>
                                    <td><a class="delete""><button onclick="validateRemoveExpenditure(<?php echo $row1[0]; ?>)"   type="button" class="btn btn-danger"><i class="fa fa-ban"></i></button></a></td>
                                    </tr>

                                    <?php


                                }
                                ?>

                                </tbody>
                            </table>
                        </div>
                        </section>
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