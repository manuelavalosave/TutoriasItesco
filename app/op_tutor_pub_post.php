<?php
session_start();
require 'conexion.php';
if (isset($_POST['publicar'])) {
	$grupo = $_SESSION['usuario']['4'];
	$errores = '';
    if(!empty($_FILES['imagen']['name'])){
        $check = @getimagesize($_FILES['imagen']['tmp_name']);
        if($check !== false){
            $carpeta_destino = '../img/post/';
            $archivo_subido = $carpeta_destino . $_FILES['imagen']['name'];
            move_uploaded_file($_FILES['imagen']['tmp_name'], $archivo_subido);
        } else {
            $error .= 'el archivo no es una imagen o es muy pesado';
        }
    }
    $conexion = conexion($db_config);
    $statement = $conexion->prepare("INSERT INTO foro (id_post, fecha_pub, titulo, contenido, imagen, id_usuario, id_grupo, visible) VALUES (NULL, NULL, :titulo, :contenido, :imagen, :id_usuario, $grupo, 1)");
    $statement->execute(array(':titulo' => $_POST['titulo'], ':contenido' => $_POST['contenido'] ,':imagen' => $_FILES['imagen']['name'], ":id_usuario" => $_SESSION['usuario']['0']));
    header('Location: ../tutor/forodiscusion.php?a=1');
}
?>