<?php session_start();
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

if (!$conexion) {
    die();
}

$id = isset($_GET['id']) ? (int)$_GET['id'] : false;

if (!$id) {
    header('Location: Ad-buzon.php');
}

$statement = $conexion->prepare("SELECT * FROM mensajes WHERE id_mensaje = :id");
$statement->execute(array(":id"=> $id));
$mensaje = $statement->fetch();

$statement2 = $conexion->prepare("SELECT * FROM mensajes WHERE emisor = :emisor AND receptor = :receptor");
$statement2->execute(array(":emisor" => $mensaje['emisor'], ":receptor" => $mensaje['receptor']));
$anteriores = $statement2->fetchAll();

if (!$mensaje) {
    header('Location: buzon.php');
}

?>

<div class="container">
    <div class="row" style="margin-top: 30px;margin-bottom: 30px;">
        <div class="col-md-9">
           <a href="Ad-buzon.php" class="btn btn-sm btn-outline-primary" style="margin-bottom:10px;">Regresar</a>
            <div id="chat" class="card" style="border-color: #e67e22;">
                <div class="card-header h1 text-white font-italic" style="background-color: #e67e22;">"<?php echo $mensaje['titulo'] ?>"</div>
                <div class="card-body">
                	<div class="card-text text-capitalize">De: <?php $emisor = obtener_usuario($mensaje['emisor'],$conexion); echo $emisor['nombre']; ?></div>
					<div class="card-text text-capitalize">Para: <?php $receptor = obtener_usuario($mensaje['receptor'], $conexion); echo $receptor['nombre']; ?></div>
					<hr>
                    <div class="card-text"><?php echo $mensaje['mensaje'] ?></div>
                    <hr>
                    <div class="text-right">
                        <p class="text-muted">Fecha: <?php echo strftime("%d de %B del %G, %H:%M %p", strtotime($mensaje['fecha'])); ?></p>
                        <a href="escribir_mensaje.php" class="btn btn-info">Responder</a>
                    </div>

                    <!--Pruebas-->
                    <?php if (isset($anteriores)): ?>
                        <hr>
                        <h4 class="text-muted">"Historial:"</h4>
                        <?php foreach ($anteriores as $m): ?>
                            <div class="card card-body text-muted" style="background-color: #fafafa;">
                                <p class="text-capitalize">De: <?php $e = obtener_usuario($m['emisor'],$conexion); echo $e['nombre']; ?></p>
                                <p>Fecha: <?php echo $m['fecha']; ?></p>
                                <p class="text-justify text-muted">"<?php echo $m['mensaje']; ?>"</p>
                            </div>
                            <br>
                        <?php endforeach ?>
                    <?php endif ?>
                    <!--                 -->

                </div>
            </div>
        </div>
        <?php include_once '../plantillas/Ad-menu.inc.php'; ?>
    </div>
</div>
<?php
include_once '../plantillas/doc-cierre.inc.php';
?>