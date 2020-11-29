<?php

    include("../core/config/include.php");
    include("../core/model/models.php");
    
    $usuario = new Usuario();
    $usuario->nombre = ssql($_POST['name']);
    $usuario->email = ssql($_POST['email']);
    $usuario->telefono = ssql($_POST['phone']);

    //VALIDAR QUE NO HAYA SIDO UN EMAIL IGUAL
    if(is_null($usuario->getByEmail()))
    {
        //SE ENCONTRO
        // echo "NO ENCNTRADO";
        $id_usuario = $usuario->add();
        $control_password = new ControlPassword();
        $control_password->fk_usuario = $id_usuario;
        $control_password->password = password_hash(ssql($_POST['password']),PASSWORD_DEFAULT);
        echo "USUARIO REGISTRADO CON ÉXITO \n";
        header("Location: ../index.php");	
    }
    else
    {
        //NO SE ENCONTRO
        echo "ENCONTRADO";
        header("Location: ../index.php");	
    }
?>