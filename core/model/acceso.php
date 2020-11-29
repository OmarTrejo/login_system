<?php

class Acceso
{    
    public static $table_name = "acceso";

    public function __construct()
    {
        $this->idacceso = "";
        $this->fk_usuario = "";
        $this->fecha_registro = 1;    
        $this->estatus  = true;    
    }        

    public function add()
    {
        $query = insertsql("INSERT INTO ".self::$table_name." SET fecha_registro = NOW(), fk_usuario = '$this->fk_usuario' , estatus = '$this->estatus'");
        return $query;//regresa el id registrado
    }

    public static function getByUsuario($id)
    {
        $query = "SELECT * FROM ".self::$table_name." WHERE fk_usuario IN ('$id') AND estatus = 1;";
        return Model::one($query, new Acceso());//ONE OBTIENE SOLO UN REGISTRO
    }    
}

?>