//url 
var url='http://localhost:82/mision/welcome/';

//$(obtener_registros());

function inicio(){
	obtener_registros();
	document.getElementById("pdf").disabled = "disabled";
	document.getElementById("vista").disabled = "disabled";
	validar();
}

function obtener_registros(){
	$.ajax({
		url:url+'incidenciasTest',
		type: 'POST',
		dataType: 'html',
	})
	.done(function(resultado){
		$("#selectResult").html(resultado);	
	})
}

function calcularDias(f1,f2){
	var fechaI = String(f1);
	var fechaF =String(f2);
	var aFecha1 = fechaI.split('-');
	 var aFecha2 = fechaF.split('-');
	 var fFecha1 = Date.UTC(aFecha1[0],aFecha1[1]-1,aFecha1[2]);
	 var fFecha2 = Date.UTC(aFecha2[0],aFecha2[1]-1,aFecha2[2]);
	 var dif = fFecha2 - fFecha1;
	 var dias = Math.floor(dif / (1000 * 60 * 60 * 24));
	 return dias;

}


function generaIncidencias(){
	console.log("enviar");


	var fechaInicial = document.getElementById('fechaInicial').value;
	var fechaFinal = document.getElementById('fechaFinal').value;
		
	var area = document.getElementById('area').value;
	var datos ="fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal+"&area="+area;

	$.ajax({
		url: url+'generarIncidencias',
		type: 'POST',
		dataType: 'html',
		data: datos,
	})
	.done(function(respuesta){
		$("#tablaResultado").html(respuesta);	
	})

}

function validar(){
	
	console.log("validando");
	if($('#fechaInicial').val().length == 0){
		console.log("Ingrese fecha inicial");
		document.getElementById("vista").disabled = "disabled";
		document.getElementById("pdf").disabled = "disabled";
	}else{
		if($('#fechaFinal').val().length == 0){
			console.log("Ingrese fecha final");	
			document.getElementById("vista").disabled = "disabled";
			document.getElementById("pdf").disabled = "disabled";
		}else{

			if($('#fechaFinal').val()<$('#fechaInicial').val()){
				alert("Fecha final debe ser superior a la inicial");

				document.getElementById("vista").disabled = "disabled";
				document.getElementById("pdf").disabled = "disabled";
			}else{
				var fechaInicial = document.getElementById('fechaInicial').value;
				var fechaFinal = document.getElementById('fechaFinal').value;
				var dias = calcularDias(fechaInicial,fechaFinal);
				console.log(dias);
				if(dias>15){
					document.getElementById("pdf").disabled = "disabled";
					document.getElementById("vista").disabled = "disabled";
					alert("No se puede hacer consulta mayor de 16 dias");
				}else{
					document.getElementById("pdf").disabled = "";	
					document.getElementById("vista").disabled = "";
				}
			}
		}
	}

}
