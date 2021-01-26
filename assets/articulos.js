/****MOSTRA DATOS AL CARGAR LA VISTA*/
$(obtener_articulos());

function obtener_articulos(cadena){
	$.ajax({
		url:globalURL+'articulosSearch',
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
		obtener_articulos(valorBusqueda);
	}else{
		obtener_articulos();
	}
});


/************************************************/
function verificaArticulo(cadena){
	$.ajax({
		url:globalURL+'checkArticulo',
		type: 'POST',
		dataType: 'html',
		data :{cadena: cadena },
	})
	.done(function(resultado){
		$("#message").html(resultado);
	})
}

/*Verifica que el servico no exista*/
$(document).on('keyup','#articulo',function(){
	var valorBusqueda =$(this).val();
	console.log("Verificando articulo");
	if(valorBusqueda!=""){
		verificaArticulo(valorBusqueda);
	}else{
		verificaArticulo();
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

function articulos(datos){
	//console.log("editar empleado");
	d=datos.split('||');
	$('#id_articulo').val(d[0]);
	$('#articulo').val(d[1]);
	$('#marca').val(d[2]);
	$('#precio').val(d[3]);
	$('#existencia').val(d[4]);

}

function removeArticulos(datos){
	//console.log("editar empleado");
	d=datos.split('||');
	$('#remove_id_articulo').val(d[0]);
	$('#remove_articulo').val(d[1]);
	$('#remove_marca').val(d[2]);
	$('#remove_precio').val(d[3]);
	$('#remove_existencia').val(d[4]);
}
 /*****************************************************/
 /******************************************************/
 function updateArticulo(){
	var articulo = {
		id_articulo : document.getElementById('id_articulo').value,
		articulo : document.getElementById('articulo').value,
		marca : document.getElementById('marca').value,
		precio : document.getElementById('precio').value,
		existencia : document.getElementById('existencia').value
	}

	$.ajax({
		url:globalURL+'updateArticulo',
		method:'POST',
		data :articulo,
		//dataType: 'json',
		success:function(res){
			// $("#resultado").html(res);
      console.log(res);
      Swal.fire({
        title: '',
        text: 'Datos del artículo actualizados',
        icon: 'success',
        confirmButtonText: 'Aceptar'
      });
			obtener_articulos();
		},
		error:function(error){
      console.error(error);
      Swal.fire({
        title: 'Error!',
        text: 'El artículo no se ha podido actualizar',
        icon: 'error',
        confirmButtonText: 'Aceptar'
      });
		}
	});
}

function removeArticulo(){
	var articulo = {
		id_articulo : document.getElementById('remove_id_articulo').value
	}

	$.ajax({
		url:globalURL+'removeArticulo',
		method:'POST',
		data :articulo,
		//dataType: 'json',
		success:function(res){
			// $("#resultado").html(res);
      console.log(res);
      Swal.fire({
        title: '',
        text: 'Artículo dado de baja satisfactoriamente',
        icon: 'success',
        confirmButtonText: 'Aceptar'
      });
			obtener_articulos();
		},
		error:function(error){
      console.error(error);
      Swal.fire({
        title: 'Error!',
        text: 'El artículo no se ha podido actualizar',
        icon: 'error',
        confirmButtonText: 'Aceptar'
      });
		}
	});
}

