<?php
session_start();
include_once 'conexion.php';
$conexion = conexion($db_config);

if (!$conexion) {
    die();
}

$id = isset($_GET['id']) ? (int)$_GET['id'] : false;
if (!$id) {
    header('Location: forodiscusion.php');
}

if(!empty($_POST['publicar'])){
    $com = $conexion->prepare('INSERT INTO comentarios (id_comentario, id_post, id_usuario, fec_pub, comentario) VALUES (NULL, :post, :id_usuario, NULL, :comentario)');
    $com->execute(array(":post" => $_POST['post'], ":id_usuario" => $_POST['id'], ":comentario" => $_POST['comentario']));
    $alert = "comentario publicado!!";
    header('Location:../alumno/post.php?id='.$_POST['id'].'&a=1');
}

$statement = $conexion->prepare("SELECT * FROM foro WHERE id_post = :id");
$statement->execute(array(":id"=> $id));
$post = $statement->fetch();

$stat = $conexion->prepare("SELECT id_usuario, fec_pub, comentario FROM comentarios WHERE id_post = :id_post");
$stat->execute(array(":id_post" => $_GET['id']));
$comentarios = $stat->fetchAll();


if (!$post) {
    header('Location: forodiscusion.php');
}
?>