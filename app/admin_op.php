<?php 
include_once 'mail.php';
$conexion = conexion($db_config);
if (isset($_POST['aceptar'])) {
    conexion($db_config);
    $sol = $conexion->prepare("SELECT * FROM solicitudes_registro WHERE id = :id");
    $sol->execute(array(":id" => $_POST['id']));
    $registro = $sol->fetch();

    $nombre = $registro['nombre'].' '.$registro['a_paterno'].' '.$registro['a_materno'] ;
    $noControl = $registro['no_control'];
    $email = $registro['email'];
    $tipo = $registro['tipo'];
    $pass = $registro['pass'];

    /* --- Operaciones Grupo --- */
    $grupos = $conexion->prepare("SELECT id_grupo FROM grupo WHERE grupo = :grupo AND semestre = :semestre AND carrera = :carrera");
    $grupos->execute(array(':grupo' => $registro['grupo'], ':semestre' => $registro['semestre'], ':carrera' => $registro['division']));
    $grupo = $grupos->fetch();
    /* --- ----------------- --- */

    $statement = $conexion->prepare("SELECT * FROM usuarios WHERE nombre = :nombre OR no_control = :no_control");
    $statement->execute(array(":nombre" => $nombre, ":no_control" => $noControl));
    $cuenta = $statement->fetch();
    if (empty($cuenta)) {
        $statement2 = $conexion->prepare("INSERT INTO usuarios (id,fecha_registro,nombre,no_control,grupo,email,password,tipo) VALUES (NULL,NULL,:nombre,:no_control,:grupo,:email,:pass,:tipo)");
        $statement2->execute(array(":nombre" => $nombre, ":no_control" => $noControl, ":grupo" => $grupo['id_grupo'], ":email" => $email, ":pass" => $pass, ":tipo" => $tipo));

        /* --- Operaciones detalle_usuario --- */
        $statement = $conexion->prepare("SELECT id FROM usuarios WHERE nombre = :nombre");
        $statement->execute(array(":nombre" => $nombre));
        $det = $statement->fetch();
        /* --- --------------------------- --- */
        /* --- pruebas email --- */
        $motivo = "¡Solicitud de ingreso aceptada!";
        $mensaje = "¡tu solicitud de ingreso a la plataforma ha sido aceptado, así que ya puedes realizar tu ingreso a la plataforma con los datos que has proporcionado en tu registro!";
        sendEmail($email, $nombre, $motivo, $mensaje);
        /* --- ------------- --- */
        
        /* Detalle_usuarios */
        $statement3 = $conexion->prepare("INSERT INTO detalle_usuarios (id, id_usuario, nombre, a_paterno, a_materno, fec_nac, direccion, num_tel, no_control, carrera, semestre, grupo, email, edit) VALUES (NULL, :id, :nombre, :a_paterno, :a_materno, :fec_nac, NULL, NULL, :no_control, :division, :semestre, :grupo, :email, 1)");

        $statement3->execute(array(':id' => $det['id'], ':nombre' => $registro['nombre'], ':a_paterno' => $registro['a_paterno'], 'a_materno' => $registro['a_materno'], ':fec_nac' => $registro['fec_nac'], ':no_control' => $registro['no_control'], ':division' => $registro['division'], ':semestre' => $registro['semestre'], ':grupo' => $registro['grupo'], ':email' => $registro['email']));
        /* ------------------ */
        $borrado = $conexion->prepare("DELETE FROM solicitudes_registro WHERE no_control = :no_control");
        $borrado->execute(array(":no_control" => $noControl));
        $error .= "El usuario <b class='text-capitalize'>$nombre</b> se ha agregado correctamente";

        //NUEVO 
                $add_user = $conexion->prepare("INSERT INTO `grupo_periodos`(`fk_Grupo`, `fk_Periodo`,`FK_usuario`) VALUES (:fk_Grupo,:fk_Periodo,:FK_usuario)");
                    $add_user->execute(array(":fk_Grupo" => $grupo['id_grupo'], ":fk_Periodo" =>  $registro['periodo'], ":FK_usuario"=> $det['id']));

        
    }else{
        $error .= "El Usuario ya se encuentra en la plataforma!!";
    }
}elseif (isset($_POST['rechazar'])) {
    conexion($db_config);
    $statement = $conexion->prepare("DELETE FROM solicitudes_registro WHERE id = :id");
    $statement->execute(array(":id" => $_POST['id']));
    $error.="El usuario se ha eliminado correctamente!!";
}
?>