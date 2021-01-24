$(obtener_ordenesDetalle());

function obtener_ordenesDetalle(){
	var url = window.location.pathname;
	var id_orden = url.substring(url.lastIndexOf('/') + 1);
	$.ajax({
		url:globalURL+'ordenesDetalle',
		type: 'POST',
		dataType: 'html',
		data :{id_orden: id_orden },
	})
	.done(function(resultado){
		$("#resultado").html(resultado);

	})

}