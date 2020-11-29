<?php

    session_start();

?>  

<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Omar Ernesto Trejo Palafox || Web Developer">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/icon.ico">
    <title>Sistema de control de acceso</title>
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <?php
            if(isset($_SESSION['usuario']))
            {
                //HAY SESION ACTIVA
                ?>

                <div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark">
                    <div class="auth-box bg-white border-top border-secondary">
                        <div id="loginform">
                            <div class="text-center p-t-20 p-b-20">
                                <span class="db"><img src="assets/images/logo-text.jpeg" alt="logo" /></span>
                            </div>
                            <!-- Form -->
                            <form class="form-horizontal m-t-20" id="loginform" method="POST" action="./core/change_password.php">
                                <div class="row p-b-30">
                                    <div class="col-12">
                                        <div class="input-group mb-3">
                                            <label>Cambiar password</label>
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="email" class="form-control form-control-lg" placeholder="Correo electrónico" aria-label="Username" aria-describedby="basic-addon1" name="email" required="">
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="password" class="form-control form-control-lg" placeholder="Contraseña" aria-label="Password" minlength="8" aria-describedby="basic-addon1" maxlength="8" name="password" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row border-top border-secondary">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <div class="p-t-20">
                                                <button class="btn btn-success float-right" type="submit">Cambiar password</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </form>  
                            <form class="form-horizontal m-t-20" id="loginform" method="POST" action="./core/signout.php">
                                <div class="col-12">
                                    <div class="form-group">
                                        <div class="p-t-20">
                                            <button class="btn btn-warning float-right" type="submit">Cerrar sesión</button>
                                        </div>
                                    </div>
                                </div>   
                            </form>                                  
                        </div>
                    </div>
                </div>

                <?php
            }
            else
            {
                //NO HAY SESION ACTIVA
                ?>
                    <div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark">
                        <div class="auth-box bg-white border-top border-secondary">
                            <div id="loginform">
                                <div class="text-center p-t-20 p-b-20">
                                    <span class="db"><img src="assets/images/logo-text.jpeg" alt="logo" /></span>
                                </div>
                                <!-- Form -->
                                <form class="form-horizontal m-t-20" id="loginform" method="POST" action="./core/signin.php">
                                    <div class="row p-b-30">
                                        <div class="col-12">
                                            <div class="input-group mb-3">
                                                <input type="email" class="form-control form-control-lg" placeholder="Correo electrónico" aria-label="Username" aria-describedby="basic-addon1" name="email" required="">
                                            </div>
                                            <div class="input-group mb-3">
                                                <input type="password" class="form-control form-control-lg" placeholder="Contraseña" aria-label="Password" aria-describedby="basic-addon1" name="password" minlength="8"
                                                maxlength="8" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row border-top border-secondary">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <div class="p-t-20">
                                                    <button class="btn btn-info" id="to-recover" type="button"><i class="fa fa-lock m-r-5"></i> ¿No te has registrado?</button>
                                                    <button class="btn btn-success float-right" type="submit">Iniciar sesión</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>    
                                </form>                                    
                            </div>
                            <div id="recoverform">
                                <div class="row m-t-20">
                                    <form class="col-12" action="./core/register.php" method="POST">
                                        <div class="text-center p-t-20 p-b-20">
                                            <span class="db"><img src="assets/images/logo-text.jpeg" alt="logo" /></span>
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="text" name="name" class="form-control form-control-lg" placeholder="Nombre" aria-label="nombre" aria-describedby="basic-addon1" required="">
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="text" name="phone" class="form-control form-control-lg" placeholder="Télefono" aria-label="telefono" aria-describedby="basic-addon1" maxlength="10" required="">
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="email" name="email" class="form-control form-control-lg" placeholder="Email" aria-label="email" aria-describedby="basic-addon1" required="">
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" aria-label="password" aria-describedby="basic-addon1" required="" minlength="8" maxlength="10" >
                                        </div>
                                        <div class="row m-t-20 p-t-20 border-top border-secondary">
                                            <div class="col-12">
                                                <button class="btn btn-info float-right" type="submit" type="button" name="action">Registrar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
            }
        ?>
        
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
        $('[data-toggle="tooltip"]').tooltip();
        $(".preloader").fadeOut();
        // ============================================================== 
        // Login and Recover Password 
        // ============================================================== 
        $('#to-recover').on("click", function() {
            $("#loginform").slideUp();
            $("#recoverform").fadeIn();
        });
        $('#to-login').click(function() {

            $("#recoverform").hide();
            $("#loginform").fadeIn();
        });
    </script>

</body>

</html>