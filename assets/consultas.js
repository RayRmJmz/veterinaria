var url='http://localhost:82/mision/welcome/';
$(obtener_registros());

function obtener_registros(cadena){
	$.ajax({
		url:url+'bit',
		type: 'POST',
		dataType: 'html',
		data :{cadena: cadena },
	})
	.done(function(resultado){
		$("#resultado").html(resultado);	
	})
}

$(document).on('keyup','#busqueda',function(){
	var valorBusqueda =$(this).val();
	console.log("escribiendo..");
	if(valorBusqueda!=""){
		obtener_registros(valorBusqueda);
	}else{
		obtener_registros();
	}
});

function consulta(datos){
	d=datos.split('||');
	$('#id_usuario').val(d[0]);
	$('#nombre').val(d[1]);
	$('#appaterno').val(d[2]);	
	$('#apmaterno').val(d[3]);
	$('#area').val(d[4]);

}

function reporteFechas(){
	var fechaInicial = document.getElementById('fechaInicial').value;
	var fechaFinal = document.getElementById('fechaFinal').value;
	console.log("reporteFechas");
	var bandera=null;

	if($('#fechaInicial').val().length == 0){
		alert("Ingrese fecha inicial");
		bandera='no';
	}else{
		if($('#fechaFinal').val().length == 0){
			alert("Ingrese fecha final");	
			bandera='no';
		}else{
			bandera=null;
		}
	}

	if($('#fechaFinal').val()<$('#fechaInicial').val()){
		alert("Fecha final debe ser superior a la inicial");
		bandera='no';
	}else{
		bandera=null;
	}


	if(bandera==null){
		console.log("bandera null");
		var datos ="fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal;

		$.ajax({
			url: url+'cunsulta_dias',
			type: 'POST',
			dataType: 'html',
			data: datos,
		})
		.done(function(respuesta){
			$("#tableResult").html(respuesta);	
		})
	}else{
	}


}