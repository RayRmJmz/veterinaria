$(obtener_ordenes_realizadas());

function obtener_ordenes_realizadas(cadena){
	$.ajax({
		url:globalURL+'getOrdenesTrabajoRealizadas',
		type: 'POST',
		dataType: 'html',
		data :{cadena: cadena },
	})
	.done(function(resultado){
		$("#resultado").html(resultado);	
	})
}

/*Filtra busqueda de clientes*/
$(document).on('keyup','#busqueda',function(){
	var valorBusqueda =$(this).val();
	console.log("Buscando...");
	if(valorBusqueda!=""){
		obtener_ordenes_realizadas(valorBusqueda);
	}else{
		obtener_ordenes_realizadas();
	}
});
