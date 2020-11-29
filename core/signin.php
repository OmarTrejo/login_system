<?php 
    include("../core/config/include.php");
    include("../core/model/models.php");
    session_start();
    
    $usuario = new Usuario();
    $usuario->email = ssql($_POST['email']);

    //VALIDAR QUE NO HAYA SIDO UN EMAIL IGUAL
    if(is_null($usuario->getByEmail()))
    {
        echo "Usuario o password incorrecto \n";
    }
    else
    {
        $usuario = $usuario->getByEmail();
        //NO SE ENCONTRO
        echo "ENCONTRADO \n";

        //SE ENCONTRO
        $acceso = new Acceso();
        if(is_null($acceso->getByUsuario($usuario->idusuario)))
        {
            //NO SE ENCONTRO ACCESO EN TRUE

            $password = ssql($_POST['password']);

            $control_password = new ControlPassword();
            if(is_null($control_password->getByUsuario($usuario->idusuario)))
            {
                //SE ENCONTRO LA CONSULTA 
                echo "EL PASSWORD HA CADUCADO \n";

            }
            else
            {
                $control_password = $control_password->getByUsuario($usuario->idusuario);
                //NO SE ENCONTRO 
                echo $control_password->password;
                if(password_verify($password, $control_password->password))
                {
                    //ACCESO CORRECTO
                    echo "ACCESO CORRECTO \n";
                    $acceso->fk_usuario = $usuario->idusuario;
                    $acceso->add();
                    $_SESSION["usuario"] = $usuario->idusuario;
                    header('Location: ../index.php');
                    exit;
                }
                else
                {
                    //ACCESO INCORRECTO
                    echo "PASSWORDO O EMAIL INCORRECTOS \n";
                }
            }

        }
        else
        {
            //TODO BIEN, SE ENCONTRO UNA SESION ACTIVA
            echo "SESION ACTIVA \n";
        }
    }
?>