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

    <title>Directorio de contactos</title>

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
    <link href="../assets/css/star-rating.css" rel="stylesheet">

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
                    <i class="fa fa-2x flaticon-agenda"></i> Directorio de contactos
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>

                    <p style="font-weight: 200; text-transform: none; margin-top: 20px;">
                        Almacenamiento de contactos, aqui podras revisar conactos de interes común, valorarlos para el beneficio de tus vecinos.
                    </p>

                </header>
                <div class="panel-body">
    <?php if($_SESSION['tipo_usuario'] == 1){ ?>
                    <div class="btn-group">
                     <a href="../forms/adddirectory.php" class="tooltipcolone"><button  id="editable-sample_new" class="btn btn-primary tooltipcolone">
                                <span class="tooltipcolone-content">Crea un contacto</span>

                        Nuevo contacto  <i class="fa fa-plus"></i>
                            </button></a>

                    </div>
<?php } ?>

                    <div class="col-lg-offset-8 col-lg-3" style="margin-top: 15px;">
                    <i style=" color: #0080e1; padding-right: 10px;" class="fa fa-2x fa-search"></i><input id="buscador" class="btn btn-search" placeholder="Buscar" type="input" value="">
                    </div>


                    <div class="row">

                <?php

                $consulta = "SELECT * FROM directory WHERE id_place LIKE '".$_SESSION['id_place']."' AND active LIKE 1";
                $resultado = $mysqli->query($consulta);

                 while ($row1=mysqli_fetch_row($resultado))
                        {

                            $title = $row1[2];
                            $address = $row1[3];
                            $phone = $row1[4];
                            $email = $row1[5];
                            $website = $row1[6];




                        ?>


                        <div class="col-lg-5 item" style="border: 5px solid #dddddd; padding: 30px; margin: 30px;">

                            <?php if($_SESSION['tipo_usuario'] == 1){ ?>
                       <button    onclick="validateRemoveDirectory(<?php echo $row1[0]; ?>)" type="button" class="btn" style="border-radius: 50px; font-size: 25px; color: #ff2553; background: transparent ; margin-left: 4px; margin-right: 4px; position: absolute; top: 2px ; left: 90%;"><i class="fa fa-times-circle"></i> </button>
                            <?php } ?>



                            <h3 class="nombres" style="font-size: 30px; color: #333; border-bottom: 2px dashed #dddddd; padding: 15px; padding-left: 0px;">
                            <i class="fa fa-user"></i>   <?php echo $title; ?></h3>


                            <p style="font-size: 17px; color: #333333; "><i style=" color: #0080e1;" class="fa fa-globe"></i> <?php echo $address; ?></p>
                            <p style="font-size: 17px; color: #747474; "><i style=" color: #0080e1;" class="fa fa-phone"></i> <?php echo $phone; ?></p>
                            <p style="font-size: 17px; color: #747474; "><i style=" color: #0080e1;" class="fa fa-envelope"></i> <?php echo $email; ?></p>
                            <p style="font-size: 17px; color: #dd5555; "><i style=" color: #dd5555;" class="fa fa-rss"></i> <?php echo $website; ?></p>


                            <div class="btn-group" style="margin-left: 4px; margin-right: 4px; max-height: 150px; position: absolute; top: 170px ; left: 70%;">
                                <a data-toggle="modal" href="#star-ratingModal" class="tooltipcolone"><button  id="editable-sample_new" class="btn btn-primary tooltipcolone">
                                        <span class="tooltipcolone-content">Valora este contacto</span>

                                        Valorar <i class="fa fa-star-half-empty"></i>
                                    </button></a>

                            </div>




                        </div>

            <?php


            }
            ?>

                    <!-- Modal -->
                    <div class="modal fade"  id="star-ratingModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title">Valorar <i class="fa fa-star-half-empty"></i></h4>
                                </div>
                                <div class="modal-body" style="height: 300px;">

                                <div class="col-lg-12">
                                    <select id="star-rating">
                                        <option value="">Valor</option>
                                        <option value="5">Excelente</option>
                                        <option value="4">Muy bien</option>
                                        <option value="3">Más o menos </option>
                                        <option value="2">Mal</option>
                                        <option value="1">Muy mal</option>
                                    </select>
                                </div>

                                <div class="col-lg-12" >

                                      <span class="input" >
                                        <textarea class="input__field_textarea input__field--fumi_textarea" id="notice"  name="notice"></textarea>
                                                    <label for="name" class="input__label_textarea input__label--fumi_textarea ">
                                                        <i class="fa fa-fw fa-3x fa-star icon icon--fumi"></i>
                                                        <span class="input__label-content_textarea input__label-content--fumi_textarea">Comentario*</span>
                                                    </label>
                                      </span>


                                </div>

                                </div>
                                <div class="modal-footer">
                                    <button data-dismiss="modal" class="btn btn-danger" type="button">Cancelar</button>
                                    <button class="btn btn-primary" type="button">Listo</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- modal -->





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

<script src="../assets/js/star-rating.js"></script>
<script>
    var starrating = new StarRating( document.getElementById( 'star-rating' ));
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