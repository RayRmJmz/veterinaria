$(obtener_reservas());

function obtener_reservas(fecha ){
	if (fecha == null) {
		fecha = new Date().getFullYear()+'-'+("0"+(new Date().getMonth()+1)).slice(-2)+'-'+("0"+new Date().getDate()).slice(-2);
	}else{
		
		console.log(fecha);
	}
	
	$.ajax({
		url:globalURL+'getReservas',
		type: 'POST',
		dataType: 'html',
		data :{fecha: fecha},
	})
	.done(function(resultado){
		$("#resultado").html(resultado);	
	})
}


//Filtra busqueda de empelados
$(document).on('change','#fecha',function(){
	var fecha =$(this).val();
	console.log("Buscando...");
	if(fecha!=""){
		obtener_reservas(fecha);
	}else{
		obtener_reservas();
	}
});


function deleteReserva(id){
	var id_reserva = { id }
	$.ajax({
		url:globalURL+'deleteReserva',
		method:'POST',
		data :id_reserva,
		//dataType: 'json',
		success:function(res){
			// $("#resultado").html(res);
			console.log(res);
			window.alert("Reserva cancelada correctamente");
			obtener_reservas();
		},
		error:function(error){
			console.error(error);
			console.alert("No se ha podido cancelar reserva");
		}
	});
}





