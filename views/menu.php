<?php

include '../libs/conexion.php';

$consulta1 = "SELECT * FROM place WHERE id_place LIKE '".$_SESSION['id_place']."'";
$resultado1 = $mysqli->query($consulta1);

while ($row1=mysqli_fetch_row($resultado1))
{

    $image = $row1[2];

}
if($image == NULL){

    $image= 'nofound.png';

}
?>


<!--header start-->
<header class="header fixed-top clearfix">
    <!--logo start-->
    <div class="brand">

        <a href="index.php">

            <img class="avatarl" src="../assets/images/places/<?php echo $image ?>"alt=""/>

        </a>
        <div class="sidebar-toggle-box">
            <div class="fa fa-bars"></div>
        </div>
    </div>
    <!--logo end-->

    <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">


            <!-- settings end -->

            <?php

            $countDocSql = "SELECT * FROM document WHERE id_place LIKE '".$_SESSION['id_place']."' AND active LIKE 1";
            $countNotSql = "SELECT * FROM notice WHERE id_place LIKE '".$_SESSION['id_place']."' AND active LIKE 1";
            $countDirSql = "SELECT * FROM directory WHERE id_place LIKE '".$_SESSION['id_place']."' AND active LIKE 1";
            $countSugSql = "SELECT * FROM suggestion WHERE id_place LIKE '".$_SESSION['id_place']."' AND active LIKE 1";
            $resultDocSql = $mysqli->query($countDocSql);
            $resultNotSql = $mysqli->query($countNotSql);
            $resultDirSql = $mysqli->query($countDirSql);
            $resultSugSql = $mysqli->query($countSugSql);
            $totalDoc = mysqli_num_rows($resultDocSql); //Contamos la cantidad de filas que nos arrojo el resultado
            $totalNot = mysqli_num_rows($resultNotSql); //Contamos la cantidad de filas que nos arrojo el resultado
            $totalDir = mysqli_num_rows($resultDirSql); //Contamos la cantidad de filas que nos arrojo el resultado
            $totalSug = mysqli_num_rows($resultSugSql); //Contamos la cantidad de filas que nos arrojo el resultado
            ?>
            <!-- inbox dropdown end -->
            <!-- notification dropdown start-->
            <li id="header_notification_bar" class="dropdown">
                <a  href="../views/notice.php">

                    <i class="flaticon-alarm"></i>
                    <span class="badge bg-warning"><?php echo $totalNot; ?></span>
                </a>

            </li>

            <!-- notification dropdown end -->
        </ul>
        <!--  notification end -->
    </div>
    <div class="top-nav clearfix">
        <!--search & user info start-->
        <ul class="nav pull-right top-menu">

            <!-- user login dropdown start-->
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <!--<img alt="" src="images/avatar1_small.jpg"> -->
                    <span class="username"><?php echo $_SESSION['name']; ?></span>
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu extended logout">
                    <li><a href="../forms/editadmon.php"><i class="fa fa-cog"></i> Editar Perfil</a></li>
                    <li><a href="../logout.php"><i class="fa fa-key"></i>Salir</a></li>
                </ul>
            </li>
            <!-- user login dropdown end -->

        </ul>
        <!--search & user info end-->
    </div>
</header>
<!--header end-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a href="../inicio.php">
                        <i style="font-size: 15px;" class="flaticon-houses"></i>
                        <span>Coloné</span>
                    </a>
                </li>

                <?php if($_SESSION['tipo_usuario'] == 1){ ?>
                <li class="sub-menu dcjq-parent-li">
                    <a>
                        <i class="flaticon-users-1"></i>
                        <span>Usuarios</span>
                    </a>
                    <ul class="sub" style="display: none;">
                        <li>
                            <a href="../views/users.php">
                               <i style="font-size: 15px;" class="flaticon-users-1"></i>
                                <span>Colonos</span>
                            </a>
                        </li>
                        <li>
                            <a href="../views/vigilant.php">
                                <i style="font-size: 15px;" class="flaticon-shield-1"></i>
                                <span>Vigilantes</span>
                            </a>
                        </li>
                    </ul>
                </li>



                <li>
                    <a href="../views/space.php">
                        <i style="font-size: 15px;" class="flaticon-pointing"></i>
                        <span>Espacios</span>
                    </a>
                </li>



                <li>
                    <a href="../views/estados.php">
                        <i style="font-size: 15px;" class="flaticon-stats"></i>
                        <span>Estados de cuenta</span>
                    </a>
                </li>

                <li>
                    <a href="../views/finance.php">
                        <i style="font-size: 15px;" class="flaticon-money-1"></i>
                        <span>Ingresos / Egresos</span>
                    </a>
                </li>

                <li>
                    <a href="../views/morosos.php">
                       <i style="font-size: 15px;" class="flaticon-money"></i>
                        <span>Morosos</span>
                    </a>
                </li>

                <?php } ?>
                <?php if($_SESSION['tipo_usuario'] == 2){ ?>
                    <li>
                        <a href="../views/estadoU.php">
                            <i style="font-size: 15px;" class="flaticon-stats"></i>
                            <span>Estado de cuenta</span>
                        </a>
                    </li>
                <?php } ?>

                <li>
                    <a href="../views/reserve.php">
                        <i style="font-size: 15px;" class="flaticon-calendar"></i>
                        <span>Reservar</span>
                    </a>
                </li>


                <li>
                    <a href="../views/notice.php">
                        <span style="margin-right: 5px; ; font-size: 15px;" class="badge bg-warning"><?php echo $totalNot; ?></span>
                       <i style="font-size: 15px;" class="flaticon-megaphone"></i>
                        <span>Anuncios / Avisos</span>
                    </a>
                </li>

                <li>
                    <a href="../views/directory.php">
                        <span style="margin-right: 5px; ; font-size: 15px;  background: #ff004f;" class="badge bg-danger"><?php echo $totalDir; ?></span>
                        <i style="font-size: 15px;" class="flaticon-agenda"></i>
                        <span>Directorio</span>
                    </a>
                </li>


                <li>
                    <a href="../views/files.php">
                        <span style="margin-right: 5px; ; font-size: 15px;" class="badge bg-primary"><?php echo $totalDoc; ?></span>
                        <i style="font-size: 15px;" class="flaticon-file"></i>
                        <span>Documentos</span>
                    </a>
                </li>

                <?php if($_SESSION['tipo_usuario'] == 1){ ?>


                <li>
                    <a href="../forms/notification.php">
                        <i style="font-size: 15px;" class="flaticon-technology"></i>
                        <span>Notificaciones generales</span>
                    </a>
                </li>



                <li>
                    <a href="../views/suggestion.php">
                        <span style="margin-right: 5px; ; font-size: 15px;" class="badge bg-success"><?php echo $totalSug; ?></span>
                      <i style="font-size: 15px;" class="flaticon-chat"></i>
                        <span>Sugerencias</span>
                    </a>
                </li>

                <?php } ?>
            </ul>
            <p  style="margin-top: 100px; color: #fff; font-size: 14px; text-align: center;" >        ©   <span style="font-family: 'perpetua'; font-size: 20px; color: #ffffff; ">COLONÉ</span> <span style="font-style: italic;">2017, </span>All Rights Reserved. </p>

        </div>



        <!-- sidebar menu end-->
    </div>
</aside>