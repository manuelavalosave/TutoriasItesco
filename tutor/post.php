<?php session_start();

if ($_SESSION['usuario']['3'] == '2') {
    include_once '../plantillas/doc-declaracion.inc.php';
    include_once '../plantillas/navbar_tutor.inc.php';
    require_once '../app/post.php';
    include_once '../app/op_tutor_post.php';
}else{
    session_destroy();
    header('Location: ../inicioSesion.php');
}

?>
<div class="container">
    <div class="row" style="margin-top: 30px;margin-bottom: 30px;">
        <div class="col-md-9">
           <div style="padding-bottom: 5px;"><a href="forodiscusion.php" class="h4 btn btn-sm btn-outline-primary">Regresar</a></div>
            <div class="card">
                <div class="card-header text-light text-center" style="background-color: #e67e22"><span class="h3">"<?php echo $post['titulo']; ?>"</span></div>
                <div class="card-body">
                   <div class="text-right">
                       <form name="eliminar_post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
                          <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#mod-borrar">
                          Eliminar Post
                          </button>
                          
                            <div class="modal fade" id="mod-borrar" tabindex="-1" role="dialog" aria-labelledby="mod-borrar" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header bg-danger text-white">
                                    <h5 class="modal-title" id="mod-borrar">¿Está seguro que desea eliminar el post?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body text-justify">
                                    Esta acción no se puede recuperar...
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
                                    <input class="btn btn-outline-danger" name="borrar" type="submit" value="Eliminar">
                                    <input name="id" type="text" value="<?php echo $id?>" hidden>
                                  </div>
                                </div>
                              </div>
                            </div>
                          
                           <!--<input class="btn btn-sm btn-outline-danger" name="borrar" type="submit" value="Eliminar post">
                           <input name="id" type="text" value="<?php echo $id?>" hidden>-->
                       </form>
                   </div>
                   <br>
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
                            <form name="coment" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>?id=<?php echo $_GET['id']?>" method="POST" class="form-group">
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
    <?php include_once '../plantillas/T-menu.inc.php'; ?>
</div>
</div>
<?php
include_once '../plantillas/doc-cierre.inc.php';
?>