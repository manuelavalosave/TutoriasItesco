<?php
include_once 'conexion.php';
session_start();
$conexion = conexion($db_config);

$id = isset($_GET['id']) ? (int)$_GET['id'] : false;

if(!empty($_POST['publicar'])){
    $com = $conexion->prepare('INSERT INTO comentarios (id_comentario, id_post, id_usuario, fec_pub, comentario) VALUES (NULL, :post, :id_usuario, NULL, :comentario)');
    $com->execute(array(":post" => $_POST['post'], ":id_usuario" => $_POST['id'], ":comentario" => $_POST['comentario']));
    $alert = "comentario publicado!!";
    header('Location: ../tutor/post.php?id='.$_POST['id'].'&a=1');
}

if(!empty($_POST['borrar'])){
    $lol = $conexion->prepare("SELECT imagen FROM foro WHERE id_post = :id");
    $lol->execute(array(":id" => $_POST['id']));
    $fetch = $lol->fetch();
    $img = $fetch['imagen'];
    unlink("../img/post/$img");
    $stat = $conexion->prepare("DELETE FROM foro WHERE id_post = :id");
    $stat->execute(array(":id" => $_POST['id']));
    header('Location: ../tutor/forodiscusion.php?a=2');
}

$statement = $conexion->prepare("SELECT * FROM foro WHERE id_post = :id");
$statement->execute(array(":id"=> $id));
$post = $statement->fetch();

$stat = $conexion->prepare("SELECT id_usuario, fec_pub, comentario FROM comentarios WHERE id_post = :id_post");
$stat->execute(array(":id_post" => $_GET['id']));
$comentarios = $stat->fetchAll();
?>