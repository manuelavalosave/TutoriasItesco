<?php session_start();
require 'conexion.php';
include 'app/mail.php';

if (isset($_POST['boton-alumnos'])) {
	$errores = '';
	if ($_SERVER['REQUEST_METHOD'] = 'POST') {
		$nombre = filter_var(strtolower($_POST['nombre']),FILTER_SANITIZE_STRING);
		$a_paterno = filter_var(strtolower($_POST['a_paterno']),FILTER_SANITIZE_STRING);
		$a_materno = filter_var(strtolower($_POST['a_materno']),FILTER_SANITIZE_STRING);
		$fec_nac = $_POST['fec_nac'];
		$no_control = filter_var(strtolower($_POST['no_control']),FILTER_SANITIZE_STRING);
		$carrera = $_POST['carrera'];
		$semestre = $_POST['semestre'];
		$grupo = $_POST['grupo'];
		$email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
		$pass = hash('sha512',$_POST['pass']);
		$pass2 = hash('sha512',$_POST['pass2']);

		if ($pass == $pass2) {
			if (empty($nombre) OR empty($a_paterno) OR empty($a_materno) OR empty($no_control) OR empty($email)) {
				$errores .= "<li>Por favor, rellena correctamente todos los campos</li>";
			} else {
				$conexion = conexion($db_config);
				$statement = $conexion->prepare('SELECT * FROM usuarios WHERE no_control LIKE :no_control LIMIT 1');
				$statement->execute(array(':no_control' => $no_control));
				$resultado = $statement->fetch();

				$statement2 = $conexion->prepare('SELECT * FROM solicitudes_registro WHERE no_control LIKE :no_control LIMIT 1');
				$statement2->execute(array(':no_control' => $no_control));
				$resultado2 = $statement2->fetch();

				if ($resultado != false) {
					$errores .= "<li>El número de Control: $no_control ya se encuentra registrado</li>";
				} elseif ($resultado2 != false) {
					$errores .= "<li>El usuario ya se encuentra registrado</li>";
				}

/* --- Operaciones Grupo --- */
    $grupos12 = $conexion->prepare("SELECT id_grupo FROM grupo WHERE grupo = :grupo AND semestre = :semestre AND carrera = :carrera");
    $grupos12->execute(array(':grupo' => $grupo, ':semestre' => $semestre, ':carrera' => $carrera));
    $grupoSBD = $grupos12->fetch();
    /* --- ----------------- --- */

				if ($errores == '') {
					
                    	$insertarUsuariosBD = $conexion->prepare("INSERT INTO usuarios (no_control,grupo,email,password,tipo) VALUES (:control,:grupo,:email,:pass,3)");
       $insertarUsuariosBD->execute(array(":control"=>$no_control, ":grupo" => $grupoSBD['id_grupo'], ":email" => $email, ":pass" => $pass));
 //busca y obtiene el id del usuario insertado
 $datosUsuarios = $conexion->prepare("SELECT id FROM usuarios WHERE  no_control = :no_control");
        $datosUsuarios->execute(array(":no_control" => $no_control));
        $det = $datosUsuarios->fetch();
                    $sexo = $_POST['sexo'];
        	$estadoC = $_POST['estado-c'];
        	$nacionalidad = $_POST['nacionalidad'];
        	$calle = $_POST['Calle'];
        	$numeroIn = $_POST['Numero-i'];
        	$col = $_POST['Colonia'];
        	$codigoP = $_POST['CP'];
        	$ciudad = $_POST['Ciudad'];
        	$muni = $_POST['Municipio'];
        	$estado = $_POST['Estado'];
        	$periodo = $_POST['periodo'];
        	$tel = $_POST['Celular'];
        	
       $detallesGuardarBD = $conexion->prepare("INSERT INTO detalle_usuarios (id_usuario, nombre, a_paterno, a_materno, fec_nac, direccion, num_tel, no_control, carrera, semestre, grupo, email, edit, Sexo, estado_civil,nacionalidad,calle,numero_interior,colonia,codigo_postal,ciudad,municipio,estado) VALUES (:iduser, :nombre, :a_paterno, :a_materno, :fec_nac, :dirrecion, :numero_tel, :no_control, :division, :semestre, :grupo, :email, 1, :sexo, :estado_civil, :nacionalidad, :calle, :numero_interior, :colonia, :codigo_postal, :ciudad, :municipio, :estado)");


       $detallesGuardarBD->execute(array(':iduser' =>  $det['id'], ':nombre' => $nombre, ':a_paterno' => $a_paterno, 'a_materno' => $a_materno, ':fec_nac' => $fec_nac, ':dirrecion'=> $calle, ':numero_tel' => $tel,':no_control' =>$no_control, ':division' => $carrera, ':semestre' => $semestre, ':grupo' => $grupo, ':email' => $email, ':sexo' => $sexo, ':estado_civil' => $estadoC, ':nacionalidad' => $nacionalidad, ':calle' => $calle, ':numero_interior' => $numeroIn, ':colonia' => $col, ':codigo_postal' => $codigoP, ':ciudad'=> $ciudad, ':municipio' => $muni, ':estado' => $estado));


        $obtenerIdD = $conexion->prepare("SELECT id FROM detalle_usuarios WHERE  id_usuario = :no_control");
        $obtenerIdD->execute(array(":no_control" => $det['id']));
        $IDinsertado = $obtenerIdD->fetch();

        $inforL = $conexion->prepare("INSERT INTO `informacion_laboral`(`id_detalles_usuarios`) VALUES (:id)");
        $inforL->execute(array(":id" => $IDinsertado['id']));

        $infC = $conexion->prepare("INSERT INTO `informacion_clinica`(`id_detusu`) VALUES (:id)");
        $infC->execute(array(":id" => $IDinsertado['id']));

        $datosTutor = $conexion->prepare("INSERT INTO `datos_tutor_conyugue`(`id_detallesusuario`) VALUES (:id)");
        $datosTutor->execute(array(":id" => $IDinsertado['id']));

        $estudio_socioeconomico = $conexion->prepare("INSERT INTO `estudio_socioeconomico`(`usuario_id`) VALUES (:id)");
        $estudio_socioeconomico->execute(array(":id" => $IDinsertado['id']));

        $datos_caso_emergencia = $conexion->prepare("INSERT INTO `datos_caso_emergencia`(`id_detallesU`) VALUES (:id)");
        $datos_caso_emergencia->execute(array(":id" => $IDinsertado['id']));


                    /* ---- Envio Email ---- */
                    $motivo = "Solicitud de registro a la plataforma";
                    $mensaje = "Tu solicitud de ingreso a la plataforma ha sido enviada. permanece atento a tu buzón de correo pues se te notificará una vez que hayan aceptado tu acceso a la plataforma.";
                    sendEmail($email, $nombre, $motivo, $mensaje);
                    /* ----             ---- */
                
					$errores.= "<strong class='h4'>¡La solicitud se ha mandado con éxito!</strong><p>Permanece a la espera de que el administrador acepte tu solicitud para obtener tu acceso a la plataforma. Se te notificará por medio del correo electrónico que proporcionaste</p>";
				}
			}
		}else{
			$errores .= "<p>Las contraseñas ingresadas no coinciden</p>";
		}
	}
}elseif (isset($_POST['boton-tutor'])) {
		$errores2 = '';
	if ($_SERVER['REQUEST_METHOD'] = 'POST') {
		$nombre = filter_var(strtolower($_POST['nombre']),FILTER_SANITIZE_STRING);
		$a_paterno = filter_var(strtolower($_POST['a_paterno']),FILTER_SANITIZE_STRING);
		$a_materno = filter_var(strtolower($_POST['a_materno']),FILTER_SANITIZE_STRING);
		$fec_nac = $_POST['fec_nac'];
		$no_control = $_POST['id_trabajador'];
		$carrera = $_POST['carrera'];
		$semestre = $_POST['semestre'];
        $grupo = $_POST['grupo'];
		$email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
		$pass = hash('sha512',$_POST['pass']);
		$pass2 = hash('sha512',$_POST['pass2']);
		$periodo = $_POST['periodo'];

		if (empty($nombre) OR empty($a_paterno) OR empty($a_materno) OR empty($no_control) OR empty($email)) {
			$errores2 .= "<li>Por favor, rellena correctamente todos los campos</li>";
		} else {
			$conexion = conexion($db_config);

			$statement = $conexion->prepare('SELECT * FROM usuarios WHERE no_control LIKE :no_control LIMIT 1');
			$statement->execute(array(':no_control' => $no_control));
			$resultado = $statement->fetch();

			$statement2 = $conexion->prepare('SELECT * FROM solicitudes_registro WHERE no_control LIKE :no_control LIMIT 1');
			$statement2->execute(array(':no_control' => $no_control));
			$resultado2 = $statement2->fetch();

			if ($resultado != false) {
				$errores2 .= "<li>El ID de trabajador: $no_control ya se encuentra registrado</li>";
			} elseif ($resultado2 != false) {
				$errores2 .= "<li>El usuario ya se encuentra registrado</li>";
			}


/* --- Operaciones Grupo --- */
    $grupos12 = $conexion->prepare("SELECT id_grupo FROM grupo WHERE grupo = :grupo AND semestre = :semestre AND carrera = :carrera");
    $grupos12->execute(array(':grupo' => $grupo, ':semestre' => $semestre, ':carrera' => $carrera));
    $grupoSBD = $grupos12->fetch();
    /* --- ----------------- --- */
   
    
			if ($errores2 == '') {
//inserta en tabla de usuario
				$insertarUsuariosBD = $conexion->prepare("INSERT INTO usuarios (no_control,grupo,email,password,tipo) VALUES (:control,:grupo,:email,:pass,2)");
       $insertarUsuariosBD->execute(array(":control"=>$no_control, ":grupo" => $grupoSBD['id_grupo'], ":email" => $email, ":pass" => $pass));
 //busca y obtiene el id del usuario insertado
 $datosUsuarios = $conexion->prepare("SELECT id FROM usuarios WHERE  no_control = :no_control");
        $datosUsuarios->execute(array(":no_control" => $no_control));
        $det = $datosUsuarios->fetch();
        
        /* --- pruebas email --- */
        $motivo = "¡Solicitud de ingreso aceptada!";
        $mensaje = "¡tu solicitud de ingreso a la plataforma ha sido aceptado, así que ya puedes realizar tu ingreso a la plataforma con los datos que has proporcionado en tu registro!";
        sendEmail($email, $nombre, $motivo, $mensaje);
        /* --- ------------- --- */
        
        /* Detalle_usuarios */
     
        	$sexo = $_POST['sexo'];
        	$estadoC = $_POST['estado-c'];
        	$nacionalidad = $_POST['nacionalidad'];
        	$calle = $_POST['Calle'];
        	$numeroIn = $_POST['Numero-i'];
        	$col = $_POST['Colonia'];
        	$codigoP = $_POST['CP'];
        	$ciudad = $_POST['Ciudad'];
        	$muni = $_POST['Municipio'];
        	$estado = $_POST['Estado'];
        	$gradoA = $_POST['gradoA'];
        	$tel = $_POST['Celular'];
        	
       $detallesGuardarBD = $conexion->prepare("INSERT INTO detalle_usuarios (id_usuario, nombre, a_paterno, a_materno, fec_nac, direccion, num_tel, no_control, carrera, semestre, grupo, email, edit, Sexo, estado_civil,nacionalidad,calle,numero_interior,colonia,codigo_postal,ciudad,municipio,estado,grado_academico, periodo) VALUES (:iduser, :nombre, :a_paterno, :a_materno, :fec_nac, :dirrecion, :numero_tel, :no_control, :division, :semestre, :grupo, :email, 1, :sexo, :estado_civil, :nacionalidad, :calle, :numero_interior, :colonia, :codigo_postal, :ciudad, :municipio, :estado, :grado_academico, :periodo)");


       $detallesGuardarBD->execute(array(':iduser' =>  $det['id'], ':nombre' => $nombre, ':a_paterno' => $a_paterno, 'a_materno' => $a_materno, ':fec_nac' => $fec_nac, ':dirrecion'=> $calle, ':numero_tel' => $tel,':no_control' =>$no_control, ':division' => $carrera, ':semestre' => $semestre, ':grupo' => $grupo, ':email' => $email, ':sexo' => $sexo, ':estado_civil' => $estadoC, ':nacionalidad' => $nacionalidad, ':calle' => $calle, ':numero_interior' => $numeroIn, ':colonia' => $col, ':codigo_postal' => $codigoP, ':ciudad'=> $ciudad, ':municipio' => $muni, ':estado' => $estado, ':grado_academico' => $gradoA, ':periodo' => $periodo));


                $add_user = $conexion->prepare("INSERT INTO `grupo_periodos` (`fk_Grupo`, `fk_Periodo`,`FK_usuario`) VALUES (:fk_Grupo,:fk_Periodo,:FK_usuario)");
                    $add_user->execute(array(":fk_Grupo" =>  $grupoSBD['id_grupo'], ":fk_Periodo" =>  $periodo, ":FK_usuario"=>$det['id']));

				
                $motivo = "Solicitud de registro a la plataforma";
                $mensaje = "Tu solicitud de ingreso a la plataforma ha sido enviada. permanece atento a tu buzón de correo pues se te notificará una vez que hayan aceptado tu acceso a la plataforma.";
                sendEmail($email, $nombre, $motivo, $mensaje);

				$errores2.= "<strong class='h4'>¡La solicitud se ha mandado con éxito!</strong><p>Permanece a la espera de que el administrador acepte tu solicitud para obtener tu acceso a la plataforma. Se te notificará por medio del correo electrónico que proporcionaste</p>";
 			}
			else{
				
			}
		}
	}
}




?>