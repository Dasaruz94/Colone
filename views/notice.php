<?php
/**
 * Created by PhpStorm.
 * User: Daniel
 * Date: 28/05/2017
 * Time: 02:09 AM
 */

SESSION_START();
if(isset($_SESSION['email'])) {

if($_SESSION['tipo_usuario']== 1 || $_SESSION['tipo_usuario'] == 2){

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta name="description" content="">
            <meta name="author" content="Coloné">
            <link rel="shortcut icon" href="../images/favicon.png">

    <title>Avisos / Anunicos</title>

    <!--Core CSS -->
    <link href="../assets/bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/bootstrap-reset.css" rel="stylesheet">
    <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <link rel="stylesheet" href="../assets/js/data-tables/DT_bootstrap.css" />

    <!-- Custom styles for this template -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/style-responsive.css" rel="stylesheet" />
      <link rel="stylesheet" type="text/css" href="../assets/css/flaticon.css">
    <link href="../assets/css/sweetalert2.css" rel="stylesheet">
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

    <section id="main-content" class="">
        <section class="wrapper">
            <!-- page start-->

            <div class="row">
            <div class="col-lg-12">

            <section class="panel">
                <header class="panel-heading">
                    <i class="fa fa-2x flaticon-megaphone"></i>  Anuncios / Avisos
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>

                    <p style="font-weight: 200; text-transform: none; margin-top: 20px;">
                        Avisos o anuncios destinados a tu comunidad, enterate de lo que sucede.
                    </p>

                </header>
                <div class="panel-body">
                     <?php if($_SESSION['tipo_usuario'] == 1){ ?>
                    <div class="btn-group">
                     <a href="../forms/addnotice.php" class="tooltipcolone"><button  id="editable-sample_new" class="btn btn-primary tooltipcolone">
                                <span class="tooltipcolone-content">Crea un aviso</span>

                        Nuevo anuncio <i class="fa fa-plus"></i>
                        </button></a>

                    </div>
<?php } ?>

                    <div class="col-lg-offset-8 col-lg-3" style="margin-top: 15px;">
                        <i style=" color: #0080e1; padding-right: 10px;" class="fa fa-2x fa-search"></i><input id="buscador" class="btn btn-search" placeholder="Buscar" type="input" value="">
                    </div>




                <?php

                $conNot = "SELECT * FROM notice WHERE id_place LIKE '".$_SESSION['id_place']."' AND active LIKE 1";
                $resNot = $mysqli->query($conNot);

                 while ($row1=mysqli_fetch_row($resNot))
                        {

                            $title = $row1[2];
                            $notice = $row1[3];
                            $file = $row1[4];

                        ?>

                        <div class="col-lg-12" >

                        <div class="item" style="border: 5px solid #dddddd; padding: 30px; margin: 30px; position: relative;">

                         <?php if($_SESSION['tipo_usuario'] == 1){ ?>
                       <button onclick="validateRemoveNotice(<?php echo $row1[0]; ?>)" type="button" class="btn" style="border-radius: 50px; font-size: 25px; color: #ff2553; background: transparent ; margin-left: 4px; margin-right: 4px; position: absolute; top: 2px ; left: 90%;"><i class="fa fa-times-circle"></i> </button>
                        <?php } ?>



                            <h3 class="nombres" style="font-size: 30px; color: #333; border-bottom: 2px dashed #dddddd; padding: 15px; padding-left: 0px;">
                            <i class="flaticon-megaphone"></i>   <?php echo $title; ?></h3>

                            <p style="font-size: 17px; color: #333333; "><i style=" color: #0080e1;" class="flaticon-chat"></i> <?php echo $notice; ?></p>
                            <a href="../assets/documentos/notice/<?php echo $row1[4] ?>" target="_blank" class="tooltipcolone"><p class="tooltipcolone" style="font-size: 17px; color: #747474; "><i style=" color: #0080e1;" class="fa fa-file-o"></i> <?php echo $file; ?></p> <span class="tooltipcolone-content">Archivo adjunto al anuncio, click para ver</span></a>


                        </div>
                        </div>
                        <?php


                        }
                        ?>


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

<script type="text/javascript" src="../assets/js/jquery.validate.min.js"></script>

<!--common script init for all pages-->
<script src="../assets/js/scripts.js"></script>
<!--this page script-->
<script src="../assets/js/validation-init.js"></script>


<script type="text/javascript" src="../assets/js/fuelux/js/spinner.min.js"></script>
<script type="text/javascript" src="../assets/js/bootstrap-fileupload/bootstrap-fileupload.js"></script>
<script type="text/javascript" src="../assets/js/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
<script type="text/javascript" src="../assets/js/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
<script type="text/javascript" src="../assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="../assets/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="../assets/js/bootstrap-daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="../assets/js/bootstrap-daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="../assets/js/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script type="text/javascript" src="../assets/js/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
<script type="text/javascript" src="../assets/js/jquery-multi-select/js/jquery.multi-select.js"></script>
<script type="text/javascript" src="../assets/js/jquery-multi-select/js/jquery.quicksearch.js"></script>

<script src="../assets/js/alerts.js"></script>
<script src="../assets/js/sweetalert2.js"></script>

<script type="text/javascript" src="../assets/js/jquery-multi-select/js/jquery.multi-select.js"></script>
<script type="text/javascript" src="../assets/js/jquery-multi-select/js/jquery.quicksearch.js"></script>

<script type="text/javascript" src="../assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>

<script src="../assets/js/jquery-tags-input/jquery.tagsinput.js"></script>

<script type="text/javascript" src="../assets/js/jquery.validate.min.js"></script>


<script src="../assets/js/select2/select2.js"></script>
<script src="../assets/js/select-init.js"></script>


<script src="../assets/js/advanced-form.js"></script>

<script src="../assets/js/classie.js"></script>
<script>
    (function() {
        // trim polyfill : https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/String/Trim
        if (!String.prototype.trim) {
            (function() {
                // Make sure we trim BOM and NBSP
                var rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
                String.prototype.trim = function() {
                    return this.replace(rtrim, '');
                };
            })();
        }

        [].slice.call( document.querySelectorAll( 'input.input__field' ) ).forEach( function( inputEl ) {
            // in case the input is already filled..
            if( inputEl.value.trim() !== '' ) {
                classie.add( inputEl.parentNode, 'input--filled' );
            }

            // events:
            inputEl.addEventListener( 'focus', onInputFocus );
            inputEl.addEventListener( 'blur', onInputBlur );
        } );

        function onInputFocus( ev ) {
            classie.add( ev.target.parentNode, 'input--filled' );
        }

        function onInputBlur( ev ) {
            if( ev.target.value.trim() === '' ) {
                classie.remove( ev.target.parentNode, 'input--filled' );
            }
        }
    })();
</script>


<script>
    $(document).ready(function(){
        $('#buscador').keyup(function(){
            var nombres = $('.nombres');
            var buscando = $(this).val();
            var item='';
            for( var i = 0; i < nombres.length; i++ ){
                item = $(nombres[i]).html().toLowerCase();
                for(var x = 0; x < item.length; x++ ){
                    if( buscando.length == 0 || item.indexOf( buscando ) > -1 ){
                        $(nombres[i]).parents('.item').show();
                    }else{
                        $(nombres[i]).parents('.item').hide();
                    }
                }
            }
        });
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