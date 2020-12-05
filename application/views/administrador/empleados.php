<script src="<?=base_url()?>assets/empleados.js"></script>
<link rel="stylesheet" href="<?=base_url()?>assets/css/empleados.css">

<!-- ************************************************************************* -->
<div class="content-wrapper wrapper">
	<div class="content">
		<div class="card card-container" style="overflow-y: auto;">
		  <div class="card-header card-search">
        <div class="row container-search">
          <div class="search">
            <section class="search-input">
              <input type="text" name="busqueda" id="busqueda" placeholder="Buscar empleado por nombre, apellido, puesto..." class="form-control mb-6" >
            </section>
          </div>
          <div class="btn-add_empleado">
            <a href="<?=base_url()?>welcome/agregarEmpleado" class="btn btn-danger">Agregar Empleado</a>
          </div>
        </div>
		  </div>
		  <div class="card-body">
        <section id="resultado"></section>
		  </div>
		</div>
	</div>
</div>

<!-- ************************************************************************* -->

<div class="modal fade" id="editarEmpleado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" >
    <div class="modal-content">
      <div class="modal-header alert alert-primary">
        <h5 class="modal-title " id="exampleModalLabel">Editar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form>  

              <div class="form row">
                <div class="col form-group">
                    <input class="form-control" type="text" name="id_empleado" value="" id="id_empleado" hidden="">
                    <label for="nombre">Nombre</label>
                    <input class="form-control" type="text" name="nombre" value="" id="nombre" required="">
                  </div>
              </div>

              <div class="form row">
                  <div class="col form-group">
                    <label for="apellido1">Primer apellido</label>
                    <input class="form-control" type="text" name="apellido1" value="" id="apellido1" required="">
                  </div>
                  <div class="col form-group">
                    <label for="apellido2">Segundo apellido</label>
                    <input class="form-control" type="tel" name="apellido2" value="" id="apellido2">
                  </div>
              </div>

              <div class="form row">
                  <div class="col form-group">
                    <label for="celular">Número celular</label>
                    <input class="form-control" type="tel" name="celular" value="" id="celular" pattern="[0-9]{10}" placeholder="Número de 10 digitos" required="" >
                  </div>
              </div>

              <div class="form row">
                  <div class="col form-group">
                    <label for="puesto">Puesto</label>
                    <select class="form-control" id="puesto" name="puesto">
                      <?php
                      foreach($puestos->result() as $row) { ?>
                      <?php echo '<option value="'.$row->id_puesto.'">'.$row->puesto.'</option>';  ?>
                      <?php }  ?>
                    </select>
                  </div>
                  <div class="col form-group">
                    <label for="rol">Rol</label>
                    <select id="rol" name="rol" class="form-control">
                      <?php
                      foreach($roles->result() as $row) { ?>
                      <?php echo '<option value="'.$row->id_rol.'">'.$row->rol.'</option>';  ?>
                      <?php }  ?>
                    </select>
                  </div>
              </div>


              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" onclick="updateEmpleado();"  data-dismiss="modal" class="btn btn-primary">Aceptar </button>
              </div>
         </form>

      </div>
    </div>
  </div>
</div>






<div class="modal fade" id="bajaEmpleado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" >
    <div class="modal-content">
      <div class="modal-header alert alert-danger">
        <h5 class="modal-title " id="exampleModalLabel">Baja empleado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form>

               <div class="form row">
                <div class="col form-group">
                    <input class="form-control" type="text" name="remove_id_empleado" value="" id="remove_id_empleado" hidden="">
                    <label for="remove_usuario">Usuario</label>
                    <input class="form-control" type="text" name="remove_usuario" value="" id="remove_usuario"  readonly >
                  </div>
              </div>

              <div class="form row">
                <div class="col form-group">

                    <label for="remove_nombre">Nombre</label>
                    <input class="form-control" type="text" name="remove_nombre" value="" id="remove_nombre" readonly>
                  </div>
              </div>

              <div class="form row">
                  <div class="col form-group">
                    <label for="remove_apellido1">Primer apellido</label>
                    <input class="form-control" type="text" name="remove_apellido1" value="" id="remove_apellido1" readonly>
                  </div>
                  <div class="col form-group">
                    <label for="remove_apellido2">Segundo apellido</label>
                    <input class="form-control" type="tel" name="remove_apellido2" value="" id="remove_apellido2" readonly>
                  </div>
              </div>

              <div class="form row">
                  <div class="col form-group">
                    <label for="remove_celular">Numero celular</label>
                    <input class="form-control" type="tel" name="remove_celular" value="" id="remove_celular" readonly>
                  </div>
              </div>

              <div class="form row">
                  <div class="col form-group">
                    <label for="remove_puesto">Puesto</label>
                    <select class="form-control" id="remove_puesto" name="remove_puesto"  readonly>
                      <?php
                      foreach($puestos->result() as $row) { ?>
                      <?php echo '<option value="'.$row->id_puesto.'">'.$row->puesto.'</option>';  ?>
                      <?php }  ?>
                    </select>
                  </div>
                  <div class="col form-group">
                    <label for="remove_rol" >Rol</label>
                    <select id="remove_rol" name="remove_rol" class="form-control" readonly>
                      <?php
                      foreach($roles->result() as $row) { ?>
                      <?php echo '<option value="'.$row->id_rol.'">'.$row->rol.'</option>';  ?>
                      <?php }  ?>
                    </select>
                  </div>
              </div>


              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-warning" onclick="removeEmpleado()" data-dismiss="modal">Dar de baja</button>
              </div>
      </form>

      </div>
    </div>
  </div>
</div>






<div class="modal fade" id="cambiarPass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" >
    <div class="modal-content">
      <div class="modal-header alert alert-primary">
        <h5 class="modal-title " id="exampleModalLabel">Cambiar contraseña</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form name="empleadosForm" >

               <div class="form row">
                <div class="col form-group">
                    <input class="form-control" type="text" name="update_id_empleado" value="" id="update_id_empleado" hidden="">
                    <label for="update_usuario">Usuario</label>
                    <input class="form-control" type="text" name="update_usuario" value="" id="update_usuario"  readonly title="Si requiere cambiar el usuario contacte al administrador">
                  </div>
              </div>

              <div class="form row">
                  <div class="col form-group">
                    <label for="password">Contraseña</label>
                   <input type="password" class="form-control" id="password" name="password" required="" pattern="[0-9]{4}" title="Pin de 4 dígitos" placeholder="Pin de 4 dígitos">
                  </div>
                  <div class="col form-group">
                    <label for="password2">Confirmar contraseña</label>
                    <input type="password" class="form-control" id="password2" name="password2" required="" pattern="[0-9]{4}" title="Pin de 4 dígitos" placeholder="Pin de 4 dígitos">
                    <p id="confirm"></p>
                  </div>
              </div>


              <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="button" onclick="updatePassEmpleado()" class="btn btn-primary" data-dismiss="modal">Actualizar </button>
          </div>
            </form>

      </div>
    </div>
  </div>
</div>

