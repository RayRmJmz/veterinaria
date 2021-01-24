
<script src="<?=base_url()?>assets/empleados.js"></script>
<!-- ************************************************************************* -->
<div class="content-wrapper">
	<div class="content">
    <div class="card" style="box-shadow: 0 0 30px 0 rgba(82,63,105,.05);
      border: 0;">
      <div class="card-header alert" style="background: #fff;">
        <b style="font-weight: 500;
      font-size: 1.275rem;
      color: #181c32; ">Agregar Empleado</b>
      </div>
      <form  name="empleadosForm" method="post" action="<?=base_url()?>welcome/insertEmpleado" onsubmit="return validateForm()" class="needs-validation" novalidate >
		    <div class="card-body" style="border-top: 1px solid #ebedf3;">
		  		<div class="form-group row">
				    <div class="col-md-4">
				      <label for="usuario">Usuario</label>
              <div class="input-group">
                <div class="input-group-prepend"><span class="input-group-text"><i class="la la-user"></i></span></div>
                <input type="text" class="form-control" placeholder="Usuario" id="usuario" name="usuario" required="" title="SE RECOMIENDA USAR PRIMERA LETRA NOMBRE + PRIMER APELLIDO">
              </div>
              <span id="message" class="form-text text-muted"></span>
				    </div>
				    <div class="col-md-4">
				      <label for="password">Contraseña</label>
				      <input type="password" class="form-control" id="password" name="password" required="" pattern="[0-9]{4}" title="Pin 4 dígitos" placeholder="Ingresa un pin de 4 dígitos">
				    </div>
				    <div class="col-md-4">
				      <label for="password2">Confirmar contraseña</label>
				      <input type="password" class="form-control" id="password2" required="" pattern="[0-9]{4}" title="Pin 4 dígitos" placeholder="Ingresa nuevamente el pin de 4 dígitos">
				      <p id="confirm"></p>
				    </div>
			    </div>

			    <div class="form-group row">
            <div class="col-md-4">
              <label for="name">Nombre</label>
              <input type="text" placeholder="Ingresa el nombre del empleado" class="form-control" id="name" name="name" required="">
			      </div>

				    <div class="col-md-4">
				      <label for="apellido1">Primer apellido</label>
				      <input type="text" placeholder="Ingresa primer apellido del empleado" class="form-control" id="apellido1" name="apellido1" required="">
				    </div>

				    <div class="col-md-4">
				      <label for="apellido2">Segundo apellido</label>
				      <input type="text" placeholder="Ingresa segundo apellido del empleado" class="form-control" id="apellido2" name="apellido2" required="">
				    </div>
			    </div>

			    <div class="form-group row">
				    <div class="col-md-4">
				      <label for="celular">Celular</label>
				      <input type="tel" class="form-control" id="celular" placeholder="Ej. 3123206062" name="celular" required="" pattern="[0-9]{10}" title="Número celular 10 dígitos">
				    </div>
				    <div class="col-md-4">
				      <label for="rol">Rol</label>
				      <select id="rol" name="rol" class="form-control" required="">
				      		<option value="" selected="">Seleccionar...</option>
	                      <?php
	                      foreach($roles->result() as $row) { ?>
	                      <?php echo '<option value="'.$row->id_rol.'">'.$row->rol.'</option>';  ?>
	                      <?php }  ?>
	                    </select>
				    </div>
				    <div class="col-md-4">
				      <label for="puesto">Puesto</label>
				      <select class="form-control" id="puesto" name="puesto" required="">
				      	<option value="" selected="">Seleccionar...</option>
	                      <?php
	                      foreach($puestos->result() as $row) { ?>
	                      <?php echo '<option value="'.$row->id_puesto.'">'.$row->puesto.'</option>';  ?>
	                      <?php }  ?>
	                    </select>
				    </div>
			    </div>
          </div>
          <div class="card-footer" style="background: #fff">
            <div class="row">
              <div class="col-lg-4"></div>
              <div class="col-lg-8">
                <button type="submit" class="btn btn-primary mb-2">Aceptar</button>
                <a href="<?=base_url()?>welcome/empleados" type="button" class="btn btn-secondary mb-2">Cancelar</a>
              </div>
            </div>
          </div>
		  	</form>
		  </div>
		</div>
	</div>
</div>
