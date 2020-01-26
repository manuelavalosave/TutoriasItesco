<?php
include_once 'conexion.php';
session_start();
$grupo =$_POST['g'];

$conexion = conexion($db_config);

if(!empty($_GET['id'])){
    $stat = $conexion->prepare("SELECT * FROM actividades WHERE id_actividad = :id");
    $stat->execute(array(":id" => $_GET['id']));
    $act = $stat->fetch();
}

if(!empty($_POST['editar'])){
    
    $stat2 = $conexion->prepare('SELECT archivo FROM actividades WHERE id_actividad = :id');
    $stat2->execute(array(":id" => $_POST['act']));
    $arc = $stat2->fetch();
    if(!empty($arc)){
        $name = $arc['archivo'];
        unlink("../docs/actividades/tutores/$name");
    }
    
    if(!empty($_FILES['archivo']['name'])){
        $check = @filesize($_FILES['archivo']['tmp_name']);
        if($check !== false){
            $carpeta_destino = '../docs/actividades/tutores/';
            $archivo_subido = $carpeta_destino . $_FILES['archivo']['name'];
            move_uploaded_file($_FILES['archivo']['tmp_name'], $archivo_subido);
        }
    }
    
    $stat = $conexion->prepare("UPDATE `actividades` SET `titulo` = :titulo, `descripcion` = :desc, archivo = :file, `fecha_entrega` = :fec_ent WHERE `id_actividad` = :id");
    $stat->execute(array(":titulo" => $_POST['titulo'], ":desc" => $_POST['descripcion'], ":file" => $_FILES['archivo']['name'], ":fec_ent" => $_POST['entrega'], ":id" => $_POST['act'])); 
    header('Location: ../tutor/actividad.php?id='.$_POST['act'].'&a=1');
}

if(!empty($_POST['enviar'])){    
    if(!empty($_FILES['archivo']['name'])){
        $check = @filesize($_FILES['archivo']['tmp_name']);
        if ($check !== false) {
            $carpeta_destino = '../docs/actividades/tutores/';
            $archivo_subido = $carpeta_destino . $_FILES['archivo']['name'];
            move_uploaded_file($_FILES['archivo']['tmp_name'], $archivo_subido);
            
            $statement = $conexion->prepare("INSERT INTO actividades (id_actividad, titulo, descripcion, archivo, id_grupo, fecha_pub, fecha_entrega, activo,objetivo_actividad,materiales_utilizar,observaciones) VALUES (NULL, :titulo, :desc, :file, :grupo, NULL, :fec_ent, 1,:objetivo,:mat,:obs)");
            $statement->execute(array(":titulo" => $_POST['titulo'], ":desc" => $_POST['descripcion'], ":file" => $_FILES['archivo']['name'], ":grupo" => $grupo, ":fec_ent" => $_POST['entrega'], ":objetivo" => $_POST['objetivo'], ":mat" => $_POST['material'], ":obs" => $_POST['Observacion']));
            header('Location: ../tutor/T-centro_act.php?a=1');
        }
    }else{
        $stat = $conexion->prepare("INSERT INTO actividades (id_actividad, titulo, descripcion, archivo, id_grupo, fecha_pub, fecha_entrega, activo,objetivo_actividad,materiales_utilizar,observaciones) VALUES (NULL, :titulo, :desc, NULL, :grupo, NULL, :fec_ent, 1,:objetivo,:mat,:obs)");
        $stat->execute(array(":titulo" => $_POST['titulo'], ":desc" => $_POST['descripcion'], ":grupo" => $grupo, ":fec_ent" => $_POST['entrega'], ":objetivo" => $_POST['objetivo'], ":mat" => $_POST['material'], ":obs" => $_POST['Observacion']));
        header('Location: ../tutor/T-centro_act.php?a=1&g='.$grupo.'');
    }
}
?>