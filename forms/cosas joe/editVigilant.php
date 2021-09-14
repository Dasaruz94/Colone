<?php
/**
 * Created by PhpStorm.
 * User: Daniel
 * Date: 28/05/2017
 * Time: 03:01 AM
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

            <title>Editar Vigilante</title>

            <!--Core CSS -->
            <link href="../assets/bs3/css/bootstrap.min.css" rel="stylesheet">
            <link href="../assets/css/bootstrap-reset.css" rel="stylesheet">
            <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
            <link href="../assets/css/sweetalert2.css" rel="stylesheet">
            <link rel="stylesheet" href="../assets/js/data-tables/DT_bootstrap.css" />

            <!-- Custom styles for this template -->
            <link href="../assets/css/style.css" rel="stylesheet">
            <link href="../assets/css/style-responsive.css" rel="stylesheet" />




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

                    <section class="panel">
                        <header class="panel-heading">
                            Editar Vigilante
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>

                            <p style="font-weight: 200; text-transform: none; margin-top: 20px;"> Edita los datos del vigilante   </p>

                        </header>
                        <div class="panel-body">

                            <?php


                            $consulta = "SELECT * FROM vigilant WHERE id_vigilant LIKE '".$_GET['id']."'";
                            $resultado = $mysqli->query($consulta);

                            // $total = mysqli_num_rows($resultado); //Contamos la cantidad de filas que nos arrojo el resultado


                            while ($row=mysqli_fetch_row($resultado))
                            {


                                $name = $row[2];


                            }


                            ?>


                            <div class="form">
                                <form class="cmxform form-horizontal" enctype="multipart/form-data" id="signupForm" method="post" action="../controllers/updateController.php?a=updateVigilant&id=<?php echo $_GET['id']; ?>">




                                    <div class="col-lg-8">
                                                <span class="input input--fumi ">
                                                    <input class=" input__field input__field--fumi" id="name" value="<?php echo $name; ?>" name="name"  type="text" />
                                                    <label for="name" class="input__label input__label--fumi ">
                                                        <i class="fa fa-fw fa-3x fa-building-o icon icon--fumi"></i>
                                                        <span class="input__label-content input__label-content--fumi">Nombre completo*</span>
                                                    </label>
                                                </span>


                                        <div class="form-group" style="margin-top: 35px; margin-bottom: 35px; margin-left: 1px;" >

                                            <div class="controls col-md-3">
                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                <span class="btn btn-white btn-file hvr-bounce-to-right">
                                                 <span class="fileupload-new"><i class="fa fa-picture-o"></i>Actualizar foto</span>
                                                 <span class="fileupload-exists"><i class="fa fa-undo"></i> Cambiar</span>
                                                <input type="file" name="image" class="default" />
                                                </span>
                                                    <span class="fileupload-preview" style="margin-left:5px;"></span>
                                                    <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>
                                                </div>
                                            </div>
                                        </div>


                                    </div>


                                    <div class="col-lg-4">

                                        <div class="form-group" style="margin-top: 135px; margin-bottom: 35px; margin-left: 33px;">
                                            <button class="btn hvr-bounce-to-right" type="submit">Guardar<i class="fa fa-check"></i></button>
                                            <button class="btn btn-danger hvr-wobble-horizontal" type="button">Cancelar</button>
                                        </div>
                                    </div>



                                </form>
                            </div>
                        </div>
                    </section>


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

        <script src="../assets/js/select2/select2.js"></script>
        <script src="../assets/js/select-init.js"></script>

        <!--common script init for all pages-->
        <script src="../assets/js/scripts.js"></script>
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

    header('Location: ../index.php?e=error');
    echo 'El usuario no es correcto';
}
?>