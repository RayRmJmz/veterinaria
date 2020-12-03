
<script src="<?=base_url()?>assets/clientes.js"></script>
<!-- ************************************************************************* -->
<div class="content-wrapper">
	<div class="content">
		<div class="card">
		  <div class="card-header alert alert-primary ">
            
			 <b>AGREGAR CLIENTE</b> 

		  </div>

		  <div class="card-body">
	
		  	<form  name="empleadosForm" method="post" action="<?=base_url()?>welcome/insertCliente" onsubmit="return validateForm()" class="needs-validation" novalidate  >

		  		<div class="form-row">
			    	<label for="usuario">DATOS DEL CLIENTE</label>
			    </div>

		  		<div class="form-row">

				    <div class="form-group col-md-4">
				      <label for="usuario">NOMBRE</label>
				      <input type="text" class="form-control" id="usuario" name="usuario" required="" style="text-transform:uppercase" autofocus="">
				      <p id="message"></p>
				    </div>

				    <div class="form-group col-md-4">
				      <label for="password">PRIMER APELLIDO</label>
				      <input type="text" class="form-control" id="password" name="password" required="" style="text-transform:uppercase" >
				    </div>

				    <div class="form-group col-md-4">
				      <label for="password2">SEGUNDO APELLIDO</label>
				      <input type="text" class="form-control" id="password2" required="" style="text-transform:uppercase" >
				    </div>

			    </div>

			    <div class="form-row">
			    	<label for="usuario">DATOS DE CONTACTO</label>
			    </div>

			    <div class="form-row">

				    <div class="form-group col-md-6">
				      <label for="usuario">NUMERO TELEFONO PERSONAL</label>
				      <input type="text" class="form-control" id="usuario" name="usuario" required="" required="" pattern="[0-9]{10}" title="NUMERO CELULAR 10 DIGITOS">
				      <p id="message"></p>
				    </div>

				    <div class="form-group col-md-6">
				      <label for="password">NUMERO TELEFONO CASA</label>
				      <input type="text" class="form-control" id="password" name="password" required="" required="" pattern="[0-9]{10}" title="NUMERO CELULAR 10 DIGITOS" >
				    </div>

			    </div>
			    <div class="form-row">
			    	<label for="usuario">DATOS DOMICILIO</label>
			    </div>
			    <div class="form-row">
				    <div class="form-group col-md-4">
				      <label for="apellido1">CALLE</label>
				      <input type="text" class="form-control" id="apellido1" name="apellido1" required="" style="text-transform:uppercase" >
				    </div>
				    <div class="form-group col-md-4">
				      <label for="apellido2">NUMERO DE CASA</label>
				      <input type="text" class="form-control" id="apellido2" name="apellido2" required="" style="text-transform:uppercase" >
				    </div>
				    <div class="form-group col-md-4">
				      <label for="apellido2">COLONIA</label>
				      <input type="text" class="form-control" id="apellido2" name="apellido2" required="" style="text-transform:uppercase" >
				    </div>
			    </div>

			     <div class="form-row">
				    <div class="form-group col-md-4">
				      <label for="apellido1">MUNICIPIO</label>
				      <input type="text" class="form-control" id="apellido1" name="apellido1" required="" style="text-transform:uppercase" >
				    </div>
				    <div class="form-group col-md-4">
				      <label for="apellido2">CP</label>
				      <input type="text" class="form-control" id="apellido2" name="apellido2" required="" style="text-transform:uppercase" >
			    	</div>
			    </div>

			    <button type="submit" class="btn btn-primary mb-2">Aceptar</button>
			    <a href="<?=base_url()?>welcome/clientes" type="button" class="btn btn-danger mb-2">Cancelar</a>

		  	</form>

		  </div>
		</div> 
	</div>
</div>

<!-- ************************************************************************* -->