<?php
include_once('conexion.php');
$db=new Conexion; 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="estilos.css">

    <style>
*{
    margin:0;
    padding:0;
    box-sizing: border-box;
    
}
body{
    background: #eeeeef;
}

header{    
    background: #404040;
    color: #eeeeef;    
}
h2{    
    margin-top:0px;
}

#menu ul{
    background: #eeeeef;
    display:flex;
    list-style:none;

} 

#menu ul ul{
    display:none;
    color: #eeeeef;
}
#menu a {
    display:block;
    padding: 15px 20px;
    color:#404040;
    text-decoration:none;
    font-size:15px;
}
#menu a:hover{
    background: rgba(0,0,0,0.3);
    color:#eeeeef;

}
#menu ul li:hover ul {
    display:block;    
    color: #eeeeef;
}
</style>	


</head>
<body>
<ul id="menu">
<?php
$res="";
if(isset($_GET['listRadicados'])):
    $lista=$_GET["listRadicados"];    
    $allVersions=[];
    $alllist=explode(",", $lista);    
    foreach ($alllist as $value):         
        $query="SELECT version_radicado FROM borrador WHERE radicado='$value'";
        $res=$db->consulta($query);
        $veriones=$res[0]["version_radicado"];
        $arreglo=json_decode($veriones);
    ?>
    
    <button type="button" class="btn btn-default dropdown-toggle"
          data-toggle="dropdown">
          <?php echo  $value; ?> <span class="caret"></span>
  </button>    
        
    <?php
        foreach ($arreglo as $version):
    ?> 
    <ul>
       
    <li><input type="checkbox" name="list" id="nivel2-1"><label for="nivel2-1">  <a href="bodega/<?php echo  $version; ?>"><?php echo  $version; ?></a> </label></li>        

    
        
        
    
    
    <?php endforeach ?>   

    </ul> 
    <?php endforeach ?>       

<?php endif ?>

</ul>

</body>
</html>

