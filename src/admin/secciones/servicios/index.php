<?php 

include("../../bd.php");

if(isset($_GET['txtID'])){

    $txtID=( isset($_GET['txtID']) ) ?$_GET['txtID']:"";
    $sentencia=$conexion->prepare("DELETE FROM tbl_ofrecemos WHERE id=:id ");
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();  
}  

$sentencia=$conexion->prepare("SELECT * FROM`tbl_ofrecemos`");
$sentencia->execute();
$lista_servicios=$sentencia->fetchAll(PDO::FETCH_ASSOC);




include("../../templates/header.php");?>
<div class="card">
    <div class="card-header">
    <a name=""id=""class="btn btn-primary"href="crear.php"role="button">Agregar registro</a>
       
    </div>
    <div class="card-body">
       <div
        class="table-responsive"
       >
        <table class="table"
        >
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Icono</th>
                    <th scope="col">Título</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Acción</th>


                </tr>
            </thead>
            <tbody>
                <?php foreach($lista_servicios as $registro){?>
                <tr class="">
                    <td><?php echo $registro['ID'];?></td>
                    <td><?php echo $registro['icono'];?></td>
                    <td><?php echo $registro['titulo'];?></td>
                    <td><?php echo $registro['descripcion'];?></td>
                    <td>
                    <a name="" id="" class="btn btn-info" href="editar.php?txtID=<?php echo $registro['ID'];?>" role="button">Editar</a>
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