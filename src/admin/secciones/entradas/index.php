<?php 
include("../../bd.php");

//borrado registro con el ID
if(isset($_GET['txtID'])){
    $txtID = (isset($_GET['txtID']))? $_GET['txtID'] : "";

    $sentencia=$conexion->prepare("SELECT imagen FROM tbl_entradas WHERE id=:id ");
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();
    $registro_imagen=$sentencia->fetch(PDO::FETCH_LAZY); 

    if(isset( $registro_imagen["imagen"])){
        if(file_exists("../../../assets/img/about/".$registro_imagen["imagen"])){
            unlink("../../../assets/img/about/".$registro_imagen["imagen"]);
        }
    }
    

    $sentencia=$conexion->prepare("DELETE FROM tbl_entradas WHERE id=:id ");
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();
}

//seleccionar registro
$sentencia=$conexion->prepare("SELECT * FROM tbl_entradas");
$sentencia->execute();
$lista_entradas=$sentencia->fetchAll(PDO::FETCH_ASSOC);

include("../../templates/header.php");
?>

<div class="card">
    <div class="card-header"> <a name=""id=""class="btn btn-primary"href="crear.php"role="button">Agregar registro</a>
       </div>
    <div class="card-body">
    
    </div>
<div
    class="table-responsive"
>
    <table
        class="table table-primary"
    >
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Fecha</th>
                <th scope="col">Título</th>
                <th scope="col">Descripción</th>
                <th scope="col">Imagen</th>
                <th scope="col">Acciones</th>


            </tr>
        </thead>
        <tbody>
        <?php foreach($lista_entradas as $registro){?>
            <tr class="">
                <td><?php echo $registro['ID'];?></td>
                <td><?php echo $registro['fecha'];?></td>
                <td><?php echo $registro['titulo'];?></td>
                <td><?php echo $registro['descripcion'];?></td>
                <td><img width="50" src="../../../assets/img/about/<?php echo $registro['imagen'];?>"/></td>
                <td scope="col"> <a name="" id="" class="btn btn-info" href="editar.php?txtID=<?php echo $registro['ID'];?>" role="button">Editar</a>
                    <a name="" id="" class="btn btn-danger" href="index.php?txtID=<?php echo $registro['ID'];?>" role="button">Eliminar</a>
                    </td>
            </tr>
            <?php }?>
        </tbody>
    </table>
</div>

</div>




<?php include("../../templates/footer.php");?>