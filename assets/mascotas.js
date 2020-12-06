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

function mascotas(datos){
	d=datos.split('||');
	$('#edit_id_mascota').val(d[0]);
	$('#edit_nombre').val(d[1]);
	$('#edit_peso').val(d[2]);
	$('#edit_estatura').val(d[3]);
	$('#edit_fecha').val(d[4]);
	$('#edit_raza').val(d[5]);
	$('#edit_pelaje').val(d[6]);
	$('#edit_tamano').val(d[7]);

}

function getEspecies(){
	$('#addPet').modal('show')
	console.log("cargando especies");
	$.ajax({
		url:globalURL+'getEspecies',
		type: 'POST',
		dataType: 'html',
		//data :{id: id },
	})
	.done(function(resultado){
		$("#formEspecie").html(resultado);	
	})
}

function loadRazas(){
	var especie = document.getElementById("especie").value;
	
	console.log("cargando razas " + especie);
	
	$.ajax({
		url:globalURL+'loadRazas',
		type: 'POST',
		dataType: 'html',
		data :{especie: especie },
	})
	.done(function(resultado){
		$("#formRaza").html(resultado);	
	})


	$.ajax({
		url:globalURL+'loadPelaje',
		type: 'POST',
		dataType: 'html',
	})
	.done(function(resultado){
		$("#formPelaje").html(resultado);	
	})


	$.ajax({
		url:globalURL+'loadTamano',
		type: 'POST',
		dataType: 'html',
	})
	.done(function(resultado){
		$("#formTamano").html(resultado);	
	})

}

function addPet(){

	 var callInsert = false;
	 
	if (document.forms["petsForm"]["nombre"].value == "") {
    	document.getElementById('messName').innerHTML='Ingrese nombre mascota';
   		callInsert = false;
    }else{
    	document.getElementById('messName').innerHTML='';
    	callInsert = true;
    }

    if (document.forms["petsForm"]["peso"].value == "") {
    	document.getElementById('messPeso').innerHTML='Ingrese peso mascota';
    	callInsert = false;
    }else{
    	document.getElementById('messPeso').innerHTML='';
    	callInsert = true;
    }

    if (document.forms["petsForm"]["estatura"].value == "") {
    	document.getElementById('messEstatura').innerHTML='Ingrese estatura mascota';
    	callInsert = false;
    }else{
    	document.getElementById('messEstatura').innerHTML='';
    	 callInsert = true;
    }

    if (document.forms["petsForm"]["fecha"].value == "") {
    	document.getElementById('messDate').innerHTML='Ingrese fecha';
    	callInsert = false;
    }else{
    	document.getElementById('messDate').innerHTML='';
    	 callInsert = true;
    }

    if (document.forms["petsForm"]["especie"].value == 0) {
    	document.getElementById('messageEspecie').innerHTML='Seleccione especie mascota';
    	callInsert = false;
    }else{
    	document.getElementById('messageEspecie').innerHTML='';
    	 callInsert = true;
    }

    if (document.forms["petsForm"]["raza"].value == 0) {
    	document.getElementById('messageRaza').innerHTML='Seleccione raza mascota';
    	callInsert = false;
    }else{
    	document.getElementById('messageRaza').innerHTML='';
    	 callInsert = true;
    }

    if (document.forms["petsForm"]["tamano"].value == 0) {
    	document.getElementById('messageTamaño').innerHTML='Seleccione tamaño mascota';
    	callInsert = false;
    }else{
    	document.getElementById('messageTamaño').innerHTML='';
    	 callInsert = true;
    }

    if (document.forms["petsForm"]["pelaje"].value == 0) {
    	document.getElementById('messagePelaje').innerHTML='Seleccione pelaje mascota';
    	callInsert = false;
    }else{
    	document.getElementById('messagePelaje').innerHTML='';
    	callInsert = true;
    }
    
    if(callInsert){
    	var url = window.location.pathname;
		var id = url.substring(url.lastIndexOf('/') + 1);
    	var mascota = {
			id_cliente : id,
			id_raza : document.getElementById('raza').value,
			id_tamano : document.getElementById('tamano').value,
			id_pelaje : document.getElementById('pelaje').value,
			nombre : document.getElementById('nombre').value,
			fecha_nacimiento : document.getElementById('fecha').value,
			peso : document.getElementById('peso').value,
			estatura : document.getElementById('estatura').value
		}
		console.log(JSON.stringify(mascota));

		$.ajax({
			url:globalURL+'insertPet',
			method:'POST',
			data :mascota,
			//dataType: 'json',
			success:function(res){
				// $("#resultado").html(res);
				console.log(res);
				window.alert("Mascota agregada satisfactoriamente");
				obtener_mascotas();
			},
			error:function(error){
				//console.error(error);
				console.alert("Ha ocurrido un error: No se ha podido agregar mascota");
			}
		});
    	$('#addPet').modal('hide')
    }

}

function editPet(){

	var mascota = {
		id_mascota : document.getElementById('edit_id_mascota').value,
		nombre : document.getElementById('edit_nombre').value,
		fecha_nacimiento : document.getElementById('edit_fecha').value,
		peso : document.getElementById('edit_peso').value,
		estatura : document.getElementById('edit_estatura').value
	}

	$.ajax({
		url:globalURL+'editPet',
		method:'POST',
		data :mascota,
		//dataType: 'json',
		success:function(res){
			// $("#resultado").html(res);
			console.log(res);
			window.alert("Mascota actualizada satisfactoriamente");
			obtener_mascotas();
		},
		error:function(error){
			//console.error(error);
			console.alert("Ha ocurrido un error: No se ha podido actualizar mascota");
		}
	});


}


