<?php 
include("../../bd.php");

if(isset($_GET['txtID'])){
    $txtID = (isset($_GET['txtID']))? $_GET['txtID'] : "";

    $sentencia=$conexion->prepare("SELECT imagen FROM tbl_portafolio WHERE id=:id ");
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();
    $registro_imagen=$sentencia->fetch(PDO::FETCH_LAZY); 

    if(isset( $registro_imagen["imagen"])){
        if(file_exists("../../../assets/img/portfolio/". $registro_imagen["imagen"])){
            unlink("../../../assets/img/portfolio/". $registro_imagen["imagen"]);
        }
    }
    

    $sentencia=$conexion->prepare("DELETE FROM tbl_portafolio WHERE id=:id ");
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();  
    $mensaje="Registro modificado con éxito";
    header("Location:index.php?mensaje=".$mensaje);
}

$sentencia=$conexion->prepare("SELECT * FROM tbl_portafolio");
$sentencia->execute();
$lista_portafolio=$sentencia->fetchAll(PDO::FETCH_ASSOC);

include("../../templates/header.php");?>

<div class="card">
    <div class="card-header">
    <a name=""id=""class="btn btn-primary"href="crear.php"role="button">Agregar registro</a>
    </div>
    <div class="card-body">
        
    <div
        class="table-responsive-sm"
    >
        <table
            class="table"
        >
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Título</th>
                    
                    <th scope="col">Imagen</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Categoria</th>
                    
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach($lista_portafolio as $registro){?>
                    <tr class="">
                    <td scope="col"><?php echo $registro['ID'];?></td>
                    <td scope="col"><?php echo $registro['titulo'];?>
                    <br> -<?php echo $registro['subtitulo'];?>
                    <br>-<?php echo $registro['url'];?></td>

                    <td scope="col">
                    <img width="50" src="../../../assets/img/portfolio/
                    <?php echo $registro['imagen'];?>"/>
                </td>
                    <td scope="col"><?php echo $registro['descripcion'];?></td>
                    <td scope="col"><?php echo $registro['cliente'];?></td>
                    <td scope="col"><?php echo $registro['categoria'];?></td>
                   
                    <td scope="col"> <a name="" id="" class="btn btn-info" href="editar.php?txtID=<?php echo $registro['ID'];?>" role="button">Editar</a>
                    <a name="" id="" class="btn btn-danger" href="index.php?txtID=<?php echo $registro['ID'];?>" role="button">Eliminar</a>
              </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    

    </div>
   
</div>


<?php include("../../templates/footer.php");?>