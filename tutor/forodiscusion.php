<?php
session_start();
if ($_SESSION['usuario']['3'] == '2') {
    include_once '../plantillas/doc-declaracion.inc.php';
    include_once '../plantillas/navbar_tutor.inc.php';
    include_once '../app/post.php';
}else{
    session_destroy();
    header('Location: ../inicioSesion.php');
}

$conexion = conexion($db_config);

$pagina_actual = isset($_GET['p']) ? (int)$_GET['p'] : 1;
$posts = obtener_post(3,$conexion);
$total_art = $conexion->query('SELECT FOUND_ROWS() as total');
$total_art = $total_art->fetch()['total'];
$num_pag = ceil($total_art / 3);

?>
<div class="container">
   <?php if($_GET['a'] == 1):?>
    <div class="alert alert-success alert-dissmissible fade show" style="margin-top:20px" role="alert">¡Publicación creada!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
    <?php elseif($_GET['a'] == 2): ?>
    <div class="alert alert-danger alert-dissmissible fade show" style="margin-top:20px" role="alert">¡Publicación eliminada!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
    <?php endif ?>
    <div class="row" style="margin-top: 30px;margin-bottom: 30px;">
        <div class="col-md-9">
            <div class="card" style="border-color: #e67e22">
                <div class="card-header text-light" style="background-color: #e67e22"><span class="h3">Foro de Discusión</span></div>
                <div class="card-body">
                    <a href="escribir_post.php" class="btn btn-outline-primary">Escribir Publicación</a>
                    <br>
                    <br>
                    <?php if (!empty($posts)): ?>
                        <?php foreach ($posts as $post): ?>
                            <a href="post.php?id=<?php echo $post['id_post'];?>" class="card post text-carbon">
                                <div class="card-body">
                                    <div class="row">
                                        <?php if (empty($post['imagen'])):?>
                                        <div class="col-md-12">
                                            <h3 class="card-title text-azul"><?php echo $post['titulo']?></h3>
                                            <p class="card-text"><?php echo substr($post['contenido'], 0, 180).'...';?></p>
                                        </div>
                                        <?php else: ?>
                                        <div class="col-md-2"><img src="../img/post/<?php echo $post['imagen'];?>" alt="" class="card-img"></div>
                                        <div class="col-md-10">
                                            <h3 class="card-title text-azul"><?php echo $post['titulo']?></h3>
                                            <p class="card-text"><?php echo substr($post['contenido'], 0, 180).'...';?></p>
                                        </div>
                                        <?php endif ?> 
                                    </div>
                                </div>
                                <div class="card-footer text-muted">
                                    <div class="row">
                                        <div class="col-6 text-left text-capitalize"><strong class="text-azul">Publicado por: </strong><?php $user = obtener_usuario($post['id_usuario'],$conexion); echo $user['nombre']; ?></div>
                                        <div class="col-6 text-right" ><strong class="text-azul">Fecha: </strong> <?php echo strftime("%d de %B del %G, %H:%M %p", strtotime($post['fecha_pub'])); ?></div>
                                    </div>
                                </div>
                            </a>
                            <br>
                        <?php endforeach ?>
                        <hr>
                        <div class="row">
                        <?php if ($pagina_actual > 1): ?>
                            <div class="col-sm text-left"><a href="forodiscusion.php?p=<?php echo pagina_actual() - 1; ?>" class="btn btn-secondary">Página Anterior</a>
                        
                        <?php endif ?>
                            <div class="col-sm text-center">Página <?php echo $pagina_actual?> de <?php echo $num_pag?></div>
                        <?php if ($pagina_actual < $num_pag): ?>
                            <div class=" col-sm text-right"><a href="forodiscusion.php?p=<?php echo pagina_actual() + 1; ?>" class="btn btn-secondary">Siguiente Página</a>
                        
                        <?php endif ?>
                        </div><!-- encuentrale lugar a este div-->
                        <?php else: ?>
                        <p class="text-muted h4">Aun no hay publicaciones...</p>                    
                        <?php endif ?>
                    </div>
                </div>
            </div>
        <?php include_once '../plantillas/T-menu.inc.php'; ?>
    </div>
</div>
<?php
include_once '../plantillas/doc-cierre.inc.php';
?>