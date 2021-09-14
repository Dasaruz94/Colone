<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="images/favicon.png">

    <title>Iniciar Sesión</title>

    <!--Core CSS -->
    <link href="assets/bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/bootstrap-reset.css" rel="stylesheet">
    <link href="assets/css/animate.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
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

  <body class="login-body" >
  <div  id='particles' class="particle-bg"></div>
    <div class="container" >


        <img src="images/logo-dark.png" width="13%" style="position: relative;
                left: 43%; margin-top: 4%; margin-bottom: -7%;" alt=""/>
      <form class="form-signin" action="inicio.php" method="post">


        <div class="login-wrap">
            <div class="user-login-info">
                <p style="color: #00002b; text-align: center; ">Estas por entrar al sistema, <span style="font-weight: 900; font-size: 12px;">  solo identifícate y podrás usar los beneficios de esta herramienta.</span></p>

                <span class="input input--fumi ">
                    <input class=" input__field input__field--fumi_login" name="email" autofocus type="text" />
                    <label class="input__label input__label--fumi ">
                        <i class="fa fa-fw fa-3x fa-envelope-o icon icon--fumi"></i>
                        <span class="input__label-content input__label-content--fumi">Correo</span>
                    </label>
                </span>

                <span class="input input--fumi ">
                    <input class=" input__field input__field--fumi_login" name="password"  type="password" />
                    <label class="input__label input__label--fumi ">
                        <i class="fa fa-fw fa-3x fa-lock icon icon--fumi"></i>
                        <span class="input__label-content input__label-content--fumi">Contraseña</span>
                        </label>
                </span>

           <?php if(@$_GET['e']== 'wrong'){ ?> <p style="color: #ff0045; font-weight: 900;">El correo o contraseña son incorrectos. Intenta iniciar sesión de nuevo. </p>  <?php } ?>
           <?php if(@$_GET['e']== 'wrong1'){ ?> <p style="color: #ff0045; font-weight: 900;"><i class="fa ion-sad" style="font-"></i> Lo sentimos, este usuario ha sido bloqueado</p>  <?php } ?>

            </div>

            <label class="checkbox">

            <!--    <span class="pull-right">
                    <a data-toggle="modal" href="#myModal"> ¿Olvidaste tu contraseña? </a>

                </span>-->
            </label>
            <button class="btn  hvr-bounce-to-right" type="submit">Iniciar</button>

            <div class="registration" style="color: #2e2e2e;">

                ¿No tienes cuenta aún?
                <a class="" href="../sign-up.php">
                    Crea una cuenta
                </a>
            </div>


        </div>


      </form>

        <!-- Modal -->
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <!--<h4 class="modal-title">¿Olvidaste tu contraseña? </h4>-->
                    </div>

                    <form id="frmRestablecer" action="validaremail.php" method="post">
                    <div class="modal-body">
                        <p>Ingresa tu correo para reiniciar tu contraseña.</p>
                        <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

                    </div>

                    <div id="mensaje"></div>

                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn hvr-wobble-horizontal" type="button">Cancelar</button>
                        <button class="btn btn hvr-bounce-to-right" type="button">Enviar</button>


                    </form>
                    </div>


                </div>

            </div>
        </div>
        <!-- modal -->

    </div>


    <!-- Placed js at the end of the document so the pages load faster -->

    <!--Core js-->
        <script src='assets/js/particles.min.js' ></script>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/bs3/js/bootstrap.min.js"></script>
  <script src="assets/js/validaremail.js"></script>
  <script>
      $(document).ready(function(){
          $("#frmRestablecer").submit(function(event){
              event.preventDefault();
              $.ajax({
                  url:'validaremail.php',
                  type:'post',
                  dataType:'json',
                  data:$("#frmRestablecer").serializeArray()
              }).done(function(respuesta){
                  $("#mensaje").html(respuesta.mensaje);
                  $("#email").val('');
              });
          });
      });
  </script>

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
                    value: "#cccccc"
                },
                shape: {
                    type: "circle",
                    stroke: {
                        width: 0,
                        color: "#cccccc"
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
                    color: "#cccccc",
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



  <script src="assets/js/classie.js"></script>
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
