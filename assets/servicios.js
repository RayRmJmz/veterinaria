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

/************************************************/
function verificaServicio(cadena){
	$.ajax({
		url:globalURL+'checkServicio',
		type: 'POST',
		dataType: 'html',
		data :{cadena: cadena },
	})
	.done(function(resultado){
		$("#message").html(resultado);
	})
}

/*Verifica que el servico no exista*/
$(document).on('keyup','#servicio',function(){
	var valorBusqueda =$(this).val();
	console.log("Verificando SERVICIO");
	if(valorBusqueda!=""){
		verificaServicio(valorBusqueda);
	}else{
		verificaServicio();
	}
});



// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();


function servicios(datos){
	//console.log("editar empleado");
	d=datos.split('||');
	$('#id_servicio').val(d[0]);
	$('#servicio').val(d[1]);
	$('#descripcion').val(d[2]);

}

function removeServicios(datos){
	//console.log("editar empleado");
	d=datos.split('||');
	$('#remove_id_servicio').val(d[0]);
	$('#remove_servicio').val(d[1]);
	$('#remove_descripcion').val(d[2]);
}
 /*****************************************************/
 function updateServicio(){
	var servicio = {
		id_servicio : document.getElementById('id_servicio').value,
		servicio : document.getElementById('servicio').value,
		descripcion : document.getElementById('descripcion').value
	}

	$.ajax({
		url:globalURL+'updateServicio',
		method:'POST',
		data :servicio,
		//dataType: 'json',
		success:function(res){
			// $("#resultado").html(res);
      console.log(res);
      Swal.fire({
        title: '',
        text: 'Datos del servicio actualizados',
        icon: 'success',
        confirmButtonText: 'Aceptar'
      });
			obtener_servicios();
		},
		error:function(error){
      console.error(error);
      Swal.fire({
        title: 'Error!',
        text: 'No se ha podido actualizar',
        icon: 'error',
        confirmButtonText: 'Aceptar'
      });
		}
	});
}

function removeServicio(){
	var servicio = {
		id_servicio : document.getElementById('remove_id_servicio').value
	}

	$.ajax({
		url:globalURL+'removeServicio',
		method:'POST',
		data :servicio,
		//dataType: 'json',
		success:function(res){
			// $("#resultado").html(res);
      console.log(res);
      Swal.fire({
        title: '',
        text: 'servicio dado de baja satisfactoriamente',
        icon: 'success',
        confirmButtonText: 'Aceptar'
      });
			obtener_servicios();
		},
		error:function(error){
      console.error(error);
      Swal.fire({
        title: 'Error!',
        text: 'No se ha podido dar de baja el servicio',
        icon: 'error',
        confirmButtonText: 'Aceptar'
      });
		}
	});
}

