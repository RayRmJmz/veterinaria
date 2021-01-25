$(document).ready(function() {
    $('.selectItem').select2({
    	placeholder: 'Buscar artículo por folio o nombre',
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