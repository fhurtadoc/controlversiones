<?php
class Conexion {
    private $host = "localhost";
    private $usuario= "pruebaversion";
    private $clave= "123";
    private $db= "versionesPrueba";
    public $conexion; 

    public function __construct(){
        $this->conexion=new mysqli($this->host, $this->usuario, $this->clave, $this->db);
    }

   public function consulta($query){

    $resultardo=$this->conexion->query($query);    
    return $resultardo->fetch_all(MYSQLI_ASSOC);    

   }


   public function insert($query){
    
    $resultardo=$this->conexion->query($query);
    return $resultardo;    
   } 
}


?> 