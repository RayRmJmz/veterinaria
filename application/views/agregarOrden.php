<script src="<?=base_url()?>assets/newOrder.js"></script>

<!-- ************************************************************************* -->
<div class="content-wrapper">
	<div class="content">
		<div class="card">
		  <div class="card-header alert alert-primary ">
            
			 <b>Nueva orden de trabajo</b> 

		  </div>

		  <div class="card-body">
	
		  	<form  name="empleadosForm" method="post" action="<?=base_url()?>welcome/agregarOrden" onsubmit="return validateForm()" class="needs-validation" novalidate  >

		  		<div class="form-row">
			    	<h3>Cliente</h3>
			    </div>

		  		<div class="form-row">

				    <div class="form-group col-md-12">
				        <select class="selectClient"  style="width: 100%" name="cliente" id="cliente" required="" onchange="mascotas()" required=""></select>
				    </div>


			    </div>

			    <h3>Mascotas</h3>
			    <div class="form-row" id="mascota" >

			    </div>

			    <h3>Servicios</h3>
			    <div class="form-row" id="servicios">
	
			    </div>
			    <br>
			    <div class="input-group col-mb-3">
				  <div class="input-group-prepend">
				    <span class="input-group-text">Total $</span>
				  </div>
				  <input type="text" class="form-control" name="total" required="" pattern="[0-9]+\.[0-9]{2}" title="Número entero son dos decimales ejemplo 100.00" placeholder="Número entero son dos decimales ejemplo 100.00">
				</div>

			    <div class="input-group">
				  <div class="input-group-prepend">
				    <span class="input-group-text">Comentarios</span>
				  </div>
				  <textarea name="comentarios" class="form-control" aria-label="With textarea" placeholder=""></textarea>
				</div>


			    <br>
			    <button type="submit" class="btn btn-primary mb-2">Aceptar</button>
			    <a href="<?=base_url()?>welcome/ordenesActivas" type="button" class="btn btn-danger mb-2">Cancelar</a>
			    <p id="message"></p>
		  	</form>

		  </div>
		</div> 
	</div>
</div>

<!-- ************************************************************************* -->