
function agregarDatosE(fecha,numero_control,nombre_alumno,asignatura,problematica,recomendaciones,cronica_degenerativa,metabolica){

	cadena= "fecha=" + fecha +
	        "&numero_control=" + numero_control +
	        "&nombre_alumno=" + nombre_alumno +
			"&asignatura=" + asignatura +
			"&problematica=" + problematica +
			"&recomendaciones=" + recomendaciones +
			"&cronica_degenerativa=" + cronica_degenerativa +
			"&metabolica=" + metabolica;


	$.ajax({
		type:"POST",
		url:"../php/agregar-entrevista.php",
		data:cadena,
		success:function(r){
			
				$('#tabla').load('../componentes/tb-entrevistas.php');
				 $('#buscador').load('../componentes/buscador.php');
				alertify.success("agregado con exito :)");
			
		}
	});

}

function agregaformE(datos){

	d=datos.split('||');

	$('#id_entrevista').val(d[0]);
	$('#fechau').val(d[1]);
	$('#numero_controlu').val(d[2]);
	$('#nombre_alumnou').val(d[3]);
	$('#asignaturau').val(d[4]);
	$('#problematicau').val(d[5]);
	$('#recomendacionesu').val(d[6]);
	$('#cronica_degenerativau').val(d[7]);
	$('#metabolicau').val(d[8]);
	
}

function actualizaDatosE(){


	id=$('#id_entrevista').val();
	Fecha=$('fechau').val();
	numero=$('#numero_controlu').val();
	Nombre_alumno=$('#nombre_alumnou').val();
	Asignatura=$('#asignaturau').val();
	Problematica=$('#problematicau').val();
	Recomendaciones=$('#recomendacionesu').val();
	CronicaD=$('#cronica_degenerativau').val();
	Metabolica=$('#metabolicau').val();

	cadena= "id_entrevista=" + id +
	        "&fecha= " + Fecha +
			"&numero_control=" + numero +
			"&nombre_alumno=" + Nombre_alumno +
			"asignatura=" + Asignatura +
			"&problematica=" + Problematica +
			"&recomendaciones=" + Recomendaciones +
			"&cronica_degenerativa=" + CronicaD +
		    "&metabolica=" +Metabolica;

	$.ajax({
		type:"POST",
		url:"../php/actualizar-entrevistas.php",
		data:cadena,
		success:function(r){
			
			
				$('#tabla').load('../componentes/tb-entrevistas.php');
				alertify.success("Actualizado con exito :)");
			
		}
	});

}

function preguntarSiNo(id){
	alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?', 
					function(){ eliminarDatosE(id) }
                , function(){ alertify.error('Se cancelo')});
}

function eliminarDatosE(id){

	cadena="id=" + id;

		$.ajax({
			type:"POST",
			url:"../php/eliminar-entrevista.php",
			data:cadena,
			success:function(r){
				
					$('#tabla').load('../componentes/tb-entrevistas.php');
					alertify.success("Eliminado con exito!");
				
			}
		});
}