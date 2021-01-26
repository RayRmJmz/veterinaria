$(obtener_ordenes());

function obtener_ordenes(cadena){
	$.ajax({
		url:globalURL+'getOrdenesTrabajo',
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
		obtener_ordenes(valorBusqueda);
	}else{
		obtener_ordenes();
	}
});



function deleteService(id){
	console.log(id);
	var id_orden = { id }
	$.ajax({
		url:globalURL+'deleteOrden',
		method:'POST',
		data :id_orden,
		//dataType: 'json',
		success:function(res){
			// $("#resultado").html(res);
      console.log(res);
      Swal.fire({
        title: '',
        text: 'Orden cancelada correctamente',
        icon: 'success',
        confirmButtonText: 'Aceptar'
      });
			obtener_ordenes();
		},
		error:function(error){
      console.error(error);
      Swal.fire({
        title: 'Error!',
        text: 'No se ha podido cancelar la orden',
        icon: 'error',
        confirmButtonText: 'Aceptar'
      });;
		}
	});
}


function updateOrden(id){
	$.ajax({
		url:globalURL+'updateOrden',
		type: 'POST',
		dataType: 'html',
		data :{id: id },
	})
	.done(function(resultado){
		$("#resultado").html(resultado);
	})
}
