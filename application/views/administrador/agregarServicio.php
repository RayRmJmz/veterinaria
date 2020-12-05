
<script src="<?=base_url()?>assets/servicios.js"></script>
<!-- ************************************************************************* -->
<div class="content-wrapper">
	<div class="content">
		<div class="card">
		  <div class="card-header alert alert-primary ">
            
			 <b>Agregar servicio</b> 

		  </div>

		  <div class="card-body">
	
		  	<form  name="empleadosForm" method="post" action="<?=base_url()?>welcome/insertServicio" onsubmit="return validateForm()" class="needs-validation" novalidate >

		  		<div class="form-group">
				      <label for="servicio">Servicio</label>
				      <input type="text" class="form-control" id="servicio" name="servicio" maxlength="30" required="" title="">
				      <p id="message"></p>
			    </div>

			    <div class="form-group">
				      <label for="descripcion">Descripción</label>
				      <input type="text" class="form-control" id="descripcion" name="descripcion" maxlength="200">
			    </div>

			    <button type="submit" class="btn btn-primary mb-2">Aceptar</button>
			    <a href="<?=base_url()?>welcome/servicios" type="button" class="btn btn-danger mb-2">Cancelar</a>

		  	</form>

		  </div>
		</div> 
	</div>
</div>

