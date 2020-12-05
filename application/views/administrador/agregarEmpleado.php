
<script src="<?=base_url()?>assets/empleados.js"></script>
<!-- ************************************************************************* -->
<div class="content-wrapper">
	<div class="content">
		<div class="card">
		  <div class="card-header alert alert-primary ">
            
			 <b>Agregar empleado</b> 

		  </div>

		  <div class="card-body">
	
		  	<form  name="empleadosForm" method="post" action="<?=base_url()?>welcome/insertEmpleado" onsubmit="return validateForm()" class="needs-validation" novalidate >

		  		<div class="form-row">

				    <div class="form-group col-md-4">
				      <label for="usuario">Usuario</label>
				      <input type="text" class="form-control" id="usuario" name="usuario" required="" title="SE RECOMIENDA USAR PRIMERA LETRA NOMBRE + PRIMER APELLIDO">
				      <p id="message"></p>
				    </div>

				    <div class="form-group col-md-4">
				      <label for="password">Contraseña</label>
				      <input type="password" class="form-control" id="password" name="password" required="" pattern="[0-9]{4}" title="Pin 4 dígitos" placeholder="Pin 4 dígitos">
				    </div>

				    <div class="form-group col-md-4">
				      <label for="password2">Confirmar Contraseña</label>
				      <input type="password" class="form-control" id="password2" required="" pattern="[0-9]{4}" title="Pin 4 dígitos" placeholder="Pin 4 dígitos">
				      <p id="confirm"></p>
				    </div>

			    </div>

			    <div class="form-group">
			      <label for="name">Nombre</label>
			      <input type="text" class="form-control" id="name" name="name" required="">
			    </div>

			    <div class="form-row">
				    <div class="form-group col-md-6">
				      <label for="apellido1">Primer apellido</label>
				      <input type="text" class="form-control" id="apellido1" name="apellido1" required="">
				    </div>
				    <div class="form-group col-md-6">
				      <label for="apellido2">Segundo apellido</label>
				      <input type="text" class="form-control" id="apellido2" name="apellido2" required="">
				    </div>
			    </div>
			    <div class="form-row">
				    <div class="form-group col-md-4">
				      <label for="celular">Numero celular</label>
				      <input type="tel" class="form-control" id="celular" placeholder="312..." name="celular" required="" pattern="[0-9]{10}" title="Número celular 10 dígitos">
				    </div>
				    <div class="form-group col-md-4">
				      <label for="rol">Rol</label>
				      <select id="rol" name="rol" class="form-control" required="">
				      		<option value="" selected="">Seleccionar...</option>
	                      <?php 
	                      foreach($roles->result() as $row) { ?>
	                      <?php echo '<option value="'.$row->id_rol.'">'.$row->rol.'</option>';  ?>
	                      <?php }  ?>
	                    </select>
				    </div>
				    <div class="form-group col-md-4">
				      <label for="puesto">puesto</label>
				      <select class="form-control" id="puesto" name="puesto" required="">
				      	<option value="" selected="">Seleccionar...</option>
	                      <?php 
	                      foreach($puestos->result() as $row) { ?>
	                      <?php echo '<option value="'.$row->id_puesto.'">'.$row->puesto.'</option>';  ?>
	                      <?php }  ?>
	                    </select>
				    </div>
			    </div>
			    <button type="submit" class="btn btn-primary mb-2">Aceptar</button>
			    <a href="<?=base_url()?>welcome/empleados" type="button" class="btn btn-danger mb-2">Cancelar</a>

		  	</form>

		  </div>
		</div> 
	</div>
</div>

<!-- ************************************************************************* -->