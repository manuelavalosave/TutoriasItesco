<?php session_start();

if ($_SESSION['usuario']['3'] == '3') {
    include_once '../plantillas/doc-declaracion.inc.php';
    include_once '../plantillas/navbar.inc.php';
    require_once '../app/op_alumno_pub_post.php';
}else {
    session_destroy();
    header('Location: ../inicioSesion.php');
}

?>
<div class="container">
    <div class="row" style="margin-top: 30px;margin-bottom: 30px;">
        <div class="col-md-9">
           <div style="padding-bottom: 5px;"><a href="forodiscusion.php" class="h4 btn btn-sm btn-outline-primary">Regresar</a></div>
            <div class="card">
                <div class="card-header text-light" style="background-color: #e67e22"><span class="h3">Nuevo Post</span></div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="../app/op_alumno_pub_post.php">
                        <div class="input-group">
                            <span class="input-group-addon">Título del Post</span>
                            <input type="text" name="titulo" id="titulo" class="form-control" required>
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon">Imagen</span>
                            <input type="file" name="imagen" accept="image/*" id="imagen" class="form-control">
                        </div>
                        <br>
                        <label>Contenido del mensaje</label>
                        <textarea class="form-control" name="contenido" id="contenido" style="height: 200px;" required></textarea>
                        <br>
                        <?php if (isset($error)): ?>
                            <p class="error"><?php echo $error; ?></p>
                        <?php endif ?>
                        <br>
                        <div class="text-right"><input type="submit" name="publicar" class="btn btn-primary" value="Publicar"></div>
                    </form>
                </div>
            </div>
        </div>

        <?php include_once '../plantillas/A-menu.inc.php'; ?>

    </div>
</div>
<?php
include_once '../plantillas/doc-cierre.inc.php';
?>