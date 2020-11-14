var url='http://localhost:82/jaimepets/welcome/';
$(obtener_registros());

function obtener_registros(cadena){
	$.ajax({
		url:url+'empleadoSearch',
		type: 'POST',
		dataType: 'html',
		data :{cadena: cadena },
	})
	.done(function(resultado){
		$("#resultado").html(resultado);	
	})
}

$(document).on('keyup','#busqueda',function(){
	var valorBusqueda =$(this).val();
	console.log("escribiendo..");
	if(valorBusqueda!=""){
		obtener_registros(valorBusqueda);
	}else{
		obtener_registros();
	}
});

function empleados(datos){
	console.log("editar empleado");

	d=datos.split('||');
	$('#id_empleado').val(d[0]);
	$('#nombre').val(d[1]);
	$('#apellido1').val(d[2]);	
	$('#apeliido2').val(d[3]);
	$('#celular').val(d[4]);
	$('#fecha_alta').val(d[5]);
	$('#id_puesto').val(d[6]);
	$('#id_rol').val(d[7]);

}

