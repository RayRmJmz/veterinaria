
$(obtener_empleados());

function obtener_empleados(cadena){
	$.ajax({
		url:globalURL+'empleadoSearch',
		type: 'POST',
		dataType: 'html',
		data :{cadena: cadena },
	})
	.done(function(resultado){
		$("#resultado").html(resultado);	
	})
}

function verificaUsuario(cadena){
	$.ajax({
		url:globalURL+'verificaUsuario',
		type: 'POST',
		dataType: 'html',
		data :{cadena: cadena },
	})
	.done(function(resultado){
		if(resultado == 1){
			document.getElementById('#Aceptar').disabled=false;
		}else{
			$("#message").html("usuario No disponible");
			document.getElementById('#Aceptar').disabled=true;
		}
		
	})
}



/*Verifica que el usario este disponible*/
$(document).on('keyup','#newEmpleado',function(){
	var valorBusqueda =$(this).val();
	console.log("Verificando usuario");
	if(valorBusqueda!=""){
		verificaUsuario(valorBusqueda);
	}else{
		verificaUsuario();
	}
});


/*Filtra busqueda de empelados*/
$(document).on('keyup','#busqueda',function(){
	var valorBusqueda =$(this).val();
	console.log("Buscando...");
	if(valorBusqueda!=""){
		obtener_empleados(valorBusqueda);
	}else{
		obtener_empleados();
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

