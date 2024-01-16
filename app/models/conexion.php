<?php
include "../bd/config.php";
class conexion{
    
    protected $conexion;
    public function __construct()
    {
        try 
        {
            $this->conexion = new PDO('mysql:host=' . HOST . ';dbname=' . DATABASE . ';port=' . PORT . ';charset=' . CHARSET, USERNAME, PASSWORD);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conexion;
        } catch (PDOException $e) 
        {
            exit("<h2><br>Fichero: " . $e->getFile() . "<br>Línea: " . $e->getLine() . "<br>Error: " . $e->getMessage() . "</h2>");
        }
    }
}
?>