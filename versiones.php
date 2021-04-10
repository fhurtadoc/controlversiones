<?php
include_once('conexion.php');
$db=new Conexion; 

function rename_files($directorio, $oldname, $newName){

    rename($directorio.trim(strtolower($oldname)),$directorio.trim(strtolower($newName)));            

  }

$radicado=$_GET["radicado"];    
if(isset($_FILES["version"])){
    $new_name="";
    $prueba="";
    $directorio="bodega/";
    $corte=explode(".", $radicado);
    $nombre=$corte[0];
    $extencion=$corte[1];
    $versions=[];
    $querySelect_version="SELECT version_radicado FROM borrador WHERE radicado='$radicado'";
    $rSelectVersion=$db->consulta($querySelect_version);
    if( empty($rSelectVersion[0]["version_radicado"])){
        $prueba="entro";
        $new_name=$nombre."_v0.".$extencion;
        $versions["0"]=$new_name;
        //array_push($versions, $new_name);
        rename_files($directorio,  $radicado, $new_name);
        $obj_json=json_encode($versions);
        $query_version="UPDATE borrador SET version_radicado ='$obj_json' WHERE radicado = '$radicado'";
        $rs=$db->insert($query_version);
        $bien2=move_uploaded_file($_FILES['version']['tmp_name'],$directorio.trim(strtolower($radicado)));      
    }else{
        $jsonSelect=json_decode($rSelectVersion[0]["version_radicado"]);
        for($i=0; $i<=count($jsonSelect); $i++){
            $num_version=$i;
            $new_name=$nombre."_v".$num_version++.".".$extencion;
            $versions[$i]=$new_name;
            
        }
        foreach ($versions as $value) {
            rename_files($directorio,  $radicado, $new_name);            
        }


        //rename_files($directorio,  $radicado, $new_name);
        $bien2=move_uploaded_file($_FILES['version']['tmp_name'],$directorio.trim(strtolower($radicado)));      
        $obj_json=json_encode($versions);
        $query_version="UPDATE borrador SET version_radicado ='$obj_json' WHERE radicado = '$radicado'";
        $rs=$db->insert($query_version);
    }
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Version </title>

</head>
<body>
    <h1><?php print_r($versions); ?></h1>
        <form action="versiones.php?radicado=<?php echo $radicado; ?>" method="post" enctype="multipart/form-data">
            <label for="version">suba el borrador</label>
            <input type="file" name="version" id="version">
            <input type="submit" value="enviar">
        </form>    
</body>
</html>















