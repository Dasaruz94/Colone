<?php
/**
 * Created by PhpStorm.
 * User: Daniel
 * Date: 28/05/2017
 * Time: 02:35 AM
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

            <title>Reservar</title>

            <!--Core CSS -->
            <link href="../assets/bs3/css/bootstrap.min.css" rel="stylesheet">
            <link href="../assets/css/bootstrap-reset.css" rel="stylesheet">
            <link href="../assets/css/cs-select.css" rel="stylesheet">
            <link href="../assets/css/cs-skin-rotate.css" rel="stylesheet">
            <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
            <link href="../assets/css/sweetalert2.css" rel="stylesheet">
                  <link rel="stylesheet" type="text/css" href="../assets/css/flaticon.css"> 

            <!-- Custom styles for this template -->
            <link href="../assets/css/style.css" rel="stylesheet">
            <link href="../assets/css/style-responsive.css" rel="stylesheet" />

            <link rel="stylesheet" type="text/css" href="../assets/css/ns-default.css" />
            <link rel="stylesheet" type="text/css" href="../assets/css/ns-style-bar.css" />

            <script src="../assets/js/modernizr.custom.js"></script>
            <script src="../assets/js/jquery-1.8.3.min.js"></script>


            <!-- ------------------------------------------------------ -->




            <link rel="stylesheet"
                  href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/css/ripples.min.css"/>

            <link rel="stylesheet" href="../assets/css/bootstrap-material-datetimepicker.css" />
            <link href='http://fonts.googleapis.com/css?family=Roboto:400,500' rel='stylesheet' type='text/css'>
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

            <script
                    src="https://code.jquery.com/jquery-3.2.1.js"
                    integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
                    crossorigin="anonymous"></script>
            <script src="https://code.jquery.com/jquery-1.12.3.min.js" integrity="sha256-aaODHAgvwQW1bFOGXMeX+pC4PZIPsvn2h1sArYOhgXQ=" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/js/ripples.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/js/material.min.js"></script>
            <script type="text/javascript" src="https://rawgit.com/FezVrasta/bootstrap-material-design/master/dist/js/material.min.js"></script>
            <script type="text/javascript" src="http://momentjs.com/downloads/moment-with-locales.min.js"></script>
            <script type="text/javascript" src="../assets/js/bootstrap-material-datetimepicker.js"></script>



            <!-- ------------------------------------------------------------ -->

            <link rel="stylesheet" href="../assets/css/bootstrap-switch.css" />
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
                            <i class="fa fa-2x flaticon-interface"></i>  Reservar
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>

                            <p style="font-weight: 200; text-transform: none; margin-top: 20px;">Reserva un espacio</p>

                        </header>
                        <div class="panel-body">

                            <div class="form">
                                <form class="cmxform form-horizontal" enctype="multipart/form-data" id="signupForm" method="post" action="../controllers/createController.php?a=createReserve">

                                        <form id="date-form" action="#" class="form-horizontal ">
                                            <input id="title-pick" type="hidden"/>

                                            <div class="col-lg-4">
                                                <span class="input input--fumi" onchange="UnDisableSpaces();">
                                                    <input  id="date"  class=" input__field input__field--fumi" name="date"  type="text" />
                                                    <label for="subject_reserve" class="input__label input__label--fumi ">
                                                        <i class="fa fa-fw fa-3x flaticon-calendar icon icon--fumi"></i>
                                                        <span class="input__label-content input__label-content--fumi">Fecha*</span>
                                                    </label>
                                                </span>
                                            </div>

                                            <div class="col-lg-8">
                                                <span class="input input--fumi ">
                                                    <input class=" input__field input__field--fumi" id="subject_reserve" name="subject_reserve"  type="text" />
                                                    <label for="subject_reserve" class="input__label input__label--fumi ">
                                                        <i class="fa fa-fw fa-3x flaticon-chat icon icon--fumi"></i>
                                                        <span class="input__label-content input__label-content--fumi">Asunto (Opcional)</span>
                                                    </label>
                                                </span>
                                            </div>


                                            <div class="col-lg-4">
                                                <section>

                                                     <select name="space" disabled="true" onchange="showReserves(this.value)" id="spaceInput" style="padding: 26px; border:none; border-bottom: 1px solid #e8e8e8; margin-top: 17px; width: 94%;
                                                margin-left: 12px; margin-bottom: 30px; font-size: 17px; font-weight: 700;">

                                                        <option value="0">Espacios...</option>

                                                        <?php


                                                        $consulta = "SELECT * FROM space WHERE id_place LIKE '".$_SESSION['id_place']."' AND active LIKE 1";
                                                        $resultado = $mysqli->query($consulta);

                                                        // $total = mysqli_num_rows($resultado); //Contamos la cantidad de filas que nos arrojo el resultado


                                                        while ($row=mysqli_fetch_row($resultado))
                                                        {


                                                            $startHour = explode(":", $row[5]);
                                                            $endHour = explode(":", $row[6]);

                                                            ?>

                                                            <option value="<?php echo $row[0]; ?>"><?php echo substr($row[2], 0, 18). ' ('.$startHour[0].':'.$startHour[1]. ' - '.$endHour[0].':'.$endHour[1].')' ?></option>

                                                        <?php } ?>


                                                    </select>
                                                </section>
                                            </div>




                                            <div class="col-lg-4">
                                                <span class="input input--fumi ">
                                                    <input  id="time-start" onchange="activeEndTime();" disabled="true" class=" input__field input__field--fumi" name="time_start"  type="text" />
                                                    <label for="subject_reserve" class="input__label input__label--fumi ">
                                                        <i class="fa fa-fw fa-3x flaticon-clock icon icon--fumi"></i>
                                                        <span class="input__label-content input__label-content--fumi">Hora de Reservación</span>
                                                    </label>
                                                </span>
                                            </div>





                                            <div class="col-lg-4">
                                                <span class="input input--fumi ">
                                                    <input id="time-end" onchange="confirmAvailability(this.value);"  disabled="true"  class=" input__field input__field--fumi" name="time_end"  type="text" />
                                                    <label for="subject_reserve" class="input__label input__label--fumi ">
                                                        <i class="fa fa-fw fa-3x flaticon-clock icon icon--fumi"></i>
                                                        <span class="input__label-content input__label-content--fumi">Hora a Desocupar</span>
                                                    </label>
                                                </span>
                                            </div>



                                            <div class="form-group">
                                                <div class="col-lg-offset-5 col-lg-6">
                                                    <button id="guardarButton" class="btn hvr-bounce-to-right" disabled="true" type="submit">Guardar   <i class="fa fa-check"></i></button>
                                                    <a href="javascript:history.back(-1);"><button class="btn btn-danger hvr-wobble-horizontal" type="button">Cancelar</button></a>
                                                </div>
                                            </div>


                                        </form>

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
            <script src="../assets/bs3/js/bootstrap.min.js"></script>
            <script class="include" type="text/javascript" src="../assets/js/jquery.dcjqaccordion.2.7.js"></script>
            <script src="../assets/js/jquery.scrollTo.min.js"></script>
            <script src="../assets/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js"></script>
            <script src="../assets/js/jquery.nicescroll.js"></script>
            <!--Easy Pie Chart-->
            <script src="../assets/js/easypiechart/jquery.easypiechart.js"></script>
            <!--Sparkline Chart-->
            <script src="../assets/js/sparkline/jquery.sparkline.js"></script>

            <script type="text/javascript" src="../assets/js/data-tables/jquery.dataTables.js"></script>
            <script type="text/javascript" src="../assets/js/data-tables/DT_bootstrap.js"></script>

            <script type="text/javascript" src="../assets/js/jquery.validate.min.js"></script>

            <!--common script init for all pages-->

            <!--this page script-->


            <script type="text/javascript" src="../assets/js/fuelux/js/spinner.min.js"></script>

            <script type="text/javascript" src="../assets/js/jquery-multi-select/js/jquery.multi-select.js"></script>


            <script type="text/javascript" src="../assets/js/jquery-multi-select/js/jquery.multi-select.js"></script>

            <script src="../assets/js/jquery-tags-input/jquery.tagsinput.js"></script>
            <script src="../assets/js/scripts.js"></script>
            <script src="../assets/js/select2/select2.js"></script>
            <script src="../assets/js/select-init.js"></script>
            <script src="../assets/js/sweetalert2.js"></script>
            <!--common script init for all pages-->





        <script src="../assets/js/classie.js"></script>
        <script src="../assets/js/notificationFx.js"></script>


        <script src="../assets/js/selectFx.js"></script>
        <script>
            (function() {
                [].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {
                    new SelectFx(el);
                } );
            })();
        </script>




        <script type="text/javascript">
            $(document).ready(function()
            {
                $('#date').bootstrapMaterialDatePicker
                ({
                    time: false,
                    clearButton: true
                });

                $('#time').bootstrapMaterialDatePicker
                ({
                    date: false,
                    shortTime: true,
                    format: 'HH:mm'
                });

                $('#date-format').bootstrapMaterialDatePicker
                ({
                    format: 'dddd DD MMMM YYYY - HH:mm'
                });
                $('#date-fr').bootstrapMaterialDatePicker
                ({
                    format: 'DD/MM/YYYY HH:mm',
                    lang: 'fr',
                    weekStart: 1,
                    cancelText : 'ANNULER',
                    nowButton : true,
                    switchOnClick : true
                });


                $('#time-start').bootstrapMaterialDatePicker
                ({
                    date: false,
                    weekStart: 0, format: 'HH:mm', shortTime : true

                });

                $('#time-end').bootstrapMaterialDatePicker
                ({
                    date: false,
                    weekStart: 0, format: 'HH:mm', shortTime : true

                });

                $('#min-date').bootstrapMaterialDatePicker({ format : 'DD/MM/YYYY HH:mm', minDate : new Date() });



                $.material.init()
            });


        </script>



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
                    if( inputEl.value.trim() !== '' )  {
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

        <!---      Funciones de formulario     -------->

        <script language="javascript" type="text/javascript">



            function UnDisableSpaces() {

                $("#spaceInput").attr('disabled', false);

            }

            function showReserves(space){

                var date = $("#date").val();

                $.ajax({
                    type:'POST',
                    url: 'api.php',                  //the script to call to get data
                    data: { space: space, date: date },                       //you can insert url argumnets here to pass to api.php
                    //for example "id=5&parent=6"
                    dataType: 'json',                //data format
                    success: function(data)          //on recieve of reply
                    {

                        if(data == 0){

                            var notification = new NotificationFx({
                                message : '<span style="position: relative; top: 30px;" class="icon icon-clock"></span>' +

                                '<p>Parece que no hay reservaciones para éste dia:',
                                layout : 'bar',
                                effect : 'exploader',
                                ttl : 9000000,
                                type : 'notice', // notice, warning or error
                                onClose : function() {
                                    bttn.disabled = false;
                                }
                            });


                            $("#time-start").attr('disabled', false);

                            // show the notification
                            notification.show();
                        }else{

                            var message = '';

                            for(i = 0; i < data.length; i++){

                                message = message + '<li>'+data[i].name+': '+data[i].use+'</li></p>'+'';

                            };
                            console.log(data);

                            var notification = new NotificationFx({
                                message : '<span style="position: relative; top: 30px;" class="icon icon-clock"></span>' +

                                '<p>Horas apartadas para Sala de Juntas:'+

                                    message + ''

                                 ,


                                layout : 'bar',
                                effect : 'exploader',
                                ttl : 9000000,
                                type : 'notice', // notice, warning or error
                                onClose : function() {
                                    bttn.disabled = false;
                                }
                            });


                            $("#time-start").attr('disabled', false);

                            // show the notification
                            notification.show();
                        }

                    },
                    error: function(xhr, textStatus, error){
                        console.log(xhr.statusText);
                        console.log(textStatus);
                        console.log(error);
                    }
                });

            }

            function activeEndTime() {

                $("#time-end").attr('disabled', false);
            }

            function confirmAvailability() {

                var date = $("#date").val();
                var timeStart = $("#time-start").val();
                var timeEnd = $("#time-end").val();
                var space = $("#spaceInput").val();

                $.ajax({
                    type:'POST',
                    url: '../controllers/Reserve.php',                  //the script to call to get data
                    data: { space: space, date: date, timeStart: timeStart, timeEnd: timeEnd },                       //you can insert url argumnets here to pass to api.php
                    //for example "id=5&parent=6"
                    dataType: 'json',                //data format
                    success: function(data)          //on recieve of reply
                    {
                        switch (data) {
                            case 0:
                                alert('Ya se reservo el espacio');
                                break;
                            case 1:
                                alert('Esta disponible el horario');
                                $("#guardarButton").attr('disabled', false);
                                break;
                            case 2:
                                alert('El espacio no esta disponible en este horario');
                                break;
                            case 3:
                                alert('error');

                        }
                       console.log(data);
                    },
                    error: function(xhr, textStatus, error){
                        console.log(xhr.statusText);
                        console.log(textStatus);
                        console.log(error);
                    }
                });



            }

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