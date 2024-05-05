<?php 
include("../../bd.php");

//seleccionar registro
$sentencia=$conexion->prepare("SELECT * FROM `tbl_equipo`");
$sentencia->execute();
$lista_entradas=$sentencia->fetchAll(PDO::FETCH_ASSOC);

include("../../templates/header.php");
?>

<div class="card">
    <div class="card-header"> <a name=""id=""class="btn btn-primary"href="crear.php"role="button">Agregar registro</a></div>
    <div class="card-body">
    <div
        class="table-responsive"
    >
        <table
            class="table table"
        >
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">nombrecompleto</th>
                    <th scope="col">puesto</th>
                    <th scope="col">Facebook</th>
                    <th scope="col">Acciones</th>

                </tr>
            </thead>
            <tbody>
                <tr class="">
                    <td>1</td>
                    <td>imagen.jpg</td>
                    <td>JOSE</td>
                    <td>CEO</td>
                    <td>Facebook</td>
                    <td>Editar | Eliminar</td>


                </tr>
            </tbody>
        </table>
    </div>
    
    </div>
    <div class="card-footer text-muted"></div>
</div>



<?php include("../../templates/footer.php");?>