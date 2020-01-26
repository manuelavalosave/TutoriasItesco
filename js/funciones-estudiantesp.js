
function agregarDatosPP(nombre,tipo_problema,seguimiento){

	cadena="nombre=" + nombre + 
			"&tipo_problema=" + tipo_problema +
			"&seguimiento=" + seguimiento;
		


	$.ajax({
		type:"POST",
		url:"../php/agregar-estudiantesp.php",
		data:cadena,
		success:function(r){
			
				$('#tabla2').load('../componentes/tb-estudiantep.php');
				 $('#buscador').load('../componentes/buscador.php');
				alertify.success("agregado con exito :)");
			
		}
	});

}

function agregaformPP(datos){

	d=datos.split('||');

	$('#id_estudiantesp').val(d[0]);
	$('#nombreu').val(d[1]);
	$('#tipo_problemau').val(d[2]);
	$('#seguimientou').val(d[3]);

	
}

function actualizaDatosPP(){


	id=$('#id_estudiantesp').val();
	numero=$('#nombreu').val();
	materias=$('#tipo_problemau').val();
	Actividad=$('#seguimientou').val();
	

	cadena= "id_estudiantesp=" + id +
			"&nombre=" + nombre +
			"&tipo_problema= " + tipo_problema + 
			"&seguimiento=" + seguimiento ;
			
	$.ajax({
		type:"POST",
		url:"../php/actualizar-estudiantep.php",
		data:cadena,
		success:function(r){
			
			
				$('#tabla2').load('../componentes/tb-estudiantep.php');
				alertify.success("Actualizado con exito :)");
			
		}
	});

}

function preguntarSiNo(id){
	alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?', 
					function(){ eliminarDatosPP(id) }
                , function(){ alertify.error('Se cancelo')});
}

function eliminarDatosPP(id){

	cadena="id=" + id;

		$.ajax({
			type:"POST",
			url:"../php/eliminar-estudiantesp.php",
			data:cadena,
			success:function(r){
				
					$('#tabla2').load('../componentes/tb-estudiantep.php');
					alertify.success("Eliminado con exito!");
				
			}
		});
}