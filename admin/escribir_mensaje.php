<?php session_start();

if ($_SESSION['usuario']['3'] == '1') {
    include_once '../plantillas/doc-declaracion.inc.php';
    include_once '../plantillas/navbar_admin.inc.php';
    include_once '../app/post.php';
    include_once '../app/op_admin_esc_mensaje.php';
}else {
    session_destroy();
    header('Location: ../inicioSesion.php');
}

?>

<div class="container">
    <div class="row" style="margin-top: 30px;margin-bottom: 30px;">
        <div class="col-md-9">
            <div id="chat" class="card" style="border-color: #e67e22;">
                <div class="card-header h1 text-white" style="background-color: #e67e22;">Nuevo Mensaje</div>
                <div class="card-body">
                	<form name="mensaje_nuevo" action="../app/op_admin_esc_mensaje.php" method="POST">
                		<div class="input-group">
                			<span class="input-group-addon">Asunto:</span>
                			<input type="text" name="titulo" class="form-control">
                		</div>
                		<input type="text" name="emisor" hidden value="<?php echo $_SESSION['usuario']['0']; ?>">
                		<br>
                		<div class="input-group">
                			<span class="input-group-addon" for="para">Para:</span>
                			<select class="text-capitalize custom-select" name="receptor">
                				<?php foreach ($usuarios as $usuario): ?>
                					<option value="<?php echo $usuario['id']; ?>"><?php echo $usuario['nombre']; ?></option>
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
        <?php include_once '../plantillas/Ad-menu.inc.php'; ?>
    </div>
</div>
<?php
include_once '../plantillas/doc-cierre.inc.php';
?>