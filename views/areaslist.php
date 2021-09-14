<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="../images/favicon.png">

    <title>Áreas Compartidas: Historial</title>

    <!--Core CSS -->
    <link href="../assets/bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/bootstrap-reset.css" rel="stylesheet">
    <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <link rel="stylesheet" href="../assets/js/data-tables/DT_bootstrap.css" />

    <!-- Custom styles for this template -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/style-responsive.css" rel="stylesheet" />

    <!--responsive table-->
    <link href="../assets/css/table-responsive.css" rel="stylesheet" />

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
                        Historial de reservaciones de areas compartidas

                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>

                        <p style="font-weight: 200; text-transform: none; margin-top: 20px;"> Historial de áreas que han sido reservadas</p>

                    </header>
                    <div class="panel-body">
                        <section id="no-more-tables">
                        <div class="adv-table editable-table ">
                            <div class="clearfix">

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
                                    <th>Usuario</th>
                                    <th>Área</th>
                                    <th>Año</th>
                                    <th>Mes</th>
                                    <th>Día</th>
                                    <th>Hora Inicio</th>
                                    <th>Hora Final</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="">
                                    <td class="center">Carlos González Armendáriz</td>
                                    <td class="center">Sala de Juntas</td>
                                    <td class="center">2017</td>
                                    <td class="center">Mayo</td>
                                    <td class="center">17</td>
                                    <td class="center">3:30 PM</td>
                                    <td class="center">4:00 PM</td>
                                    <td><a class="delete""><a href=""><button type="button" class="btn btn-danger"><i class="fa fa-ban"></i> </button></a></td>
                                </tr>

                                <tr class="">
                                    <td class="center">Ramón Ayala Gutierrez</td>
                                    <td class="center">Sala de Juntas</td>
                                    <td class="center">2017</td>
                                    <td class="center">Mayo</td>
                                    <td class="center">21</td>
                                    <td class="center">1:30 PM</td>
                                    <td class="center">2:15 PM</td>
                                    <td><a class="delete""><a href=""><button type="button" class="btn btn-danger"><i class="fa fa-ban"></i> </button></a></td>
                                </tr>

                                <tr class="">
                                    <td class="center">Carlos González Armendáriz</td>
                                    <td class="center">Sala Audiovisual</td>
                                    <td class="center">2017</td>
                                    <td class="center">Abril</td>
                                    <td class="center">21</td>
                                    <td class="center">4:30 PM</td>
                                    <td class="center">5:30 PM</td>
                                    <td><a class="delete""><a href=""><button type="button" class="btn btn-danger"><i class="fa fa-ban"></i> </button></a></td>
                                </tr>





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
