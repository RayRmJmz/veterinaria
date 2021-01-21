$(obtener_ordenes());

function obtener_ordenes(){
	var url = window.location.pathname;
	var id_orden = url.substring(url.lastIndexOf('/') + 1);
	$.ajax({
		url:globalURL+'getOrders',
		type: 'POST',
		dataType: 'html',
		data :{id_orden: id_orden },
	})
	.done(function(resultado){
		$("#resultado").html(resultado);

	})

}


function update(id_orden, id_servicio){
	console.log("Orden: "+ id_orden + "  servicio "+id_servicio);
	var e = document.getElementById("servicio"+id_servicio);
	var estado = e.options[e.selectedIndex].value;
	console.log("value " + estado); 
	console.log("actualizado");
	

	$.ajax({
		url:globalURL+'updateOrdenServicio',
		type: 'POST',
		dataType: 'html',
		data :{id_orden: id_orden, id_servicio:  id_servicio, estado:  estado},
	})
	.done(function(resultado){
		console.log(resultado);
		obtener_ordenes();
	})
}