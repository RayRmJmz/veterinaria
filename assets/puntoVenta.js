$(document).ready(function() {
    $('.js-example-basic-single').select2();
});


function addItem(){

	var e = document.getElementById("articulo");
	var id_item = e.value;
	if(id_item == 0 ){
		alert("Seleccione un articulo");
	}else{
		$.ajax({
			url:globalURL+'addItem',
			type: 'POST',
			dataType: 'json',
			data :{id_item: id_item},
		})
		.done(function(resultado){
			console.log(resultado);
			var json = JSON.parse(resultado);
			console.log(json["articulo"]);
			document.getElementById("tablaProductos").insertRow(-1).innerHTML =  '<td>'+id_item+'<input type="number" name="articulo[]" value="'+id_item+'" hidden></td><td>'+json["articulo"]+'</td> <td>'+json["existencia"]+'</td><td>'+json["precio"]+'</td><td><input type="number" name="cantidad[]" value="1"></td>';

		})

	}
}

function ventasRealizadas(){

	 var dates = {
		inicial : document.getElementById("inicial").value,
		final : document.getElementById("final").value
	}

	$.ajax({
		url:globalURL+'getVentasRealizadas',
		method:'POST',
		data :dates,
		//dataType: 'json',
		success:function(res){
			$("#resultado").html(res);
		},
		error:function(error){
      console.error(error);
      Swal.fire({
        title: 'Error!',
        text: 'Ha ocurrido un error de consulta',
        icon: 'error',
        confirmButtonText: 'Aceptar'
      });
		}
	});
}

function cancelarVenta(id_venta){
	$.ajax({
		url:globalURL+'cancelarVenta',
		type: 'POST',
		dataType: 'html',
		data :{id_venta: id_venta },
	})
	.done(function(resultado){
    Swal.fire({
      title: '',
      text: 'Venta cancelada satisfactoriamente',
      icon: 'success',
      confirmButtonText: 'Aceptar'
    });
		ventasRealizadas();
	})
}

function ventasCanceladas(){

	 var dates = {
		inicial : document.getElementById("inicial").value,
		final : document.getElementById("final").value
	}

	$.ajax({
		url:globalURL+'getVentasCanceladas',
		method:'POST',
		data :dates,
		//dataType: 'json',
		success:function(res){
			$("#resultado").html(res);
		},
		error:function(error){
      console.error(error);
      Swal.fire({
        title: 'Error!',
        text: 'Ha ocurrido un error de consulta',
        icon: 'error',
        confirmButtonText: 'Aceptar'
      });
		}
	});
}
