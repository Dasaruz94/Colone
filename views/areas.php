<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="../images/favicon.png">

    <title>Áreas compartidas</title>

    <!--Core CSS -->
    <link href="../assets/bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/bootstrap-reset.css" rel="stylesheet">
    <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <link rel="stylesheet" href="../assets/css/bootstrap-switch.css" />
    <link rel="stylesheet" type="text/css" href="../assets/js/bootstrap-fileupload/bootstrap-fileupload.css" />
    <link rel="stylesheet" type="text/css" href="../assets/js/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
    <link rel="stylesheet" type="text/css" href="../assets/js/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="../assets/js/bootstrap-timepicker/css/timepicker.css" />
    <link rel="stylesheet" type="text/css" href="../assets/js/bootstrap-colorpicker/css/colorpicker.css" />
    <link rel="stylesheet" type="text/css" href="../assets/js/bootstrap-daterangepicker/daterangepicker-bs3.css" />
    <link rel="stylesheet" type="text/css" href="../assets/js/bootstrap-datetimepicker/css/datetimepicker.css" />
    <link rel="stylesheet" type="text/css" href="../assets/js/jquery-multi-select/css/multi-select.css" />
    <link rel="stylesheet" type="text/css" href="../assets/js/jquery-tags-input/jquery.tagsinput.css" />

    <link rel="stylesheet" type="text/css" href="../assets/js/select2/select2.css" />
    <link rel="stylesheet" href="../assets/js/data-tables/DT_bootstrap.css" />

    <!-- Custom styles for this template -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/style-responsive.css" rel="stylesheet" />

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]>
    <script src="../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!--calendar css-->
    <link href="../assets/js/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />


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
            <section class="panel">
                <header class="panel-heading">
                    Reservación de Áreas Compartidas
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                </header>
                <div class="panel-body">
                    <!-- page start-->
                    <div class="row">
                        <aside class="col-lg-9">
                            <div id="calendar" class="has-toolbar"></div>
                        </aside>
                        <aside class="col-lg-3">
                            <h4 class="drg-event-title"> Áreas</h4>
                            <div id='external-events'>
                                <div class='external-event label label-primary' >Sala de Juntas</div>
                                <div class='external-event label label-primary'>Sala Audiovisual</div>
                                <div class='external-event label label-primary'>Salón de Conferencias</div>


                        </aside>






                    </div>

                </div>
                <!-- page end-->


            </section>
        </section>
        <!--main content end-->-->























             <!--right sidebar start-->



        <?php
        include 'sidebar.php';
        ?>


        <!--right sidebar end-->

</section>

    <!--Core js-->
    <script src="../assets/js/jquery.js"></script>
    <script type="text/javascript" src="../assets/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="../assets/bs3/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="../assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="../assets/js/jquery.scrollTo.min.js"></script>
    <script src="../assets/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js"></script>
    <script src="../assets/js/jquery.nicescroll.js"></script>


    <script type="text/javascript" src="../assets/js/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap-daterangepicker/moment.min.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
    <script type="text/javascript" src="../assets/js/jquery-multi-select/js/jquery.multi-select.js"></script>
    <script type="text/javascript" src="../assets/js/jquery-multi-select/js/jquery.quicksearch.js"></script>



    <script src="../assets/js/fullcalendar/fullcalendar.min.js"></script>

    <!--Easy Pie Chart-->
    <script src="../assets/js/easypiechart/jquery.easypiechart.js"></script>
    <!--Sparkline Chart-->
    <script src="../assets/js/sparkline/jquery.sparkline.js"></script>

    <!--jQuery Flot Chart-->
    <script src="../assets/js/flot-chart/jquery.flot.js"></script>
    <script src="../assets/js/flot-chart/jquery.flot.tooltip.min.js"></script>
    <script src="../assets/js/flot-chart/jquery.flot.resize.js"></script>
    <script src="../assets/js/flot-chart/jquery.flot.pie.resize.js"></script>

    <!--common script init for all pages-->
    <script src="../assets/js/scripts.js"></script>

    <!--script for this page only-->

    <script src="../assets/js/external-dragging-calendar.js"></script>


    <script src="../assets/js/advanced-form.js"></script>


    <script src="../assets/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script class="include" type="text/javascript" src="../assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="../assets/js/jquery.scrollTo.min.js"></script>


    <script type="text/javascript" src="../assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>

    <script src="../assets/js/jquery-tags-input/jquery.tagsinput.js"></script>

    <script src="../assets/js/select2/select2.js"></script>
    <script src="../assets/js/select-init.js"></script>


</body>
</html>








