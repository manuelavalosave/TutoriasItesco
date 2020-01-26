<?php session_start();
require 'conexion.php';
if (isset($_POST['EnviarPlan'])) {
	$errores = '';
		
			$conexion = conexion($db_config);

			$statement = $conexion->prepare("UPDATE `formatos_tutor` SET `estado`= 1 WHERE id= :id");
			$statement->execute(array(":id" => $_POST['id']));
			$errores = "¡Archivo subido exitosamente!";
            echo $errores;
            header('Location:../tutor/T-Reporte.php?a=1&g='.$_GET['g'].'');
		
	}


if(isset($_POST['delete'])){
    $name = $_POST['file'];

    $conexion = conexion($db_config);
    
    $statement = $conexion->prepare("DELETE FROM `formatos_tutor` WHERE id = ".$_POST['id']."");
    $statement->execute();
    
    unlink("../docs/planificacion/".$_GET['g']."/$name.pdf");
      unlink("../docs/html/".$_GET['g']."/$name.html");
    $errores = "Archivo eliminado correctamente.";
    print_r($statement);
    header("Location:../tutor/T-Reporte.php?a=2&g=".$_GET['g']."");
    
}

if (isset($_POST['cargar2'])) {
	$errores = '';
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES)) {
		$check = @filesize($_FILES['reporte']['tmp_name']);
		if ($check !== false) {
			$carpeta_destino = '../docs/reportes/';
			$archivo_subido = $carpeta_destino . $_FILES['reporte']['name'];
			move_uploaded_file($_FILES['reporte']['tmp_name'], $archivo_subido);

			$conexion = conexion($db_config);

			$statement = $conexion->prepare("INSERT INTO reportes (id, parcial, autor, archivo, fec_sub, estado) VALUES (NULL, :parcial, :autor, :archivo, NULL, 1)");
			$statement->execute(array(":parcial" => $_POST['parcial'],":autor" => $_SESSION['usuario']['0'], ":archivo" => $_FILES['reporte']['name']));
			$errores = "¡Archivo subido exitosamente!";
            header('Location:../tutor/T-Reporte.php?a=1');
		}
	}
}

if(isset($_POST['delete2'])){
    $name = $_POST['name'];
    $conexion = conexion($db_config);
    
    $statement = $conexion->prepare("DELETE FROM reportes WHERE archivo = :archivo");
    $statement->execute(array('archivo' => $name));
    unlink("../docs/reportes/$name");
    $errores = 'Archivo eliminado correctamente';
    header('Location:../tutor/T-Reporte.php?a=2');
}


$conexion = conexion($db_config);

$f = $conexion->prepare('SELECT * FROM formatos ORDER BY tipo ASC');
$f->execute();
$formatos = $f->fetchAll();

$statement = $conexion->prepare('SELECT * FROM formatos_tutor WHERE autor = :autor and id_grupo = :id');
$statement->execute(array(":autor" => $_SESSION['usuario']['0'], 'id' => $_GET['g']));
$plan = $statement->fetch();

$state = $conexion->prepare('SELECT parcial,archivo,fec_sub,estado FROM reportes WHERE autor = :autor ORDER BY parcial ASC');
$state->execute(array(':autor'=>$_SESSION['usuario']['0']));
$reportes = $state->fetchAll();

/*-- Comprobación parcial --*/
$par = $conexion->prepare('SELECT id FROM reportes WHERE parcial = 1 AND autor = :autor');
$par->execute(array(':autor' => $_SESSION['usuario']['0']));
$r = $par->fetch();
if(empty($r)){
    $parcial = 1;
}else{
    $par = $conexion->prepare('SELECT id FROM reportes WHERE parcial = 2 AND autor = :autor');
    $par->execute(array(':autor' => $_SESSION['usuario']['0']));
    $r = $par->fetch();
    if(empty($r)){
        $parcial = 2;
    }else{
        $par = $conexion->prepare('SELECT id FROM reportes WHERE parcial = 3 AND autor = :autor');
        $par->execute(array(':autor' => $_SESSION['usuario']['0']));
        $r = $par->fetch();
        if(empty($r)){
            $parcial = 3;
        }else{
            $parcial = 0;
        }
    }
}
$grupo = $_GET['g'];
$act = $conexion->prepare("SELECT * FROM actividades WHERE id_grupo = $grupo");
$act->execute();
$actividades = $act->fetchAll();

/*-- Comprobación parcial --*/
$DatosUser = $conexion->prepare('CALL Datos_PlanTrabajo(:id,:id_g)');
$DatosUser->execute(array(':id' => $_SESSION['usuario']['0'], ':id_g'=> $_GET['g']));
$DTBUSER = $DatosUser->fetchall();

?>