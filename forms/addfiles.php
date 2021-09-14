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
    <title>Documentos</title>

    <!--Core CSS -->
    <link href="../assets/bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/bootstrap-reset.css" rel="stylesheet">
    <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <link rel="stylesheet" href="../assets/js/data-tables/DT_bootstrap.css" />

    <link href="../assets/js/mini-upload-form/assets/css/bucketmin.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/style-responsive.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../assets/css/flaticon.css">     
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
    include '../views/menu.php';
    ?>


    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <!-- page start-->

            <div class="row">
                <div class="col-sm-12">
                    <section class="panel">
                        <header class="panel-heading">
                        <i class="fa fa-2x flaticon-file"></i>      Documentos
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>

                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>

                            <p style="font-weight: 200; text-transform: none; margin-top: 20px;"> Bienvenidos a la nube de documentos de tu zona  <i class="flaticon-upload"></i>, aquí podrán almacenar documentos importantes.
                           </p>
                        </header>

                        <div class="panel-body">
                            <div class="btn-group">
                                <a href="../views/files.php"><button class="btn btn-primary">
                                        Documentos <i class="flaticon-folder-1"></i>
                                    </button></a>

                            </div>
                            <form id="upload" method="post" action="../controllers/createController.php?a=createDocument" enctype="multipart/form-data">
                                <div id="drop" style="    border: 5px dashed #03a9f4;">
                                    <i style="font-size: 40px; color: #03a9f4;" class="flaticon-cloud-computing-1"></i>
                                    <br/>
                                    Deposita aquí los archivos
                                    <br/>
                                    <a style="background: #03a9f4;">Buscar</a>
                                    <input  type="file" name="document" multiple />
                                </div>

                                <ul>
                                    <!-- The file uploads will be shown here -->
                                </ul>

                            </form>
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



<script src="../assets/js/mini-upload-form/assets/js/jquery.knob.js"></script>

<!-- jQuery File Upload Dependencies -->
<script src="../assets/js/mini-upload-form/assets/js/jquery.ui.widget.js"></script>
<script src="../assets/js/mini-upload-form/assets/js/jquery.iframe-transport.js"></script>
<script src="../assets/js/mini-upload-form/assets/js/jquery.fileupload.js"></script>

<!-- Our main JS file -->
<script src="../assets/js/mini-upload-form/assets/js/script.js"></script>


    <!--common script init for all pages-->
    <script src="../assets/js/scripts.js"></script>
    <!--this page script

<!-- END JAVASCRIPTS -->




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