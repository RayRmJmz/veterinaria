/****MOSTRA DATOS AL CARGAR LA VISTA*/
$(obtener_servicios());

function obtener_servicios(cadena){
	$.ajax({
		url:globalURL+'serviciosSearch',
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
		obtener_servicios(valorBusqueda);
	}else{
		obtener_servicios();
	}
});
