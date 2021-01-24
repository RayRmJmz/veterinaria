
<script src="<?=base_url()?>assets/clientes.js"></script>
<!-- ************************************************************************* -->
<div class="content-wrapper">
	<div class="content">
		<div class="card" style="box-shadow: 0 0 30px 0 rgba(82,63,105,.05);
      border: 0;">
		  <div class="card-header alert" style="background: #fff; margin-bottom: 0;">
			  <b style="font-weight: 500;
      font-size: 1.275rem;
      color: #181c32; ">Agregar cliente</b>
		  </div>

      <form  name="empleadosForm" method="post" action="<?=base_url()?>welcome/insertCliente" onsubmit="return validateForm()" class="needs-validation" novalidate  >
        <div class="card-body" style="border-top: 1px solid #ebedf3;">
		  		<div class="form-row">
			    	<label >Datos del cliente</label>
			    </div>

		  		<div class="form-row">

				    <div class="form-group col-md-4">
				      <label for="nombre">Nombre</label>
				      <input type="text" class="form-control" placeholder="Ingrese nombre del cliente" id="nombre" name="nombre" required autofocus="">

				    </div>

				    <div class="form-group col-md-4">
				      <label for="apellido1">Primer apellido</label>
				      <input type="text" placeholder="Ingrese primer apellido del cliente" class="form-control" id="apellido1" name="apellido1" required>
				    </div>

				    <div class="form-group col-md-4">
				      <label for="apellido2">Segundo apellido</label>
				      <input type="text" placeholder="Ingrese segundo apellido del cliente" class="form-control" id="apellido2" name="apellido2" required>
				    </div>

			    </div>

			    <div class="form-row">
			    	<label for="usuario">Datos de contacto</label>
			    </div>

			    <div class="form-row">

				    <div class="form-group col-md-6">
				      <label for="celular">Número celular</label>
				      <input type="text" placeholder="Ingrese número de celular (Ej. 3123206062)"class="form-control" id="celular" name="celular" required="" required="" pattern="[0-9]{10}" title="Número de teléfono 10 dígitos">

				    </div>

				    <div class="form-group col-md-6">
				      <label for="telefono">Número teléfono de casa</label>
				      <input type="text" class="form-control" id="telefono" name="telefono" required="" pattern="[0-9]{10}" title="Número de teléfono 10 dígitos" >
				    </div>

			    </div>
			    <div class="form-row">
			    	<label for="usuario">Datos domicilio</label>
			    </div>
			    <div class="form-row">
				    <div class="form-group col-md-4">
				      <label for="calle">Calle</label>
				      <input type="text" placeholder="Ingrese calle" class="form-control" id="calle" name="calle" required>
				    </div>
				    <div class="form-group col-md-4">
				      <label for="numero">Número de casa</label>
				      <input type="text" placeholder="Ingrese no. de casa" class="form-control" id="numero" name="numero" required>
				    </div>
				    <div class="form-group col-md-4">
				      <label for="colonia">Colonia</label>
				      <input type="text" placeholder="Ingrese nombre de la colonia" class="form-control" id="colonia" name="colonia" required>
				    </div>
			    </div>

			     <div class="form-row">
				    <div class="form-group col-md-4">
				      <label for="municipio">Municipio</label>
				      <select name="municipio" id="municipio" required="" class="form-control">
				      	<option value="Colima">Colima</option>
				      	<option value="Villa de Álvarez">Villa de Álvarez</option>
				      	<option value="Coquimatlán">Coquimatlán</option>
				      	<option value="Manzanillo">Manzanillo</option>
				      	<option value="Comala">Comala</option>
				      	<option value="Armería">Armería</option>
				      	<option value="Cuauhtémoc">Cuauhtémoc</option>
				      	<option value="Tecomán">Tecomán</option>
				      	<option value="Minatitlán">Minatitlán</option>
				      	<option value="Ixtlahuacan">Ixtlahuacán</option>
				      </select>
				    </div>
				    <div class="form-group col-md-4">
				      <label for="cp">C.P.</label>
				      <input type="text" placeholder="Ingrese código postal" class="form-control" id="cp" name="cp" required="" pattern="[0-9]{5}" title="Código potal de 5 dígitos">
			    	</div>
			    </div>
        </div>
        <div class="card-footer" style="background: #fff">
            <div class="row">
              <div class="col-lg-4"></div>
              <div class="col-lg-8">
                <button type="submit" class="btn btn-primary mb-2">Aceptar</button>
                <a href="<?=base_url()?>welcome/clientes" type="button" class="btn btn-secondary mb-2">Cancelar</a>
                <p id="message"></p>
              </div>
            </div>
          </div>


      </form>
		</div>
	</div>
</div>

<!-- ************************************************************************* -->
