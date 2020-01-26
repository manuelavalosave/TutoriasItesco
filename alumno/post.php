<?php session_start();

if ($_SESSION['usuario']['3'] == '3') {
    include_once '../plantillas/doc-declaracion.inc.php';
    include_once '../plantillas/navbar.inc.php';
    require_once '../app/post.php';
    include_once '../app/op_alumno_post.php';
}else {
    session_destroy();
    header('Location: ../inicioSesion.php');
}

?>
<div class="container">
    <?php if (!empty($errores)): ?>
    <div class="alert alert-success alert-dissmissible fade show" role="alert"><?php echo $alert ?> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
    <?php endif ?>
    <div class="row" style="margin-top: 30px;margin-bottom: 30px;">
        <div class="col-md-9">
           <a style="margin-bottom:10px;" href="forodiscusion.php" class="btn btn-sm btn-outline-primary">Regresar</a>
            <div class="card">
                <div class="card-header text-light text-center" style="background-color: #e67e22"><span class="h3"><?php echo $post['titulo']; ?></span></div>
                <div class="card-body">
                    <?php if(!empty($post['imagen'])): ?>
                    <div class="text-center"><img class="img-thumbnail" src="../img/post/<?php echo $post['imagen']; ?>" alt=""></div>
                    <hr>
                    <?php endif ?>
                    <p class="text-justify card-text"><?php echo $post['contenido']; ?></p>
                    <br>
                    <div class="text-right">
                        <p class="text-muted text-capitalize"><strong class="text-azul">Publicado por: </strong><?php $user = obtener_usuario($post['id_usuario'],$conexion); echo $user['nombre']; ?></p>
                        <p class="text-muted"><strong class="text-azul">Fecha: </strong> <?php echo strftime("%d de %B del %G, %H:%M %p", strtotime($post['fecha_pub']))?></p>
                    </div>
                    <hr>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Comentarios:</h3>
                        </div>
                        <div class="card-body">
                            <?php if(empty($comentarios)): ?>
                            <p class="card-text">0 Comentarios</p>
                            <?php else: ?>
                            <?php foreach($comentarios as $comentario):?>
                            <div class="alert alert-light">
                                <strong class="text-capitalize text-azul"><?php $user = obtener_usuario($comentario['id_usuario'],$conexion); echo $user['nombre']; ?>: </strong><?php echo $comentario['comentario']?>
                                <div class="text-right text-azul"><?php echo strftime("%d de %B del %G, %H:%M %p", strtotime($comentario['fec_pub']));?></div>
                            </div>
                            <?php endforeach ?>
                            <?php endif ?>
                            <hr>
                            <form name="coment" action="../app/op_alumno_post.php?id=<?php echo $_GET['id']?>" method="POST" class="form-group">
                                <textarea name="comentario" class="form-control" placeholder="Escribe un comentario..."></textarea>
                                <br>
                                <input name="publicar" type="submit" class="btn btn-primary" value="Publicar">
                                <input name="post" type="text" value="<?php echo $_GET['id']?>" hidden>
                                <input name="id" type="text" value="<?php echo $_SESSION['usuario']['0']; ?>" hidden>
                            </form>    
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php include_once '../plantillas/A-menu.inc.php'; ?>

</div>
</div>
<?php
include_once '../plantillas/doc-cierre.inc.php';
?>