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
    <link rel="shortcut icon" href="images/favicon.png">

    <title>Editar Usuario</title>

    <!--Core CSS -->
    <link href="../assets/bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/bootstrap-reset.css" rel="stylesheet">
    <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <link rel="stylesheet" href="../assets/js/data-tables/DT_bootstrap.css" />

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


    <section id="main-content" class="">
        <section class="wrapper">
            <!-- page start-->





            <section class="panel">
                <header class="panel-heading">
                    Editar Usuario
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>

                    <p style="font-weight: 200; text-transform: none; margin-top: 20px;"> Edita los datos de los usuarios   </p>

                </header>
                <div class="panel-body">
                    <div class="form">
                        <form class="cmxform form-horizontal" id="signupForm" method="get" action="">

                            <div class="col-lg-4">
                                                <span class="input input--hoshi ">
                                                    <input class=" input__field input__field--hoshi" id="name" name="name"  type="text" />
                                                    <label for="name" class="input__label input__label--hoshi input__label--hoshi-color-1">
                                                        <span class="input__label-content input__label-content--hoshi">Nombre*</span>
                                                    </label>
                                                </span>
                            </div>

                            <div class="col-lg-4">
                                                <span class="input input--hoshi ">
                                                    <input class=" input__field input__field--hoshi" id="ap" name="ap"  type="text" />
                                                    <label for="ap" class="input__label input__label--hoshi input__label--hoshi-color-1">
                                                        <span class="input__label-content input__label-content--hoshi">Apellido Paterno*</span>
                                                    </label>
                                                </span>
                            </div>

                            <div class="col-lg-4">
                                                <span class="input input--hoshi ">
                                                    <input class=" input__field input__field--hoshi" id="am" name="am"  type="text" />
                                                    <label for="am" class="input__label input__label--hoshi input__label--hoshi-color-1">
                                                        <span class="input__label-content input__label-content--hoshi">Apellido Materno*</span>
                                                    </label>
                                                </span>
                            </div>


                            <div class="col-lg-8">
                                                <span class="input input--hoshi ">
                                                    <input class=" input__field input__field--hoshi" id="email" name="email"  type="email"  />
                                                    <label for="email" class="input__label input__label--hoshi input__label--hoshi-color-1">
                                                        <span class="input__label-content input__label-content--hoshi">Email*</span>
                                                    </label>
                                                </span>
                            </div>

                            <div class="col-lg-4">
                                                <span class="input input--hoshi ">
                                                    <input class=" input__field input__field--hoshi" type="text" placeholder="" data-mask="(999) 999-9999" id="tel" name="tel"  />
                                                    <label for="tel" class="input__label input__label--hoshi input__label--hoshi-color-1">
                                                        <span class="input__label-content input__label-content--hoshi">Teléfono</span>
                                                    </label>
                                                </span>
                            </div>

                            <div class="col-lg-4">
                                                <span class="input input--hoshi ">
                                                    <input class=" input__field input__field--hoshi" id="password" name="password" type="password" />
                                                    <label for="password" class="input__label input__label--hoshi input__label--hoshi-color-1">
                                                        <span class="input__label-content input__label-content--hoshi">Contraseña*</span>
                                                    </label>
                                                </span>
                            </div>

                            <div class="col-lg-4">
                                                <span class="input input--hoshi ">
                                                    <input class=" input__field input__field--hoshi"  id="confirm_password" name="confirm_password" type="password" />
                                                    <label for="confirm_password" class="input__label input__label--hoshi input__label--hoshi-color-1">
                                                        <span class="input__label-content input__label-content--hoshi">Confirma la contraseña</span>
                                                    </label>
                                                </span>
                            </div>

                            <div class="col-lg-4">
                                                <span class="input input--hoshi ">
                                                    <input class=" input__field input__field--hoshi" id="num_set" name="num_set" type="text" />
                                                    <label for="int" class="input__label input__label--hoshi input__label--hoshi-color-1">
                                                        <span class="input__label-content input__label-content--hoshi">No. Int / Oficina*</span>
                                                    </label>
                                                </span>
                            </div>


                            <div class="col-lg-offset-4 col-lg-4">
                                                <span class="input input--hoshi ">
                                                    <input class=" input__field input__field--hoshi" id="codigo" name="codigo" type="text" style="color: orange;"/>
                                                    <label for="codigo" class="input__label input__label--hoshi input__label--hoshi-color-3">
                                                        <span class="input__label-content input__label-content--hoshi">Código de zona*</span>
                                                    </label>
                                                </span>
                            </div>



                            <div class="form-group">
                                <div class="col-lg-offset-5 col-lg-6">
                                    <button class="btn hvr-bounce-to-right" type="submit">Guardar <i class="fa  fa-check"></i></button>
                                    <a href="javascript:history.back(-1);"><button class="btn btn-danger hvr-wobble-horizontal" type="button">Cancelar</button></a>
                                </div>
                            </div>



                        </form>
                    </div>
                </div>
                </secti










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




    <!-- <script type="text/javascript" src="js/jquery.validate.min.js"></script>-->

    <!--common script init for all pages-->
    <script src="../assets/js/scripts.js"></script>
    <!--this page script
    <script src="js/validation-init.js"></script>-->


<!-- END JAVASCRIPTS -->
<script>
    jQuery(document).ready(function() {
        EditableTable.init();
    });
</script>

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