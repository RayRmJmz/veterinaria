$(document).ready(function() {
    $('.selectClient').select2({
    	placeholder: 'Buscar cliente por nombre, apellido, número telefónico',
    	width: 'resolve',
    	minimumInputLength: 1,
    	ajax:{
    		url:globalURL+'getClientReservation',
			dataType: 'json',
			type: 'POST',
			delay: 250,
			data : function(params){
				return {
			        q: params.term, 
			    };
			},
			processResults: function(data){
				return {
					results: data
				};
			},
    	cache: true
    }
    });
});


function mascotas() {
	var id_cliente = document.getElementById("cliente").value;
	console.log(id_cliente);
	$.ajax({
		url:globalURL+'getMascotaReservation',
		type: 'POST',
		dataType: 'html',
		data :{id_cliente: id_cliente},
	})
	.done(function(resultado){
		$("#mascota").html(resultado);	
		servicios();

	})
}

function servicios() {;
	$.ajax({
		url:globalURL+'getServiciosReservation',
		type: 'POST',
		dataType: 'html',
	})
	.done(function(resultado){
		$("#servicios").html(resultado);	
	})
}

function onlyOne(checkbox) {
    var checkboxes = document.getElementsByName('mascota')
    checkboxes.forEach((item) => {
        if (item !== checkbox) item.checked = false
    })
}


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