/****MOSTRA DATOS AL CARGAR LA VISTA*/
$(obtener_clientes());

function obtener_clientes(cadena){
	$.ajax({
		url:globalURL+'clienteSearch',
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
		obtener_clientes(valorBusqueda);
	}else{
		obtener_clientes();
	}
});


/*************************************************/
function verificaCliente(cadena){

	$.ajax({
		url:globalURL+'checkCliente',
		method:'POST',
		data :cadena,
		//dataType: 'json',
		success:function(res){
			// $("#resultado").html(res);
			$("#message").html(res);
		},
		error:function(error){

		}
	});
}

/*Verifica que el usario este disponible*/
$(document).on('keyup','#celular',function(){
	var cliente = {
		nombre : document.getElementById('nombre').value,
		apellido1 : document.getElementById('apellido1').value,
		apellido2 : document.getElementById('apellido2').value,
		celular : document.getElementById('celular').value
	}
	console.log("Verificando cliente");
	if(cliente!=""){
		verificaCliente(cliente);
	}else{
		verificaCliente();
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

function clientes(datos){
	//console.log("editar empleado");
	d=datos.split('||');
	$('#id_cliente').val(d[0]);
	$('#nombre').val(d[1]);
	$('#apellido1').val(d[2]);
	$('#apellido2').val(d[3]);
	$('#telefono').val(d[4]);
	$('#celular').val(d[5]);
	$('#calle').val(d[6]);
	$('#numero').val(d[7]);
	$('#colonia').val(d[8]);
	$('#municipio').val(d[9]);
	$('#cp').val(d[10]);

}


function updateCliente(){
	var cliente = {
		id_cliente : document.getElementById('id_cliente').value,
		nombre : document.getElementById('nombre').value,
		apellido1 : document.getElementById('apellido1').value,
		apellido2 : document.getElementById('apellido2').value,
		celular : document.getElementById('celular').value,
		telefono : document.getElementById('telefono').value,
		calle : document.getElementById('calle').value,
		numero : document.getElementById('numero').value,
		colonia : document.getElementById('colonia').value,
		municipio : document.getElementById('municipio').value,
		cp : document.getElementById('cp').value
	}

	$.ajax({
		url:globalURL+'updateCliente',
		method:'POST',
		data :cliente,
		//dataType: 'json',
		success:function(res){
			// $("#resultado").html(res);
      console.log(res);
      Swal.fire({
        title: '',
        text: 'Datos de cliente actualizados satasfactoriamente',
        icon: 'success',
        confirmButtonText: 'Aceptar'
      });
			obtener_clientes();
		},
		error:function(error){
      console.error(error);
      Swal.fire({
        title: 'Error!',
        text: 'El cliente no se ha podido actualizar',
        icon: 'error',
        confirmButtonText: 'Aceptar'
      });
		}
	});
}
/*********************************************************************************/
