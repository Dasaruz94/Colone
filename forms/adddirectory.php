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
    <title>Agregar contacto</title>

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
                   <i class="fa fa-2x flaticon-agenda"></i>  Añadir contacto
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>

                    <p style="font-weight: 200; text-transform: none; margin-top: 20px;">Añade un contacto que pueda interesar a tu comunidad  </p>


                </header>
                <div class="panel-body">
                    <div class="row">


                        <div class="col-lg-12">

                               <div class="form">
                                        <form class="cmxform form-horizontal" id="signupForm" method="post" action="../controllers/createController.php?a=createDirectory">

                                            <div class="col-lg-4">
                                                <span class="input input--fumi ">
                                                    <input class=" input__field input__field--fumi" id="title" name="title"  type="text" />
                                                    <label for="name" class="input__label input__label--fumi ">
                                                        <i class="fa fa-fw fa-3x flaticon-social icon icon--fumi"></i>
                                                        <span class="input__label-content input__label-content--fumi">Título*</span>
                                                    </label>
                                                </span>
                                            </div>


                                            <div class="col-lg-4">
                                                <span class="input input--fumi ">
                                                    <input class=" input__field input__field--fumi" type="text" data-mask="(999) 999-9999" id="phone" name="phone"  />
                                                    <label for="tel" class="input__label input__label--fumi">
                                                        <i class="fa fa-fw fa-3x fa-phone icon icon--fumi"></i>
                                                        <span class="input__label-content input__label-content--fumi">Teléfono</span>
                                                    </label>
                                                </span>
                                            </div>



                                            <div class="col-lg-4">
                                                <span class="input input--fumi ">
                                                    <input class=" input__field input__field--fumi" id="email" name="email"  type="email"  />
                                                    <label for="email" class="input__label input__label--fumi input__label--fumi-color-1">
                                                        <i class="fa fa-fw fa-3x flaticon-mail icon icon--fumi"></i>
                                                        <span class="input__label-content input__label-content--fumi">Email*</span>
                                                    </label>
                                                </span>
                                            </div>



                                            <div class="col-lg-12">
                                                <span class="input input--fumi ">
                                                    <input class=" input__field input__field--fumi" id="address" name="address"  type="text" />
                                                    <label for="ap" class="input__label input__label--fumi input__label--fumi-color-1">
                                                        <i class="fa fa-fw fa-3x flaticon-pointing icon icon--fumi"></i>
                                                        <span class="input__label-content input__label-content--fumi">Dirección*</span>
                                                    </label>
                                                </span>
                                            </div>
                                            <div class="col-lg-4">
                                                <span class="input input--fumi ">
                                                    <input class=" input__field input__field--fumi"  id="website" name="website"  type="text" />
                                                    <label for="ap" class="input__label input__label--fumi input__label--fumi-color-1">
                                                        <i class="fa fa-fw fa-3x fa-rss icon icon--fumi"></i>
                                                        <span class="input__label-content input__label-content--fumi">Sitio web*</span>
                                                    </label>
                                                </span>
                                            </div>


                                            <div class="form-group">
                                                <div class="col-lg-offset-5 col-lg-6">
                                                    <button class="btn hvr-bounce-to-right" type="submit">Añadir<i class="fa fa-plus"></i></button>
                                                    <a href="javascript:history.back(-1);"><button class="btn btn-danger hvr-wobble-horizontal" type="button">Cancelar</button></a>
                                                </div>
                                            </div>




                                    </form>
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


<script type="text/javascript" src="../assets/js/jquery-multi-select/js/jquery.multi-select.js"></script>
<script type="text/javascript" src="../assets/js/jquery-multi-select/js/jquery.quicksearch.js"></script>

<script type="text/javascript" src="../assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>

<script src="../assets/js/jquery-tags-input/jquery.tagsinput.js"></script>

<script type="text/javascript" src="../assets/js/jquery.validate.min.js"></script>
<script src='../assets/js/validation-init.js' ></script>

<script src="../assets/js/select2/select2.js"></script>
<script src="../assets/js/select-init.js"></script>
<script src="../assets/js/sweetalert2.js"></script>

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
            if( ev.target.value.trim() === ' ' ) {
                classie.remove( ev.target.parentNode, 'input--filled' );
            }
        }
    })();
</script>


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