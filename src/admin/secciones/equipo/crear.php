<?php 
include("../../bd.php");

if(isset($_POST)){

$imagen = (isset($_FILES["imagen"]["name"]))? $_FILES["imagen"]["name"] : "";

$nombrecompleto=(isset($_POST['nombrecompleto']))?$_POST['nombrecompleto']:"";
$puesto=(isset($_POST['puesto']))?$_POST['puesto']:"";

$facebook=(isset($_POST['facebook']))?$_POST['facebook']:"";

$fecha_imagen = new DateTime();
    $nombre_archivo_imagen=($imagen!="")?$fecha_imagen->getTimestamp()."_". $imagen :"";

    $tmp_imagen = $_FILES["imagen"]["tmp_name"];
    if ($tmp_imagen!="") {
        move_uploaded_file($tmp_imagen, "../../../assets/img/team/". $nombre_archivo_imagen);
    }


$sentencia=$conexion->prepare("INSERT INTO`tbl_equipo`(`ID`,`imagen`,`nombrecompleto`,`puesto`, `facebook`) 
VALUES (NULL,:imagen,:nombrecompleto,:puesto,:facebook);");

$sentencia->bindParam(":imagen", $nombre_archivo_imagen);
$sentencia->bindParam(":nombrecompleto", $nombrecompleto);
$sentencia->bindParam(":puesto", $puesto);
$sentencia->bindParam(":facebook", $facebook);

$sentencia->execute();

}
include("../../templates/header.php");?>

<div class="card">
    <div class="card-header">EQUIPO</div>
    <div class="card-body">

    <form action="" method="post" enctype="multipart/form-data">
       <div class="mb-3">
        <label for="imagen" class="form-label">Imagen:</label>
        <input
            type="file" class="form-control" name="imagen" id="imagen"
            aria-describedby="helpId" placeholder="imagen"/>
       </div>
    <div class="mb-3">
        <label for="nombrecompleto" class="form-label">Nombre Completo:</label>
        <input
            type="text"
            class="form-control" name="nombrecompleto" id="nombrecompleto" aria-describedby="helpId" placeholder="Nombre Completo"/>
    </div>
    <div class="mb-3">
        <label for="puesto" class="form-label">Puesto:</label>
        <input
            type="text"
            class="form-control" name="puesto" id="puesto" aria-describedby="helpId" placeholder="puesto"/>
    </div>
    <div class="mb-3">
        <label for="facebook" class="form-label">Facebook</label>
        <input
            type="text"
            class="form-control" name="facebook" id="" aria-describedby="helpId" placeholder="facebook"/>
    </div>
    <button type="submit" class="btn btn-success">Agregar</button>

    <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
       </form>





    </div>
    <div class="card-footer text-muted"></div>
</div>


<?php include("../../templates/footer.php");?>