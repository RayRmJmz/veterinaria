
<script src="<?=base_url()?>assets/articulos.js"></script>
<!-- ************************************************************************* -->
<div class="content-wrapper">
	<div class="content">
		<div class="card">
		  <div class="card-header alert alert-primary ">
            
			 <b>Agregar artículo</b> 

		  </div>

		  <div class="card-body">
	
		  	<form  name="empleadosForm" method="post" action="<?=base_url()?>welcome/insertArticulo" onsubmit="return validateForm()" class="needs-validation" novalidate >

		  		<div class="form-row">
				    <div class="form-group col-md-6">
				      <label for="articulo">Artículo</label>
				      <input type="text" class="form-control" id="articulo" name="articulo" required="">
				      <p id="message"></p>
				    </div>
				    <div class="form-group col-md-6">
				      <label for="marca">Marca</label>
				      <input type="text" class="form-control" id="marca" name="marca" required="">
				    </div>
			    </div>

			    <div class="form-row">
				    <div class="form-group col-md-6">
				      <label for="precio">Precio </label>
				      <input type="text" class="form-control" id="precio" name="precio" required="" pattern="[0-9]+\.[0-9]{2}" title="Número entero son dos decimales ejemplo 100.00">
				    </div>
				    <div class="form-group col-md-6">
				      <label for="existencia">Existencia </label>
				      <input type="text" class="form-control" id="existencia" name="existencia" required="" pattern="[0-9]{1,6}" title="Número entero">
				    </div>
			    </div>

			    <button type="submit" class="btn btn-primary mb-2">Aceptar</button>
			    <a href="<?=base_url()?>welcome/articulos" type="button" class="btn btn-danger mb-2">Cancelar</a>

		  	</form>

		  </div>
		</div> 
	</div>
</div>

