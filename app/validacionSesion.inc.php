<?php session_start();
require 'conexion.php';

if (isset($_POST['boton-alumno'])) {
	$errores = '';
	if ($_SERVER['REQUEST_METHOD'] = 'POST') {
		$no_control = filter_var($_POST['no_control'],FILTER_SANITIZE_STRING);
		$password = hash('sha512',$_POST['password']);

		$conexion = conexion($db_config);

		$statement = $conexion->prepare('SELECT * FROM usuarios WHERE no_control = :no_control AND password = :password AND tipo = 3');
		$statement->execute(array(':no_control' => $no_control, ':password' => $password));
		$resultado = $statement->fetch();

		$datosdetalle = $conexion->prepare('SELECT * FROM detalle_usuarios WHERE id_usuario = :id ');
		$datosdetalle->execute(array(':id' => $resultado['id']));
		$resultadoD = $datosdetalle->fetch();

		if ($resultado != false) {
			$datos = array($resultado['id'],$resultadoD['nombre'],$resultadoD['no_control'],$resultado['tipo'],$resultado['grupo']);
			$_SESSION['usuario'] = $datos;
			header('Location: alumno/index.php');
		} else {
			$errores .= '<li>¡Los datos están incorrectos!</li>';
		}
	}
} elseif (isset($_POST['boton-tutor'])) {
	$errores2 = '';
	if ($_SERVER['REQUEST_METHOD'] = 'POST') {
		$email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
		$password = hash('sha512',$_POST['password']);

		$conexion = conexion($db_config);

		$statement = $conexion->prepare('SELECT * FROM usuarios WHERE email = :email AND password = :password AND tipo = 2');
		$statement->execute(array(':email' => $email, ':password' => $password));
		$resultado = $statement->fetch();

		$datosdetalle = $conexion->prepare('SELECT * FROM detalle_usuarios WHERE id_usuario = :id ');
		$datosdetalle->execute(array(':id' => $resultado['id']));
		$resultadoD = $datosdetalle->fetch();

		if ($resultado != false) {
			$datos = array($resultado['id'],$resultadoD['nombre'],$resultadoD['email'],$resultado['tipo'],$resultado['grupo']);
			$_SESSION['usuario'] = $datos;
			header('Location: tutor/index.php');
		} else {
			$errores2 .= '<li>¡Los datos están incorrectos!</li>';
		}
	}
}elseif (isset($_POST['boton-admin'])) {
	$errores3 = '';
	if ($_SERVER['REQUEST_METHOD'] = 'POST') {
		$email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
		$password = $_POST['password'];

		$conexion = conexion($db_config);

		$statement = $conexion->prepare('SELECT * FROM usuarios WHERE email = :email AND password = :password AND tipo = 1');
		$statement->execute(array(':email' => $email, ':password' => $password));
		$resultado = $statement->fetch();

		if ($resultado != false) {
			$datos = array($resultado['id'],$resultado['nombre'],$resultado['email'],$resultado['tipo'],$resultado['grupo']);
			$_SESSION['usuario'] = $datos;
			header('Location: admin/index.php');
		} else {
			$errores3 .= '<li>¡Los datos están incorrectos!</li>';
		}
	}
}

?>
