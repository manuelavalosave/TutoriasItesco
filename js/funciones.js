

function agregardatos(numero,fecha_programada,actividad_realizar,objetivo_realizar,material_utilizar,observaciones){

	cadena="numero=" + numero + 
			"&fecha_programada=" + fecha_programada +
			"&actividad_realizar=" + actividad_realizar +
			"&objetivo_realizar=" + objetivo_realizar +
			"&material_utilizar=" + material_utilizar +
			"&observaciones=" + observaciones;


	$.ajax({
		type:"POST",
		url:"../php/agregarDatos.php",
		data:cadena,
		success:function(r){
			
				$('#tabla').load('../componentes/tabla.php');
				 $('#buscador').load('../componentes/buscador.php');
				alertify.success("agregado con exito :)");
			
		}
	});

}

function agregaform(datos){

	d=datos.split('||');

	$('#id_plan').val(d[0]);
	$('#numerou').val(d[1]);
	$('#fecha_programadau').val(d[2]);
	$('#actividad_realizaru').val(d[3]);
	$('#objetivo_realizaru').val(d[4]);
	$('#material_utilizaru').val(d[5]);
	$('#observacionesu').val(d[6]);
	
}

function actualizaDatos(){


	id=$('#id_plan').val();
	numero=$('#numerou').val();
	Fecha=$('#fecha_programadau').val();
	Actividad=$('#actividad_realizaru').val();
	Objetivo=$('#objetivo_realizaru').val();
	Material=$('#material_utilizaru').val();
	Observaciones=$('#observacionesu').val();

	cadena= "id_plan=" + id +
			"&numero=" + numero +
			"&fecha_programada= " + Fecha + 
			"&actividad_realizar=" + Actividad +
			"&objetivo_realizar=" + Objetivo +
			"&material_utilizar=" + Material +
		
			"&observaciones=" +Observaciones;

	$.ajax({
		type:"POST",
		url:"../php/actualizaDatos.php",
		data:cadena,
		success:function(r){
			
			
				$('#tabla').load('../componentes/tabla.php');
				alertify.success("Actualizado con exito :)");
			
		}
	});

}

function preguntarSiNo(id){
	alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?', 
					function(){ eliminarDatos(id) }
                , function(){ alertify.error('Se cancelo')});
}

function eliminarDatos(id){

	cadena="id=" + id;

		$.ajax({
			type:"POST",
			url:"../php/eliminarDatos.php",
			data:cadena,
			success:function(r){
				
					$('#tabla').load('../componentes/tabla.php');
					alertify.success("Eliminado con exito!");
				
			}
		});
}