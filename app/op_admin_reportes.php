<?php
require_once '../app/conexion.php';
$i = 1;
$j = 1;

$conexion = conexion($db_config);

if(!empty($_POST['p-aceptar'])){
    $stat2 = $conexion->prepare("UPDATE formatos_tutor SET estado = 2 WHERE id = :id");
    $stat2->execute(array(":id" => $_POST['id']));
    header('Location: ../admin/reportes.php?a=1');
}elseif($_POST['p-cancelar']){
    $stat3 = $conexion->prepare("UPDATE formatos_tutor SET estado = 3 WHERE id = :id");
    $stat3->execute(array(":id" => $_POST['id']));
    header('Location: ../admin/reportes.php?a=1');
}

if(!empty($_POST['r-aceptar'])){
    $stat2 = $conexion->prepare("UPDATE reportes SET estado = 2 WHERE id = :id");
    $stat2->execute(array(":id" => $_POST['r-id']));
    header('Location: ../admin/reportes.php?a=2');
}elseif($_POST['r-rechazar']){
    $stat3 = $conexion->prepare("UPDATE reportes SET estado = 3 WHERE id = :id");
    $stat3->execute(array(":id" => $_POST['r-id']));
    header('Location: ../admin/reportes.php?a=2');
}


if (!empty($_POST['b_formatos'])) {
	$errores = '';
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES)) {
        
        $c = $conexion->prepare("SELECT tipo FROM formatos WHERE tipo = :tipo");
        $c->execute(array(':tipo' => $_POST['tipo']));
        $exist = $c->fetch();

        if($exist == false ||  $_POST['tipo'] == "otro"){
            $check = @filesize($_FILES['formato']['tmp_name']);
            			$carpeta_destino = '../docs/formatos/';
			$archivo_subido = $carpeta_destino . $_FILES['formato']['name'];
			move_uploaded_file($_FILES['formato']['tmp_name'], $archivo_subido);

			$conexion = conexion($db_config);

			$statement = $conexion->prepare("INSERT INTO formatos (id, archivo, fec_sub, tipo) VALUES (NULL, :archivo, NULL, :tipo)");
			$statement->execute(array(":archivo" => $_FILES['formato']['name'], ":tipo" => $_POST['tipo'] ));
			$alerta = "¡Archivo subido exitosamente!";
              header('Location: ../admin/reportes.php?a=4');
            }else{
                    $alerta = "¡Archivo existe!";
                     header('Location: ../admin/reportes.php?a=3');
            }
        
	}
   header('Location: ../admin/reportes.php?a=4');
}

if(!empty($_POST['f_eliminar'])){
    $name = $_POST['file'];
    $conexion = conexion($db_config);
    
    $stat = $conexion->prepare("DELETE FROM formatos WHERE archivo = :archivo");
    $stat->execute(array(":archivo" => $name));
    unlink("../docs/formatos/$name");
    header('Location: ../admin/reportes.php?a=5');
}


$stat = $conexion->prepare("SELECT * FROM formatos_tutor WHERE estado = 1 or estado = 2");
$stat->execute();
$planes = $stat->fetchAll();


$con = $conexion->prepare("SELECT * FROM reportes ORDER BY autor,parcial");
$con->execute();
$reportes = $con->fetchAll();

$form = $conexion->prepare("SELECT * FROM formatos");
$form->execute();
$formatos = $form->fetchAll();


?>