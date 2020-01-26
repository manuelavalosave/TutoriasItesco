<?php session_start();

if ($_SESSION['usuario']['3'] == '3') {
    include_once '../plantillas/doc-declaracion.inc.php';
    include_once '../plantillas/navbar.inc.php';
    include_once '../app/post.php';
    include_once '../app/op_alumno_esc_mensaje.php';
}else {
    session_destroy();
    header('Location: ../inicioSesion.php');
}
print_r($_SESSION['usuario'][4]);
?>

<div class="container" style="padding-bottom: 30px;">
    <div class="row" style="margin-top: 30px;margin-bottom: 30px;">
        <div class="col-md-9">
           <div style="padding-bottom: 5px;"><a href="buzon.php" class="h4 btn btn-sm btn-outline-primary">Regresar</a></div>
            <div id="chat" class="card" style="border-color: #e67e22;">
                <div class="card-header h3 text-white" style="background-color: #e67e22;">Nuevo Mensaje</div>
                <div class="card-body">
                	<form name="mensaje_nuevo" action="../app/op_alumno_esc_mensaje.php" method="POST">
                		<div class="input-group">
                			<span class="input-group-addon">Asunto:</span>
                			<input type="text" name="titulo" class="form-control">
                		</div>
                		<input type="text" name="emisor" hidden value="<?php echo $_SESSION['usuario']['0']; ?>">
                		<br>
                		<div class="input-group">
                			<span class="input-group-addon" for="para">Para:</span>
                			<select class="custom-select text-capitalize" name="receptor">
                				<?php foreach ($usuarios as $usuario): ?>
                					<?php if ($usuario['tipo'] == "2"): ?>
                                        <option value="<?php echo $usuario['id']; ?>">Tutor</option>
                                        <?php else: ?>
                                            <option value="<?php echo $usuario['id']; ?>"><?php echo $usuario['nombre']; ?></option>
                                    <?php endif ?>
                                <?php endforeach ?>
                			</select>
                            <br>
                		</div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon">Contenido</span>
                            <textarea class="form-control" name="mensaje" style="height: 120px; max-height: 120px;"></textarea>
                        </div>
                        <br>
                        <input type="submit" name="enviar" class="btn btn-info" value="Enviar">
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