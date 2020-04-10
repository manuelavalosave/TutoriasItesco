<?php
session_start();
ini_set('display_errors', 0);
error_reporting(E_ERROR | E_WARNING | E_PARSE);
if ($_SESSION['usuario']['3'] == '1') {
    include_once '../plantillas/doc-declaracion.inc.php';
    include_once '../plantillas/navbar_admin.inc.php';
    include_once '../app/post.php';
    require_once '../app/conexion.php';
  
}else {
    session_destroy();
    header('Location: ../inicioSesion.php');
}
$conexion = conexion($db_config);

$statement = $conexion->prepare("SELECT * FROM mensajes WHERE receptor = :id_usuario");
$statement->execute(array(":id_usuario" => $_SESSION['usuario']['0']));
$mensajes =$statement->fetchAll();
$stat2 = $conexion->prepare("SELECT * FROM mensajes WHERE emisor = :id_usuario ORDER BY `mensajes`.`fecha` DESC");
$stat2->execute(array(":id_usuario" => $_SESSION['usuario']['0']));
$enviados =$stat2->fetchAll();

?>
<div class="container">
   <?php if ($_GET['a']==1): ?>
   <div class="alert alert-success">¡¡El mensaje se ha enviado correctamente!!</div>
   <?php endif ?>
    <div class="row" style="margin-top: 30px;margin-bottom: 30px;">
        <div class="col-md-9">
            <div id="chat" class="card" style="border-color: #e67e22; max-height: 400px;">
                <div class="card-header h3 text-white" style="background-color: #e67e22;">Buzón de Correo</div>
                <div class="card-body" style="overflow-y: scroll;">
                    <a href="escribir_mensaje.php" class="btn btn-outline-info">Escribir Mensaje</a>
                    <br> <br>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#recibidos" role="tab" aria-controls="home" aria-selected="true">Recibidos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#enviados" role="tab" aria-controls="profile" aria-selected="false">Enviados</a>
                        </li>
                    </ul>
                    <br>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="recibidos" role="tabpanel" aria-labelledby="home-tab">
                           <h2>Mensajes Recibidos:</h2>
                            <?php if (empty($mensajes)): ?>
                            <p class="text-muted text-center h4">No tienes mensajes nuevos.</p>    
                            <?php endif ?>
                            <!-- ESPACIO PARA VER LOS MENSAJES -->
                            <?php foreach ($mensajes as $mensaje): ?>
                            <a href="mensaje.php?id=<?php echo $mensaje['id_mensaje'];?>" class="card border-secondary post">
                                <div class="card-body text-dark">
                                    <div class="row">
                                        <div class="col-8 h4 card-text text-capitalize text-azul">De: <?php $user = obtener_usuario($mensaje['emisor'],$conexion); echo $user['nombre']; ?></div>
                                        <div class="card-text col-4 text-muted"><strong class="text-azul">Fecha: </strong><?php echo strftime("%d de %B del %G, %H:%M %p", strtotime($mensaje['fecha'])); ?></div>   
                                    </div>
                                    <div class="card-text">"<?php echo $mensaje['titulo'] ?>"</div>
                                    <div class="card-text text-muted"><?php echo substr($mensaje['mensaje'], 0, 90).'...'; ?></div>
                                </div>
                            </a>
                            <br>
                            <?php endforeach ?>
                        </div>
                        
                        <div class="tab-pane fade" id="enviados" role="tabpanel" aria-labelledby="home-tab">
                        <h2>Mensajes Enviados:</h2>
                        <?php if (empty($enviados)): ?>
                        <p class="text-muted text-center h4">No tienes mensajes nuevos.</p>    
                        <?php endif ?>
                        <!-- ESPACIO PARA VER LOS MENSAJES -->
                        <?php foreach ($enviados as $enviado): ?>
                        <a href="mensaje.php?id=<?php echo $enviado['id_mensaje'];?>" class="card border-secondary post">
                            <div class="card-body text-dark">
                                <div class="row">
                                    <div class="col-8 h4 card-text text-capitalize text-azul">Para: <?php $user = obtener_usuario($enviado['receptor'],$conexion); echo $user['nombre']; ?></div>
                                    <div class="card-text col-4 text-muted"><strong class="text-azul">Fecha: </strong><?php echo strftime("%d de %B del %G, %H:%M %p", strtotime($enviado['fecha'])); ?></div>   
                                </div>
                                <div class="card-text">"<?php echo $enviado['titulo'] ?>"</div>
                                <div class="card-text text-muted"><?php echo substr($enviado['mensaje'], 0, 90).'...'; ?></div>
                            </div>
                        </a>
                        <br>
                    <?php endforeach ?>
                        </div> 
                    </div>
            </div>
        </div>
        </div>
        <?php include_once '../plantillas/Ad-menu.inc.php'; ?>
    </div>
</div>
<?php
include_once '../plantillas/doc-cierre.inc.php';
?>
