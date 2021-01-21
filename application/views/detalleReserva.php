<div class="content-wrapper">
	<div class="content">
		<div class="card">
		  <div class="card-header alert alert-primary ">
            
			 <b>test</b> 

		  </div>

		  <div class="card-body">
	
		  	<form  name="empleadosForm" method="post" action="<?=base_url()?>welcome/insertReserva" onsubmit="return validateForm()" class="needs-validation" novalidate  >

		  		<div class="form-row">
		  			<input type="checkbox" name="">
			    	<label for="servicios">Servicios</label>
			    </div>





			    <button type="submit" class="btn btn-primary mb-2">Aceptar</button>
			    <a href="<?=base_url()?>welcome/reservas" type="button" class="btn btn-danger mb-2">Cancelar</a>
			    <p id="message"></p>
		  	</form>

		  </div>
		</div> 
	</div>
</div>