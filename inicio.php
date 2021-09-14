<?php
/**
 * Created by PhpStorm.
 * User: Daniel
 * Date: 21/05/2017
 * Time: 07:27 PM
 */


SESSION_START();

if(isset($_SESSION['email'])) {

    $total=2;


}else{

    include 'libs/conexion.php';


    $tablaDeMysql = "user"; //Define el nombre de la tabla donde estan los datos


//Checamos si se lleno el campo de usuario en el formulario
    $b=$_POST['password'];
    $patron='Zn5G7hnkL0bhgf1';
    $b=$patron.md5($b);



    $consulta = "SELECT * FROM ".$tablaDeMysql." WHERE username LIKE '".$_POST['email']."' AND password LIKE '".$b."' ";
    $resultado = $mysqli->query($consulta);



    $total = mysqli_num_rows($resultado); //Contamos la cantidad de filas que nos arrojo el resultado




}


if($total == 1){


    while ($row=mysqli_fetch_row($resultado))
    {

        $active = $row[10];


        if($active==1){
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['id'] = $row[0];
        $_SESSION['password'] = $_POST['password'];
        $_SESSION['tipo_usuario'] = $row[4];
        $_SESSION['id_place'] = $row[1];
        }
        else{

            SESSION_START();

            SESSION_UNSET();

            SESSION_DESTROY();

            header('Location: index.php?e=wrong1');
        }
    }


    $consulta1 = "SELECT * FROM user_data WHERE id_user LIKE '".$_SESSION['id']."'";
    $resultado1 = $mysqli->query($consulta1);

    while ($row1=mysqli_fetch_row($resultado1))
    {

        $_SESSION['name'] = $row1[2].' '.$row1[3];

    }





    $total=2;
}

if($total==2){

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="images/favicon.png">

    <title>Inicio</title>

    <!--Core CSS -->
    <link href="assets/bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/bootstrap-reset.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/flaticon.css">
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/animate.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet" />

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]>
    <script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

<body  style="background-color: #f9f9f9;">

<section id="container"  >

    <?php
    include 'menu.php';
    ?>

    <!--sidebar end-->
    <!--main content start-->
    <section id="main-content"  >
        <section class="wrapper"  >
            <!-- page start-->


            <?php



            $consulta1 = "SELECT * FROM place WHERE id_place LIKE '".$_SESSION['id_place']."'";
            $resultado1 = $mysqli->query($consulta1);

            while ($row1=mysqli_fetch_row($resultado1))
            {

                $namep = $row1[1];
                $image = $row1[2];
                $adress = $row1[4];

            }


            if($image == NULL){

            $image= 'nofound.png';

            }

            ?>
            <!--PRIMER--><!--PRIMER--><!--PRIMER--><!--PRIMER--><!--PRIMER--><!--PRIMER-->
            <div class="col-md-4">

                <aside class="profile-nav alt">
                    <section class="panel">
                        <div class="user-heading alt" style="background-image: url('images/bgmenu.jpg'); background-attachment: fixed; background-size: cover; background-repeat: no-repeat;">
                            <a href="#">
                                <img alt="" src="assets/images/places/<?php echo $image ?>" />
                            </a>
                            <h1><i class="flaticon-users-1"></i>  <?php echo $_SESSION['name']; ?></h1>
                            <h1><i class="flaticon-pointing"></i>  <?php echo $namep; ?></h1>
                            <h1><i class="fa fa-road"></i>  <?php echo $adress; ?></h1>

                            <h1><a href="forms/editadmon.php" style="border: none; color: white; font-size: 16px; float: right;"><i class="fa fa-cog"></i> Editar Perfil </a></h1>
                        </div>

                        <?php

                        $countDocSql = "SELECT * FROM document WHERE id_place LIKE '".$_SESSION['id_place']."' AND active LIKE 1";
                        $countNotSql = "SELECT * FROM notice WHERE id_place LIKE '".$_SESSION['id_place']."' AND active LIKE 1";
                        $resultDocSql = $mysqli->query($countDocSql);
                        $resultNotSql = $mysqli->query($countNotSql);

                        $totalDoc = mysqli_num_rows($resultDocSql); //Contamos la cantidad de filas que nos arrojo el resultado
                        $totalNot = mysqli_num_rows($resultNotSql); //Contamos la cantidad de filas que nos arrojo el resultado




                        ?>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="views/files.php"> <i class="flaticon-folder-1"></i> Documentos <span class="badge label-primary pull-right r-activity"><?php echo $totalDoc ?></span></a></li>
                            <?php if($_SESSION['tipo_usuario'] == 1){ ?>
                                <li><a href="javascript:;"> <i class="flaticon-mail"></i> Sugerencias <span class="badge label-success pull-right r-activity">4</span></a></li>
                            <?php } ?>
                            <li><a href="views/notice.php"> <i class="flaticon-alarm"></i> Anuncios <span class="badge label-warning pull-right r-activity"><?php echo $totalNot ?></span></a></li>

                        </ul>

                    </section>
                </aside>



    <?php

    $consulta = "SELECT * FROM vigilant WHERE id_place LIKE '".$_SESSION['id_place']."' AND active LIKE 1";

    $resultado = $mysqli->query($consulta);

    while ($row1=mysqli_fetch_row($resultado))
    {

        $name = $row1[2];
        $photo= $row1[3];
        ?>

                    <div class="mini-stat clearfix">
                       <!-- <span class="mini-stat-icon orange"><i class="fa fa-male"></i></span> -->
                        <div class="user-heading alt">
                            <a href="#">
                                <img alt="" src="assets/images/vigilants/<?php echo $photo; ?>" />
                            </a>

                        <div class="mini-stat-info">
                            <span style="font-size: 14px;"><i class="flaticon-shield-1"></i>Vigilante en turno:</span>
                            <span style="font-size: 20px;">   <?php echo $name; ?></span>
                        </div>
                        </div>
                    </div>

        <?php

        }

        ?>


                </div>


            <!--SEGUNDA--><!--SEGUNDA--><!--SEGUNDA--><!--SEGUNDA--><!--SEGUNDA--><!--SEGUNDA-->



            <div class="col-md-4" >
                <!--widget start-->
                <aside class="profile-nav alt" style="margin-top: -20px;">
                    <section class="panel" >

                        <h3 class="nombres" style="font-size: 16px; color: #333; border-bottom: 0.5px solid #cacaca; padding: 30px; padding-left: 45px;">
                            <i class="flaticon-megaphone"></i> Avisos recientes </h3>

                        <div class="user-heading alt" style="background: #f1f1f1; padding: 5px;">
                            <?php

                            $conNot = "SELECT * FROM notice WHERE id_place LIKE '".$_SESSION['id_place']."' AND active LIKE 1 ORDER BY id_notice desc LIMIT 3";
                            $resNot = $mysqli->query($conNot);


                            while ($row1=mysqli_fetch_row($resNot))
                            {

                                $title = $row1[2];
                                $notice = $row1[3];
                                $file = $row1[4];

                                ?>

                                <div class="col-lg-12" style="padding: 10px; margin: 0px; position: relative; background: #0087dd;">

                                    <div class="item" >

                                        <h3 class="nombres" style="font-size: 16px; color: #fff;  padding-left: 0px;">
                                            <i style="color:white;" class="flaticon-megaphone"></i> <?php echo substr($title, 0, 20); ?>...</h3>

                                    </div>
                                </div>
                            <?php


                            }
                            ?>

                        </div>
                        <a href="views/notice.php" style="border: none; margin-left: 0px; margin-top: 5px; padding: 20px; color: #0070ff;" class="tooltipcolone">Leer avisos </a>



                    </section>
                </aside>



                        <?php
                           if($_SESSION['tipo_usuario'] == 1){

                        $countResident = "SELECT * FROM user WHERE id_place LIKE '".$_SESSION['id_place']."' AND active LIKE 1";

                        $resultResident = $mysqli->query($countResident);

                        $totalResident = mysqli_num_rows($resultResident); //Contamos la cantidad de filas que nos arrojo el resultado


                        ?>


                    <div class="col-md-12" style="padding: 0;">
                        <div class="profile-nav alt">
                            <section class="panel text-center">
                                <div class="user-heading alt wdgt-row terques-bg">
                                    <i style="font-size: 40px;" class="flaticon-users-1"></i>
                                </div>

                                <div class="panel-body">
                                    <div class="wdgt-value">
                                        <h1 style="color: #333;" class="count"><?php echo $totalResident; ?></h1>
                                        <p style="color: #333;">Residentes</p>
                                    </div>
                                </div>

                            </section>
                        </div>
                    </div>

        <?php } ?>

            </div>

            <!--TERCERA--><!--TERCERA--><!--TERCERA--><!--TERCERA--><!--TERCERA--><!--TERCERA--><!--TERCERA-->


            <div class="col-md-4">
                <!--widget start-->
                <aside class="profile-nav alt">

                    <section class="panel">

                        <div class="user-heading alt" style="background-image: url('images/googlebg.jpg'); background-size: cover; background-repeat: no-repeat; height: 500px;">

                            <p> <span style="font-size: 20px; color: #333;"> ¡Puedes usar este sistema desde tu dispositivo! </span></p>
                            <i class="fa fa-plus animated infinite tada" style="font-size: 20px; color: #0085ff; text-align: center;"></i><br/>
                            <p> <span style="font-size: 20px; color: #0085ff; font-weight: 900;"> ¡Descarga la APP! </span></p>
                            <p> <span style="font-size: 20px; color: #333;"> y descubre nuevas herramientas creadas pensando en ti <br/> sin importar donde estés   </span></p>
                            <img src="images/android.png" style="width: 50%;" alt=""/>  <img src="images/apple.png" style="width: 50%;" alt=""/>
                            <p  style="margin-top: 10%; color: #fff; font-size: 14px; text-align: center;" >        ©   <span style="font-family: 'perpetua'; font-size: 20px; color: #ffffff; ">COLONÉ</span> <span style="font-style: italic;">2017, </span>All Rights Reserved. </p>



                        </div>







                    </section>
                </aside>
                <!--widget end-->

            </div>



            <!-- page end-->
        </section>
    </section>

</section>
<!--main content end-->
<!--right sidebar start-->
<div class="right-sidebar">
<div class="search-row">
    <input type="text" placeholder="Search" class="form-control">
</div>
<div class="right-stat-bar">
<ul class="right-side-accordion">
<li class="widget-collapsible">
    <a href="#" class="head widget-head red-bg active clearfix">
        <span class="pull-left">work progress (5)</span>
        <span class="pull-right widget-collapse"><i class="ico-minus"></i></span>
    </a>
    <ul class="widget-container">
        <li>
            <div class="prog-row side-mini-stat clearfix">
                <div class="side-graph-info">
                    <h4>Target sell</h4>
                    <p>
                        25%, Deadline 12 june 13
                    </p>
                </div>
                <div class="side-mini-graph">
                    <div class="target-sell">
                    </div>
                </div>
            </div>
            <div class="prog-row side-mini-stat">
                <div class="side-graph-info">
                    <h4>product delivery</h4>
                    <p>
                        55%, Deadline 12 june 13
                    </p>
                </div>
                <div class="side-mini-graph">
                    <div class="p-delivery">
                        <div class="sparkline" data-type="bar" data-resize="true" data-height="30" data-width="90%" data-bar-color="#39b7ab" data-bar-width="5" data-data="[200,135,667,333,526,996,564,123,890,564,455]">
                        </div>
                    </div>
                </div>
            </div>
            <div class="prog-row side-mini-stat">
                <div class="side-graph-info payment-info">
                    <h4>payment collection</h4>
                    <p>
                        25%, Deadline 12 june 13
                    </p>
                </div>
                <div class="side-mini-graph">
                    <div class="p-collection">
						<span class="pc-epie-chart" data-percent="45">
						<span class="percent"></span>
						</span>
                    </div>
                </div>
            </div>
            <div class="prog-row side-mini-stat">
                <div class="side-graph-info">
                    <h4>delivery pending</h4>
                    <p>
                        44%, Deadline 12 june 13
                    </p>
                </div>
                <div class="side-mini-graph">
                    <div class="d-pending">
                    </div>
                </div>
            </div>
            <div class="prog-row side-mini-stat">
                <div class="col-md-12">
                    <h4>total progress</h4>
                    <p>
                        50%, Deadline 12 june 13
                    </p>
                    <div class="progress progress-xs mtop10">
                        <div style="width: 50%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="20" role="progressbar" class="progress-bar progress-bar-info">
                            <span class="sr-only">50% Complete</span>
                        </div>
                    </div>
                </div>
            </div>
        </li>
    </ul>
</li>
<li class="widget-collapsible">
    <a href="#" class="head widget-head terques-bg active clearfix">
        <span class="pull-left">contact online (5)</span>
        <span class="pull-right widget-collapse"><i class="ico-minus"></i></span>
    </a>
    <ul class="widget-container">
        <li>
            <div class="prog-row">
                <div class="user-thumb">
                    <a href="#"><img src="images/avatar1_small.jpg" alt=""></a>
                </div>
                <div class="user-details">
                    <h4><a href="#">Jonathan Smith</a></h4>
                    <p>
                        Work for fun
                    </p>
                </div>
                <div class="user-status text-danger">
                    <i class="fa fa-comments-o"></i>
                </div>
            </div>
            <div class="prog-row">
                <div class="user-thumb">
                    <a href="#"><img src="images/avatar1.jpg" alt=""></a>
                </div>
                <div class="user-details">
                    <h4><a href="#">Anjelina Joe</a></h4>
                    <p>
                        Available
                    </p>
                </div>
                <div class="user-status text-success">
                    <i class="fa fa-comments-o"></i>
                </div>
            </div>
            <div class="prog-row">
                <div class="user-thumb">
                    <a href="#"><img src="images/chat-avatar2.jpg" alt=""></a>
                </div>
                <div class="user-details">
                    <h4><a href="#">John Doe</a></h4>
                    <p>
                        Away from Desk
                    </p>
                </div>
                <div class="user-status text-warning">
                    <i class="fa fa-comments-o"></i>
                </div>
            </div>
            <div class="prog-row">
                <div class="user-thumb">
                    <a href="#"><img src="images/avatar1_small.jpg" alt=""></a>
                </div>
                <div class="user-details">
                    <h4><a href="#">Mark Henry</a></h4>
                    <p>
                        working
                    </p>
                </div>
                <div class="user-status text-info">
                    <i class="fa fa-comments-o"></i>
                </div>
            </div>
            <div class="prog-row">
                <div class="user-thumb">
                    <a href="#"><img src="images/avatar1.jpg" alt=""></a>
                </div>
                <div class="user-details">
                    <h4><a href="#">Shila Jones</a></h4>
                    <p>
                        Work for fun
                    </p>
                </div>
                <div class="user-status text-danger">
                    <i class="fa fa-comments-o"></i>
                </div>
            </div>
            <p class="text-center">
                <a href="#" class="view-btn">View all Contacts</a>
            </p>
        </li>
    </ul>
</li>
<li class="widget-collapsible">
    <a href="#" class="head widget-head purple-bg active">
        <span class="pull-left"> recent activity (3)</span>
        <span class="pull-right widget-collapse"><i class="ico-minus"></i></span>
    </a>
    <ul class="widget-container">
        <li>
            <div class="prog-row">
                <div class="user-thumb rsn-activity">
                    <i class="fa fa-clock-o"></i>
                </div>
                <div class="rsn-details ">
                    <p class="text-muted">
                        just now
                    </p>
                    <p>
                        <a href="#">Jim Doe </a>Purchased new equipments for zonal office setup
                    </p>
                </div>
            </div>
            <div class="prog-row">
                <div class="user-thumb rsn-activity">
                    <i class="fa fa-clock-o"></i>
                </div>
                <div class="rsn-details ">
                    <p class="text-muted">
                        2 min ago
                    </p>
                    <p>
                        <a href="#">Jane Doe </a>Purchased new equipments for zonal office setup
                    </p>
                </div>
            </div>
            <div class="prog-row">
                <div class="user-thumb rsn-activity">
                    <i class="fa fa-clock-o"></i>
                </div>
                <div class="rsn-details ">
                    <p class="text-muted">
                        1 day ago
                    </p>
                    <p>
                        <a href="#">Jim Doe </a>Purchased new equipments for zonal office setup
                    </p>
                </div>
            </div>
        </li>
    </ul>
</li>
<li class="widget-collapsible">
    <a href="#" class="head widget-head yellow-bg active">
        <span class="pull-left"> shipment status</span>
        <span class="pull-right widget-collapse"><i class="ico-minus"></i></span>
    </a>
    <ul class="widget-container">
        <li>
            <div class="col-md-12">
                <div class="prog-row">
                    <p>
                        Full sleeve baby wear (SL: 17665)
                    </p>
                    <div class="progress progress-xs mtop10">
                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                            <span class="sr-only">40% Complete</span>
                        </div>
                    </div>
                </div>
                <div class="prog-row">
                    <p>
                        Full sleeve baby wear (SL: 17665)
                    </p>
                    <div class="progress progress-xs mtop10">
                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                            <span class="sr-only">70% Completed</span>
                        </div>
                    </div>
                </div>
            </div>
        </li>
    </ul>
</li>
</ul>
</div>
</div>
<!--right sidebar end-->

</section>

<!-- Placed js at the end of the document so the pages load faster -->

<!--Core js-->
<script src="assets/js/jquery.js"></script>
<script src="assets/bs3/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="assets/js/jquery.scrollTo.min.js"></script>
<script src="assets/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js"></script>
<script src="assets/js/jquery.nicescroll.js"></script>
<!--Easy Pie Chart-->
<script src="assets/js/easypiechart/jquery.easypiechart.js"></script>
<!--Sparkline Chart-->
<script src="assets/js/sparkline/jquery.sparkline.js"></script>
<!--jQuery Flot Chart-->
<script src="assets/js/flot-chart/jquery.flot.js"></script>
<script src="assets/js/flot-chart/jquery.flot.tooltip.min.js"></script>
<script src="assets/js/flot-chart/jquery.flot.resize.js"></script>
<script src="assets/js/flot-chart/jquery.flot.pie.resize.js"></script>




<script src='assets/js/scripts.js' ></script>
<script src='assets/js/particles.min.js' ></script>

<script>
    $(function(){
        "use strict";

        var particlesSettings = {
            particles: {
                number: {
                    value: 50,
                    density: {
                        enable: !0,
                        value_area: 800
                    }
                },
                color: {
                    value: "#00adff"
                },
                shape: {
                    type: "circle",
                    stroke: {
                        width: 0,
                        color: "#00adff"
                    },
                    polygon: {
                        nb_sides: 4
                    },
                    image: {
                        src: "img/github.svg",
                        width: 100,
                        height: 100
                    }
                },
                opacity: {
                    value: .5,
                    random: !1,
                    anim: {
                        enable: !1,
                        speed: .5,
                        opacity_min: .7,
                        sync: !1
                    }
                },
                size: {
                    value: 3,
                    random: !1,
                    anim: {
                        enable: !1,
                        speed: 10,
                        size_min: .1,
                        sync: !1
                    }
                },
                line_linked: {
                    enable: !0,
                    distance: 150,
                    color: "#00adff",
                    opacity: .4,
                    width: 1
                },
                move: {
                    enable: !0,
                    speed: 1,
                    direction: "none",
                    random: !1,
                    straight: !1,
                    out_mode: "out",
                    bounce: !1,
                    attract: {
                        enable: !1,
                        rotateX: 600,
                        rotateY: 1200
                    }
                }
            },
            interactivity: {
                detect_on: "canvas",
                events: {
                    onhover: {
                        enable: !0,
                        mode: "grab"
                    },
                    onclick: {
                        enable: !0,
                        mode: "push"
                    },
                    resize: !0
                },
                modes: {
                    grab: {
                        distance: 140,
                        line_linked: {
                            opacity: 1
                        }
                    },
                    bubble: {
                        distance: 400,
                        size: 40,
                        duration: 2,
                        opacity: 8,
                        speed: 1.5
                    },
                    repulse: {
                        distance: 200,
                        duration: .4
                    },
                    push: {
                        particles_nb: 4
                    },
                    remove: {
                        particles_nb: 2
                    }
                }
            },
            retina_detect: !0
        };
        if( $('#particles').length != 0 ){
            particlesJS('particles', particlesSettings);
        }



    });
</script>
</body>
</html>
    <?php

}else{

  header('Location: index.php?e=wrong');

}

?>