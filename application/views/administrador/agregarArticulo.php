
<script src="<?=base_url()?>assets/articulos.js"></script>
<!-- ************************************************************************* -->
<div class="content-wrapper">
	<div class="content">
		<div class="card">
		  <div class="card-header alert alert-primary ">
            
			 <b>AGREGAR ARTICULO</b> 

		  </div>

		  <div class="card-body">
	
		  	<form  name="empleadosForm" method="post" action="<?=base_url()?>welcome/insertArticulo" onsubmit="return validateForm()" class="needs-validation" novalidate >

		  		<div class="form-row">
				    <div class="form-group col-md-6">
				      <label for="articulo">ARTICULO</label>
				      <input type="text" class="form-control" id="articulo" name="articulo" required="" style="text-transform:uppercase" >
				      <p id="message"></p>
				    </div>
				    <div class="form-group col-md-6">
				      <label for="marca">MARCA</label>
				      <input type="text" class="form-control" id="marca" name="marca" required="" style="text-transform:uppercase" >
				    </div>
			    </div>

			    <div class="form-row">
				    <div class="form-group col-md-6">
				      <label for="precio">PRECIO </label>
				      <input type="text" class="form-control" id="precio" name="precio" required="" pattern="[0-9]+\.[0-9]{2}" title="NUMERO ENTERO CON DOS DECIMALES EJEMPLO 100.00">
				    </div>
				    <div class="form-group col-md-6">
				      <label for="existencia">EXISTENCIA </label>
				      <input type="text" class="form-control" id="existencia" name="existencia" required="" pattern="[0-9]{1,6}" title="NUMERO ENTERO">
				    </div>
			    </div>

			    <button type="submit" class="btn btn-primary mb-2">Aceptar</button>
			    <a href="<?=base_url()?>welcome/articulos" type="button" class="btn btn-danger mb-2">Cancelar</a>

		  	</form>

		  </div>
		</div> 
	</div>
</div>

