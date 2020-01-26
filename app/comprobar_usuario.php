<?php

if ($_SESSION['usuario']['3'] == '3') {
	include_once '../plantillas/doc-declaracion.inc.php';
	include_once '../plantillas/navbar.inc.php';
}elseif ($_SESSION['usuario']['3'] == '2') {
	include_once '../plantillas/doc-declaracion.inc.php';
	include_once '../plantillas/navbar_tutor.inc.php';
}elseif ($_SESSION['usuario']['3'] == '1') {
	include_once '../plantillas/doc-declaracion.inc.php';
	include_once '../plantillas/navbar_admin.inc.php';
}else{
  session_destroy();
  header('Location: ../inicioSesion.php');
}


?>