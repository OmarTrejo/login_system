<?php

class Usuario
{    
    public static $table_name = "usuario";

    public function __construct()
    {
        $this->id_usuario = "";
        $this->nombre = "";
        $this->email = 1;    
        $this->telefono  = "";    
    }        

    public function add()
    {
        $query = insertsql("INSERT INTO ".self::$table_name." SET nombre = '$this->nombre', email = '$this->email' , telefono = '$this->telefono'");
        return $query;//regresa el id registrado
    }

    public static function getByEmail($email)
    {
        $query = "SELECT * FROM ".self::$table_name." WHERE email IN ('$email');";
        return Model::one($query, new Usuario());//ONE OBTIENE SOLO UN REGISTRO
    }    
}

?>