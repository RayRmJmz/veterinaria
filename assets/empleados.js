/****MOSTRA DATOS AL CARGAR LA VISTA*/
$(obtener_empleados());

function obtener_empleados(cadena){
	$.ajax({
		url:globalURL+'empleadoSearch',
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
		obtener_empleados(valorBusqueda);
	}else{
		obtener_empleados();
	}
});

/************************************************/
function verificaUsuario(cadena){
	$.ajax({
		url:globalURL+'verificaUsuario',
		type: 'POST',
		dataType: 'html',
		data :{cadena: cadena },
	})
	.done(function(resultado){
		$("#message").html(resultado);
	})
}

/*Verifica que el usario este disponible*/
$(document).on('keyup','#usuario',function(){
	var valorBusqueda =$(this).val();
	//console.log("Verificando usuario");
	if(valorBusqueda!=""){
		verificaUsuario(valorBusqueda);
	}else{
		verificaUsuario();
	}
});




function empleados(datos){
	//console.log("editar empleado");
	d=datos.split('||');
	$('#id_empleado').val(d[0]);
	$('#usuario').val(d[1]);
	$('#nombre').val(d[2]);
	$('#apellido1').val(d[3]);
	$('#apellido2').val(d[4]);
	$('#celular').val(d[5]);
	$('#fecha_alta').val(d[6]);
	$('#id_puesto').val(d[7]);
	$('#id_rol').val(d[8]);
}

function updatePassword(datos){
	d=datos.split('||');
	$('#update_id_empleado').val(d[0]);
	$('#update_usuario').val(d[1]);
}

function removeEmpleados(datos){
	//console.log("editar empleado");
	d=datos.split('||');
	$('#remove_id_empleado').val(d[0]);
	$('#remove_usuario').val(d[1]);
	$('#remove_nombre').val(d[2]);
	$('#remove_apellido1').val(d[3]);
	$('#remove_apellido2').val(d[4]);
	$('#remove_celular').val(d[5]);
	$('#remove_fecha_alta').val(d[6]);
	$('#remove_id_puesto').val(d[7]);
	$('#remove_id_rol').val(d[8]);
}



function validateForm(){
	var elemento = document.getElementById("id_cliente").value;
	if(elemento== "Usuario no disponible"){
		alert("USUARIO YA EXISTE, INGRESE OTRO USUARIO");
		return false;
	}

    if (document.forms["empleadosForm"]["usuario"].value == "") {
    alert("INGRESE USUARIO");
    return false;
    }

    if (document.forms["empleadosForm"]["password"].value == "") {
    alert("INGRESE CONTRASEÑA");
    return false;
    }

    if (document.forms["empleadosForm"]["password2"].value == "") {
    alert("INGRESE CONTRASEÑA PARA VERIFICAR");
    return false;
    }
    if (document.forms["empleadosForm"]["password2"].value != document.forms["empleadosForm"]["password"].value) {
    alert("CONTRASEÑAS NO COINCIDEN");
    return false;
    }

    if (document.forms["empleadosForm"]["name"].value == "") {
    alert("INGRESE NOMBRE");
    return false;
    }

    if (document.forms["empleadosForm"]["apellido1"].value == "") {
    alert("INGRESE PRIMER APELLIDO");
    return false;
    }

    if (document.forms["empleadosForm"]["apellido2"].value == "") {
    alert("INGRESE SEGUNDO APELLIDO");
    return false;
    }

    if (document.forms["empleadosForm"]["celular"].value == "") {
    alert("INGRESE NUMERO CELULAR");
    return false;
    }

    if (document.forms["empleadosForm"]["rol"].value == "") {
    alert("SELECCIONE ROL");
    return false;
    }

    if (document.forms["empleadosForm"]["puesto"].value == "") {
    alert("SELECCIONE PUESTO");
    return false;
    }

}

// Valida contraseña sea iguales
$(document).on('keyup','#password2',function(){
	var pass1 = document.forms["empleadosForm"]["password"].value;
	var pass2 = document.forms["empleadosForm"]["password2"].value;
	if(pass2 != ""){
		if(pass1 == pass2){
		$("#confirm").html("");
		}else{
			$("#confirm").html("contraseña no coincide");
			return false;
		}
	}

});

$(document).on('keyup','#password',function(){
	var pass1 = document.forms["empleadosForm"]["password"].value;
	var pass2 = document.forms["empleadosForm"]["password2"].value;
	$("#confirm").html("");
	if(pass2 != ""){
		if(pass1 == pass2){
		$("#confirm").html("");
		}else{
			$("#confirm").html("contraseña no coincide");
			return false;
		}
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

/************************************************************************/


function updateEmpleado(){
	var empleado = {
		id_empleado : document.getElementById('id_empleado').value,
		nombre : document.getElementById('nombre').value,
		apellido1 : document.getElementById('apellido1').value,
		apellido2 : document.getElementById('apellido2').value,
		celular : document.getElementById('celular').value,
		puesto : document.getElementById('puesto').value,
		rol : document.getElementById('rol').value
	}

	$.ajax({
		url:globalURL+'updateEmpleado',
		method:'POST',
		data :empleado,
		//dataType: 'json',
		success:function(res){
			// $("#resultado").html(res);
      console.log(res);
      Swal.fire({
        title: '',
        text: 'Datos de usuario actualizados',
        icon: 'success',
        confirmButtonText: 'Aceptar'
      });
			obtener_empleados();
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

function updatePassEmpleado(){
	var empleado = {
		id_empleado : document.getElementById('update_id_empleado').value,
		password 	: document.getElementById('password').value
	}

	$.ajax({
		url:globalURL+'updatePassEmpleado',
		method:'POST',
		data :empleado,
		//dataType: 'json',
		success:function(res){
			// $("#resultado").html(res);
			console.log(res);
			Swal.fire({
        title: '',
        text: 'Contraseña actualizada satisfactoriamete',
        icon: 'success',
        confirmButtonText: 'Aceptar'
      }),
			obtener_empleados();
		},
		error:function(error){
      console.error(error);
      Swal.fire({
        title: 'Error!',
        text: 'No se ha podido actualizar la contraseña',
        icon: 'error',
        confirmButtonText: 'Aceptar'
      })
		}
	});
}

function removeEmpleado(){
	var empleado = {
		id_empleado : document.getElementById('remove_id_empleado').value
	}

	$.ajax({
		url:globalURL+'removeEmpleado',
		method:'POST',
		data :empleado,
		//dataType: 'json',
		success:function(res){
			// $("#resultado").html(res);
      console.log(res);
      Swal.fire({
        title: '',
        text: 'Empleado dado de baja satisfactoriamente',
        icon: 'success',
        confirmButtonText: 'Aceptar'
      }),
			obtener_empleados();
		},
		error:function(error){
			console.error(error);
			Swal.fire({
        title: 'Error!',
        text: 'El empleado no se pudo dar de baja',
        icon: 'error',
        confirmButtonText: 'Aceptar'
      })
		}
	});
}
