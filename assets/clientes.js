/****MOSTRA DATOS AL CARGAR LA VISTA*/
$(obtener_clientes());

function obtener_clientes(cadena){
	$.ajax({
		url:globalURL+'clienteSearch',
		type: 'POST',
		dataType: 'html',
		data :{cadena: cadena },
	})
	.done(function(resultado){
		$("#resultado").html(resultado);	
	})
}

/*Filtra busqueda de empelados*/
$(document).on('keyup','#busqueda',function(){
	var valorBusqueda =$(this).val();
	console.log("Buscando...");
	if(valorBusqueda!=""){
		obtener_clientes(valorBusqueda);
	}else{
		obtener_clientes();
	}
});

