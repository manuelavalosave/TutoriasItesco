function agregarDatosP(nombre,materias_adeuda,resultados_finalizar_semestre){

	cadena="nombre=" + nombre + 
			"&materias_adeuda=" + materias_adeuda +
			"&resultados_finalizar_semestre=" + resultados_finalizar_semestre;
		


	$.ajax({
		type:"POST",
		url:"../php/agregar-rfinal.php",
		data:cadena,
		success:function(r){
			
				$('#tabla').load('../componentes/tb-rfinal.php');
				 $('#buscador').load('../componentes/buscador.php');
				alertify.success("agregado con exito :)");
			
		}
	});

}

function agregaformP(datos){

	d=datos.split('||');

	$('#id_estudiantei').val(d[0]);
	$('#nombreu').val(d[1]);
	$('#materias_adeudau').val(d[2]);
	$('#resultados_finalizar_semestreu').val(d[3]);

	
}

function actualizaDatosP(){


	id=$('#id_estudiantei').val();
	numero=$('#nombreu').val();
	materias=$('#materias_adeudau').val();
	Actividad=$('#resultados_finalizar_semestreu').val();
	

	cadena= "id_estudiantei=" + id +
			"&nombre=" + nombre +
			"&materias_adeuda= " + materias + 
			"&resultados_finalizar_semestre=" + resultados ;
			
	$.ajax({
		type:"POST",
		url:"../php/actualizar-rfinal.php",
		data:cadena,
		success:function(r){
			
			
				$('#tabla').load('../componentes/tb-rfinal.php');
				alertify.success("Actualizado con exito :)");
			
		}
	});

}

function preguntarSiNo(id){
	alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?', 
					function(){ eliminarDatosP(id) }
                , function(){ alertify.error('Se cancelo')});
}

function eliminarDatosP(id){

	cadena="id=" + id;

		$.ajax({
			type:"POST",
			url:"../php/eliminar-rfinal.php",
			data:cadena,
			success:function(r){
				
					$('#tabla').load('../componentes/tb-rfinal.php');
					alertify.success("Eliminado con exito!");
				
			}
		});
}