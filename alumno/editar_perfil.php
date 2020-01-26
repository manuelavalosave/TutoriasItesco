<?php
session_start();
if ($_SESSION['usuario']['3'] == '3') {
  include_once '../plantillas/doc-declaracion.inc.php';
  include_once '../plantillas/navbar.inc.php';
  include_once '../app/post.php';
  require_once '../app/conexion.php';
    include_once '../app/op_alumno_edit_perfil.php';
}else {
    session_destroy();
    header('Location: ../inicioSesion.php');
}

?>
<div class="container">
    <div class="row" style="margin-top: 30px;margin-bottom: 30px;">
        <div class="col-md-9">
           <a href="index.php" class="btn btn-sm btn-wine" style="margin-bottom: 10px;">Regresar</a>
            <div id="chat" class="card" style="border-color: #2ecc71;">
                <div class="card-header h3 text-white" style="background-color: #2ecc71;">Editar Datos Personales</div>
                <div class="card-body">
                    <form name="cambios" action="../app/op_alumno_edit_perfil.php" method="post">
                        <div class="input-group">
                			<span class="input-group-addon">Dirección:</span>
                			<input type="text" name="direccion" class="form-control" placeholder="Calle #, Colonia, Ciudad" value="<?php echo $email['direccion']?>">
                		</div>
                       <p></p>
                        <div class="input-group">
                			<span class="input-group-addon">Teléfono de Contacto:</span>
                			<input type="text" name="num_tel" class="form-control" placeholder="000-000-0000" maxlength="10" onkeyup="this.value=Numeros(this.value)" value="<?php echo $email['num_tel']?>">
                		</div>
                       <p></p>
                        <div class="input-group">
                			<span class="input-group-addon">Email:</span>
                			<input type="email" name="email" class="form-control" placeholder="correo@email.com" value="<?php echo $email['email']?>">
                		</div>
                       <p></p>
                        <div class="text-right"><input name="guardar" type="submit" class="btn btn-outline-success" value="Guardar Cambios"></div>
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