<?php        
include_once('conexion.php');


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">    
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    
    
    <title>Versiones</title>
</head>
<body>
    <h1>subir Borrador</h1>
    <form action="newRadicado.php" method="post" enctype="multipart/form-data" >
    <label for="version">suba el borrador</label>
    <input type="file" name="version" id="version">
    <input type="submit" value="enviar">
    </form>

    <script>

    function Versiones(){
        let listString=""
        let listRadicados=[]; 
        let chekets=document.querySelectorAll("#check_value");
        for(i=0;i<chekets.length;i++)
        if(chekets[i].checked===true){
            for( let radicado of chekets){
            listString=listString+radicado.value+"</br>";
            listRadicados.push(radicado.value);
            }

        window.open("Allversiones.php?listRadicados="+listRadicados,"MIS BORRADORES BORRADOS","height=400,width=1000,scrollbars=yes,top=300,left=100");    
        }else{
            Swal.fire({
                title:"POR FAVOR SELECCIONE UN BORRADOR" 
            })
        }        
        
        
      
    }
    
    
    </script>

    <button id=boton Onclick=Versiones() > Ver versiones</button>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Radicado</th>
                <th>Check</th>
            </tr>
            
        </thead>
                <?php  
                $db=new Conexion;
                $query="SELECT * FROM borrador";
                $consult=$db->consulta($query);                
                foreach ($consult as $key => $value):                    
                ?>        
        <tbody>
              <tr>
                <td> <?php echo $value['id'];?> </td>    
                <td> <a href="bodega/<?php echo $value['radicado'];?>"><?php echo $value['radicado'];?></a></td>
                <td><input type="checkbox" name="check_value" id="check_value" value=<?php echo $value['radicado'];?>></td>
                <td><a href="versiones.php?radicado=<?php echo $value['radicado'];?>">Editar</a></td>                                                
              </tr>        
        </tbody>
                <?php endforeach ?>        
    
    
    </table>





</body>
</html>

