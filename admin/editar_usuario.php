<?php session_start();

if ($_SESSION['usuario']['3'] == '1') {
    include_once '../plantillas/doc-declaracion.inc.php';
    include_once '../plantillas/navbar_admin.inc.php';
    include_once '../app/post.php';
    include_once '../app/op_admin_edit_usuario.php';
}else {
    session_destroy();
    header('Location: ../inicioSesion.php');
}

?>

<div class="container">
    <div class="row" style="margin-top: 30px;margin-bottom: 30px;">
        <div class="col-md-9">
           <div style="padding-bottom: 5px;"><a href="usuarios.php" class="h4 btn btn-sm btn-outline-primary">Regresar</a></div>
            <div id="chat" class="card" style="border-color: #34495e;">
                <div class="card-header h3 text-white bg-carbon">Editando Usuario:</div>
                <div class="card-body">
                	<form name="editar-usuario" action="../app/op_admin_edit_usuario.php" method="POST">
                	    <input type="text" name="id" value="<?php echo $id?>" hidden>
                		<div class="text-capitalize h5 alert alert-secondary">
                			<strong class="text-azul">Nombre:</strong> <?php echo $edit['nombre']?> <p></p>
                			<strong class="text-azul">No. Control (Id Trabajador):</strong> <?php echo $edit['no_control']?>
                		</div>
                		<div class="input-group">
                			<span class="input-group-addon" for="e-grupo">Grupo:</span>
                			<select class="custom-select text-capitalize" name="e-grupo">
                					<option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>
                			</select>
                		</div>
                      <p></p>
                       <div class="input-group">
                			<span class="input-group-addon" for="e-semestre">Semestre:</span>
                			<select class="custom-select text-capitalize" name="e-semestre">
                					<option value="1">1er. Semestre</option>
                                    <option value="2">2do. Semestre</option>
                                    <option value="3">3er. Semestre</option>
                			</select>
                		</div>
                      <p></p>
                       <div class="input-group">
                			<span class="input-group-addon" for="e-carrera">Carrera:</span>
                			<select class="custom-select text-capitalize" name="e-carrera">
                					<option value="Administracion">Administración</option>
                                    <option value="Animacion Digital y Efectos Visuales">Animación Digital y Efectos Visuales</option>
                                    <option value="Bioquimica">Bioquímica</option>
                                    <option value="Electrica">Eléctrica</option>
                                    <option value="Electronica">Electrónica</option>
                                    <option value="Gestion Empresarial">Gestión Empresarial</option>
                                    <option value="Industrial">Industrial</option>
                                    <option value="Informatica">Informática</option>
                                    <option value="Mecanica">Mecánica</option>
                                    <option value="Mecatronica">Mecatrónica</option>
                                    <option value="Petrolera">Petrolera</option>
                                    <option value="Quimica">Química</option>
                                    <option value="Sistemas Computacionales">Sistemas Computacionales</option>
                			</select>
                		</div>
                       <p></p>
                        <div class="text-right"><input type="submit" name="editar" class="btn btn-info" value="Editar Usuario"></div>
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