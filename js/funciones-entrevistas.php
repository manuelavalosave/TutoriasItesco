
function agregarDatosP(numero,fecha_programada,actividad_realizada,objetivo_logrado,problematica_presentada,observaciones){

	cadena="numero=" + numero + 
			"&fecha_programada=" + fecha_programada +
			"&actividad_realizada=" + actividad_realizada +
			"&objetivo_logrado=" + objetivo_logrado +
			"&problematica_presentada=" + problematica_presentada +
			"&observaciones=" + observaciones;


	$.ajax({
		type:"POST",
		url:"../php/agregar-rparcial.php",
		data:cadena,
		success:function(r){
			
				$('#tabla').load('../componentes/tb-reporte-p.php');
				 $('#buscador').load('../componentes/buscador.php');
				alertify.success("agregado con exito :)");
			
		}
	});

}

function agregaformP(datos){

	d=datos.split('||');

	$('#id_reporte').val(d[0]);
	$('#numerou').val(d[1]);
	$('#fecha_programadau').val(d[2]);
	$('#actividad_realizadau').val(d[3]);
	$('#objetivo_logradou').val(d[4]);
	$('#prolematica_presentadau').val(d[5]);
	$('#observacionesu').val(d[6]);
	
}

function actualizaDatosP(){


	id=$('#id_reporte').val();
	numero=$('#numerou').val();
	Fecha=$('#fecha_programadau').val();
	Actividad=$('#actividad_realizadau').val();
	Objetivo=$('#objetivo_logradou').val();
	Material=$('#prolematica_presentadau').val();
	Observaciones=$('#observacionesu').val();

	cadena= "id_reporte=" + id +
			"&numero=" + numero +
			"&fecha_programada= " + Fecha + 
			"&actividad_realizada=" + Actividad +
			"&objetivo_logrado=" + Objetivo +
			"&problematica_presentada=" + Problematica +
		
			"&observaciones=" +Observaciones;

	$.ajax({
		type:"POST",
		url:"../php/actualizar-rparcial.php",
		data:cadena,
		success:function(r){
			
			
				$('#tabla').load('../componentes/tb-reporte-p.php');
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
			url:"../php/eliminar-rparcial.php",
			data:cadena,
			success:function(r){
				
					$('#tabla').load('../componentes/tb-reporte-p.php');
					alertify.success("Eliminado con exito!");
				
			}
		});
}