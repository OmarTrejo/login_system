<?php

class ControlPassword
{    
    public static $table_name = "control_password";

    public function __construct()
    {
        $this->idcontrol_password = "";
        $this->password = "";
        $this->fecha_registro = 1;    
        $this->fk_usuario  = "";    
        $this->estatus  = true;    
    }        

    public function add()
    {
        $query = insertsql("INSERT INTO ".self::$table_name." SET fecha_registro = NOW(), fk_usuario = '$this->fk_usuario' , password = '$this->password', estatus = '$this->estatus'");
        return $query;//regresa el id registrado
    }

    public static function getByUsuario($id)
    {
        $query = "SELECT * FROM ".self::$table_name." WHERE fk_usuario IN ('$id') and estatus = 1;";
        return Model::one($query, new ControlPassword());//ONE OBTIENE SOLO UN REGISTRO
    }   
}

?>