<?php

function obtener_mensajes($conexion,$id_chat){
	$statement = $conexion->prepare("SELECT * FROM mensajes WHERE id_chat = :id_chat");
	$statement-execute(":id_chat" => $id_chat);
	$mensaje = $statement->fetch();
}

?>