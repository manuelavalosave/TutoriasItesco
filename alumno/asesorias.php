<?php
session_start();
if ($_SESSION['usuario']['3'] == '3') {
  include_once '../plantillas/doc-declaracion.inc.php';
  include_once '../plantillas/navbar.inc.php';
  include_once '../app/post.php';
}else {
    session_destroy();
    header('Location: ../inicioSesion.php');
}

$conexion = conexion($db_config);

$BuscarGrupo = $conexion->prepare("SELECT * FROM grupo_periodos WHERE fk_Grupo = :id");
$BuscarGrupo->execute(array(":id" => $_SESSION['usuario']['4']));
$Grupos = $BuscarGrupo->fetch();

$statement = $conexion->prepare("SELECT * FROM entrevistas WHERE id_alumno = :id ORDER BY fecha DESC");
$statement->execute(array(":id" => $_SESSION['usuario']['0']));
$resultado = $statement->fetchAll();
print_r($resultado);
$BuscarH = $conexion->prepare("SELECT * FROM horario_entrevista WHERE id_grupos = :id ORDER BY Id_Horario DESC");
$BuscarH->execute(array(":id" => $Grupos['id_gp']));
$Horarios = $BuscarH->fetchAll();
?>
<div class="container">
    <div class="row" style="margin-top: 30px;margin-bottom: 30px;">
        <div class="col-md-9">
               <p>
                <a class="btn btn-sm btn-danger" data-toggle="collapse" href="#formatos" role="button" aria-expanded="false" aria-controls="formatos">Generar Entrevista</a>
            </p>
            <div class="collapse" id="formatos">

                <div class="card" style="margin-bottom:20px ;border-color: #3498db">
                <div class="card-header h3 text-white" style="background-color: #3498db">Agendar Entrevista</div>
                <div class="card-body">
                    <table class="table">
  <thead>
    <tr>
      <th scope="col">Dia</th>
      <th scope="col">Hora</th>
      <th scope="col">Lugar</th>
    
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Horarios as $key) {
        ?>
    <tr>
      <th scope="row"><?php echo $key['Dia'];?></th>
      <td><?php echo $key['Hora'];?></td>
      <td><?php echo $key['Lugar'];?></td>
     
    </tr>
    <?php } ?>
  </tbody>
</table>
                    <form action="../app/op_alumno_entrevista.php" method="POST">
                       
                        <input type="text" name="alumno" hidden value="<?php echo $_SESSION['usuario']['0']; ?>">
                         <input type="text" name="Grupo_id" hidden value="<?php echo $Grupos['id_gp'] ?>">
                        <p></p>
                        
                        <p></p>
                        
                        <p></p>
                        <div class="row">
                            <div class="col">
                                <div class="input-group">
                                    <span class="input-group-addon">Fecha de asesoría:</span>
                                    <input type="date" name="fecha" class="form-control" required>
                                </div>
                            </div>
                            <div class="col">
                             <select class="custom-select text text-capitalize" name="hora" required>
                                <?php foreach ($Horarios as $key) {
        ?>
                                <option value="<?php echo $key['Id_Horario'];?>"><?php echo $key['Dia'];?> (<?php echo $key['Hora'];?>)</option>
                            <?php } ?>
                                
                             </select>
                            </div>
                        </div>
                        <p></p>
                      <center>  <input type="submit" name="enviar" class="btn btn-info" value="Enviar"></center>
                    </form>
                </div>
            </div>
            
            </div>
            <div class="card">
                <div class="card-header text-light" style="background-color: #9b59b6"><span class="h3">Asesorías</span></div>
                <div class="card-body">
                    <div class="h3 text-viol">Asesorías pendientes:</div>
                    <hr>
                    <?php if (empty($resultado)): ?>
                        <p class="text-muted">No tienes asesorías pendientes...</p>
                    <?php endif ?>
                    <?php foreach ($resultado as $asesoria):?>
                    <div class="card card-body" style="background-color:#fafafa">
                        <b class="h3 text-viol">"<?php echo $asesoria['titulo']?>"</b>
                        <i class="text-muted"><?php echo $asesoria['descripcion']?></i>
                        <div class="row">
                            <div class="col text-left text-muted"><b class="text-viol">Fecha de la asesoría: </b><?php echo strftime("%d de %B del %G", strtotime($asesoria['fecha'])) ?></div>
                            <div class="col text-right text-muted"><b class="text-viol2">Hora: </b><?php echo $asesoria['hora'] ?>  hrs</div>
                        </div>
                    </div>
                    <p></p>
                    <?php endforeach ?>
                </div>
            </div>
        </div>

        <?php include_once '../plantillas/A-menu.inc.php'; ?>

    </div>
</div>
<?php
include_once '../plantillas/doc-cierre.inc.php';
?>