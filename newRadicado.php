<?php
include_once('conexion.php');
$db=new Conexion; 

if(isset($_FILES["version"])){

    //creamos es radicado aleatorio 

    $numero_aleatorio=rand(1000, 100000);
    $namearchivo=$numero_aleatorio.".docx";
    $directorio="bodega/";           
    $bien2=move_uploaded_file($_FILES['version']['tmp_name'],$directorio.trim(strtolower($namearchivo)));
    $query="INSERT INTO borrador (radicado) values ('$namearchivo')";
    $result=$db->insert($query);
        
}else{
    echo "no existe";
}

