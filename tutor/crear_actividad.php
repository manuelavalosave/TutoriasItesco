<?php session_start();

if ($_SESSION['usuario']['3'] == '2') {
    include_once '../plantillas/doc-declaracion.inc.php';
    include_once '../plantillas/navbar_tutor.inc.php';
    include_once '../app/conexion.php';
    include_once '../app/op_tutor_crear_act.php';
}else {
    session_destroy();
    header('Location: ../inicioSesion.php');
}

?>

<div class="container">
    <div class="row" style="margin-bottom: 30px; margin-top: 20px">
        <div class="col-md-9">
          <?php if(!empty($alert)): ?>
          <div class="alert alert-success"><?php echo $alert ?></div>
          <?php endif ?>
           <div style="padding-bottom: 5px;"><a href="T-centro_act.php?g=<?php echo $_GET['g']; ?>" class="h4 btn btn-sm btn-outline-primary">Regresar</a></div>
            <div id="chat" class="card" style="border-color: #3498db;">
                <div class="card-header h3 text-white" style="background: #3498db">Generar Actividad</div>
                <div class="card-body">
                	<form name="actividad-new" enctype="multipart/form-data" action="../app/op_tutor_crear_act.php" method="POST">
                	<input  name="g"  value="<?php echo $_GET['g']; ?>" type="hidden">
                	<?php if(!empty($act)):?>
                	<div class="input-group">
                            <span class="input-group-addon">Título de la Actividad</span>
                            <input type="text" name="titulo" class="form-control" value="<?php echo $act['titulo']?>" required>
                        </div>
                        <br>
                        <div class="text-rojo" style="font-size:12px">*Opcional: si no desea cambiar el archivo subido anteriormente, puede dejarlo vacío.</div>
                        <div class="input-group">
                           <span class="input-group-addon"><i class="material-icons">attach_file</i></span>
                           <input type="file" accept=".pdf,.zip,.rar" name="archivo" id="archivo" placeholder="<?php echo $act['archivo']?>" class="form-control" value="<?php echo $act['archivo']?>">
                        </div>
                        <div class="text-azul" style="font-size:12px">*Formatos aceptados: .pdf, .zip, .rar</div>
                        <br>
                        <label for="descripcion">Descripción de la actividad:</label>
                        <textarea class="form-control" name="descripcion" style="height: 120px; max-height: 120px; min-height: 120px;" required><?php echo $act['descripcion']?></textarea>
                        <br>
                         <br>
                        <label for="descripcion">Materiar a utilizar:</label>
                        <textarea class="form-control" name="material" style="height: 120px; max-height: 120px; min-height: 120px;" required><?php echo $act['descripcion']?></textarea>
                        <br>
                         <br>
                        <label for="descripcion">Observacion:</label>
                        <textarea class="form-control" name="Observacion" style="height: 120px; max-height: 120px; min-height: 120px;" required><?php echo $act['descripcion']?></textarea>
                        <br>
                        <label for="descripcion">Descripción de la actividad:</label>
                        <textarea class="form-control" name="descripcion" style="height: 120px; max-height: 120px; min-height: 120px;" required><?php echo $act['descripcion']?></textarea>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon">Fecha de Entrega:</span>
                            <input type="date" name="entrega" class="form-control" value="<?php echo $act['fecha_entrega']?>" required>
                        </div>
                        <br>
                        <input name="act" type="text" value="<?php echo $_GET['id']?>" hidden>
                        <div class="text-right">
                            <input type="submit" name="editar" class="btn btn-outline-primary" value="Editar">
                        </div>
                        <?php else: ?>
                        <div class="input-group">
                            <span class="input-group-addon">Título de la Actividad</span>
                            <input type="text" name="titulo" class="form-control" required>
                        </div>
                        <br>
                        <div class="text-rojo" style="font-size:12px">*Opcional: Dejar vacío si no desea subir un archivo.</div>
                        <div class="input-group">
                           <span class="input-group-addon"><i class="material-icons">attach_file</i></span>
                           <input type="file" accept=".pdf" name="archivo" id="archivo" class="form-control">
                        </div>
                        <div class="text-azul" style="font-size:12px">*Formatos aceptados: .pdf, .zip, .rar</div>
                        <br>
                        <label for="descripcion">Descripción de la actividad:</label>
                        <textarea class="form-control" name="descripcion" style="height: 120px; max-height: 120px; min-height: 120px;" required></textarea>
                        <br>
                          <label for="descripcion">Objetivo de la actividad:</label>
                        <textarea class="form-control" name="objetivo" style="height: 120px; max-height: 120px; min-height: 120px;" required></textarea>
                        <br>
                         <br>
                        <label for="descripcion">Materiar a utilizar:</label>
                        <textarea class="form-control" name="material" style="height: 120px; max-height: 120px; min-height: 120px;" required></textarea>
                        <br>
                         <br>
                        <label for="descripcion">Observacion:</label>
                        <textarea class="form-control" name="Observacion" style="height: 120px; max-height: 120px; min-height: 120px;" required></textarea>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon">Fecha de Entrega:</span>
                            <input type="date" name="entrega" class="form-control" required>
                        </div>
                        <br>
                        <div class="text-right">
                            <input type="submit" name="enviar" class="btn btn-outline-primary" value="Publicar">
                        </div>
                	<?php endif ?>
                	</form>
                </div>
            </div>
        </div>
        <?php include_once '../plantillas/T-menu.inc.php'; ?>
    </div>
</div>
<?php
include_once '../plantillas/doc-cierre.inc.php';
?>