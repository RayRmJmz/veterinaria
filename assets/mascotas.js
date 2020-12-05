/****MOSTRA DATOS AL CARGAR LA VISTA*/
$(obtener_mascotas());

function obtener_mascotas(){
	var url = window.location.pathname;
	var id = url.substring(url.lastIndexOf('/') + 1);
	console.log(id);
	$.ajax({
		url:globalURL+'getPets',
		type: 'POST',
		dataType: 'html',
		data :{id: id },
	})
	.done(function(resultado){
		$("#resultado").html(resultado);	
	})
}



function getCatalogos(){
	console.log("cargar getCatalogos");
}

function getEspcies(){
	console.log("cargando pruebas");
	$.ajax({
		url:globalURL+'getEspcies',
		type: 'POST',
		dataType: 'html',
		//data :{id: id },
	})
	.done(function(resultado){
		$("#resultado").html(resultado);	
	})
}




