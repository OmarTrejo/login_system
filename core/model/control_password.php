<?php

class ControlPassword
{    
    public static $table_name = "control_password";

    public function __construct()
    {
        $this->id_control_password = "";
        $this->password = "";
        $this->fecha_registro = 1;    
        $this->fk_usuario  = "";    
    }        

    public function add()
    {
        $query = insertsql("INSERT INTO ".self::$table_name." SET fecha_registro = NOW(), fk_usuario = '$this->fk_usuario' , password = '$this->password'");
        return $query;//regresa el id registrado
    }

    public static function getByEmail($email)
    {
        $query = "SELECT * FROM ".self::$table_name." WHERE email IN ('$email');";
        return Model::one($query, new Usuario());//ONE OBTIENE SOLO UN REGISTRO
    }    
}

?>