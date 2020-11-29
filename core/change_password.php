<?php
    include("../core/config/include.php");
    include("../core/model/models.php");

    $usuario = new Usuario();
    $usuario->email = ssql($_POST['email']);

    $usuario = $usuario->getByEmail();

    if(is_null($usuario))
    {
        //NO ENCONTRADO
        echo "USUARIO NULL ";
        header("Location: ../index.php");	
    }
    else
    {
        //ENCONTRADO
        $control_password = new ControlPassword();

        $control_password->fk_usuario = $usuario->idusuario;
        if(is_null($control_password))
        {
            //NO SE ENCONTRO
            echo "USUARIO NO ENCONTRADO";
            header("Location: ../index.php");	
        }
        else
        {
            ////SE ENCONTRO
            $password = password_hash(ssql($_POST['password']), PASSWORD_DEFAULT);
            $control_password->update();

            $control_password->fk_usuario =  $usuario->idusuario;
            $control_password->password = $password;
            $control_password->add();

            echo "PASSWORD ACTUALIZADO";
            header("Location: ../index.php");	
        }
    }
?>