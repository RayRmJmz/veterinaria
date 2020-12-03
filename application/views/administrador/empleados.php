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
              <input type="text" name="busqueda" id="busqueda" placeholder="Buscar por nombre, apellido, rol..." class="form-control mb-6" >
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

<div class="modal fade" id="editarEmpleado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="text-transform:uppercase;">
  <div class="modal-dialog" role="document" >
    <div class="modal-content">
      <div class="modal-header alert alert-primary">
        <h5 class="modal-title " id="exampleModalLabel">Editar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="text-transform:uppercase;">

        <form>
               <div class="form row">
                <div class="col form-group">
                    <input class="form-control" type="text" name="id_empleado" value="" id="id_empleado" hidden="">
                    <label for="usuario">Usuario</label>
                    <input readonly class="form-control-plaintext" type="text" name="usuario" value="" id="usuario"  readonly="">
                  </div>
              </div>

              <div class="form row">
                <div class="col form-group">

                    <label for="nombre">NOMBRE</label>
                    <input class="form-control" type="text" name="nombre" value="" id="nombre" required="">
                  </div>
              </div>

              <div class="form row">
                  <div class="col form-group">
                    <label for="apellido1">PRIMER APELLIDO</label>
                    <input class="form-control" type="text" name="apellido1" value="" id="apellido1" required="" style="text-transform:uppercase;">
                  </div>
                  <div class="col form-group">
                    <label for="apellido2">SEGUNDO APELLIDO</label>
                    <input class="form-control" type="tel" name="apellido2" value="" id="apellido2" style="text-transform:uppercase;" >
                  </div>
              </div>

              <div class="form row">
                  <div class="col form-group">
                    <label for="celular">NÚMERO CELULAR</label>
                    <input class="form-control" type="tel" name="celular" value="" id="celular" style="text-transform:uppercase;" pattern="[0-9]{10}" placeholder="3123206062" required="" >
                  </div>
              </div>

              <div class="form row">
                  <div class="col form-group">
                    <label for="puesto">PUESTO</label>
                    <select class="form-control" id="puesto" name="puesto" style="text-transform:uppercase;">
                      <?php
                      foreach($puestos->result() as $row) { ?>
                      <?php echo '<option value="'.$row->id_puesto.'">'.$row->puesto.'</option>';  ?>
                      <?php }  ?>
                    </select>
                  </div>
                  <div class="col form-group">
                    <label for="rol" style="text-transform:uppercase;">ROL</label>
                    <select id="rol" name="rol" class="form-control" style="text-transform:uppercase;" >
                      <?php
                      foreach($roles->result() as $row) { ?>
                      <?php echo '<option value="'.$row->id_rol.'">'.$row->rol.'</option>';  ?>
                      <?php }  ?>
                    </select>
                  </div>
              </div>


              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
                <button type="button" onclick="updateEmpleado();"  data-dismiss="modal" class="btn btn-primary">ACEPTAR </button>
              </div>
         </form>

      </div>
    </div>
  </div>
</div>






<div class="modal fade" id="bajaEmpleado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="text-transform:uppercase;">
  <div class="modal-dialog" role="document" >
    <div class="modal-content">
      <div class="modal-header alert alert-danger">
        <h5 class="modal-title " id="exampleModalLabel">DAR DE BAJA EMPLEADO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="text-transform:uppercase;">

        <form>

               <div class="form row">
                <div class="col form-group">
                    <input class="form-control" type="text" name="remove_id_empleado" value="" id="remove_id_empleado" hidden="">
                    <label for="remove_usuario">USUARIO</label>
                    <input class="form-control" type="text" name="remove_usuario" value="" id="remove_usuario"  readonly="" style="text-transform:uppercase;">
                  </div>
              </div>

              <div class="form row">
                <div class="col form-group">

                    <label for="remove_nombre">NOMBRE</label>
                    <input class="form-control" type="text" name="remove_nombre" value="" id="remove_nombre" readonly="" style="text-transform:uppercase;">
                  </div>
              </div>

              <div class="form row">
                  <div class="col form-group">
                    <label for="remove_apellido1">PRIMER APELLIDO</label>
                    <input class="form-control" type="text" name="remove_apellido1" value="" id="remove_apellido1" readonly="" style="text-transform:uppercase;">
                  </div>
                  <div class="col form-group">
                    <label for="remove_apellido2">SEGUNDO APELLIDO</label>
                    <input class="form-control" type="tel" name="remove_apellido2" value="" id="remove_apellido2" readonly="" style="text-transform:uppercase;" >
                  </div>
              </div>

              <div class="form row">
                  <div class="col form-group">
                    <label for="remove_celular">NUMERO CELULAR</label>
                    <input class="form-control" type="tel" name="remove_celular" value="" id="remove_celular" style="text-transform:uppercase;" pattern="[0-9]{10}" placeholder="312..." readonly="" >
                  </div>
              </div>

              <div class="form row">
                  <div class="col form-group">
                    <label for="remove_puesto">PUESTO</label>
                    <select class="form-control" id="remove_puesto" name="remove_puesto"  readonly="" style="text-transform:uppercase;">
                      <?php
                      foreach($puestos->result() as $row) { ?>
                      <?php echo '<option value="'.$row->id_puesto.'">'.$row->puesto.'</option>';  ?>
                      <?php }  ?>
                    </select>
                  </div>
                  <div class="col form-group">
                    <label for="remove_rol" style="text-transform:uppercase;">Rol</label>
                    <select id="remove_rol" name="remove_rol" class="form-control" readonly="" style="text-transform:uppercase;" >
                      <?php
                      foreach($roles->result() as $row) { ?>
                      <?php echo '<option value="'.$row->id_rol.'">'.$row->rol.'</option>';  ?>
                      <?php }  ?>
                    </select>
                  </div>
              </div>


              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
                <button type="button" class="btn btn-warning" onclick="removeEmpleado()" data-dismiss="modal">DAR DE BAJA </button>
              </div>
      </form>

      </div>
    </div>
  </div>
</div>






<div class="modal fade" id="cambiarPass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="text-transform:uppercase;">
  <div class="modal-dialog" role="document" >
    <div class="modal-content">
      <div class="modal-header alert alert-primary">
        <h5 class="modal-title " id="exampleModalLabel">CAMBIAR CONTRASEÑA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="text-transform:uppercase;">

        <form name="empleadosForm" >

               <div class="form row">
                <div class="col form-group">
                    <input class="form-control" type="text" name="update_id_empleado" value="" id="update_id_empleado" hidden="">
                    <label for="update_usuario">USUARIO</label>
                    <input class="form-control" type="text" name="update_usuario" value="" id="update_usuario"  readonly="" style="text-transform:uppercase;">
                  </div>
              </div>

              <div class="form row">
                  <div class="col form-group">
                    <label for="password">CONTRASEÑA</label>
                   <input type="password" class="form-control" id="password" name="password" required="" pattern="[0-9]{4}" title="PIN DE 4 DIGITOS" placeholder="PIN 4 DIGITOS">
                  </div>
                  <div class="col form-group">
                    <label for="password2">CONFIRMAR CONTRASEÑA</label>
                    <input type="password" class="form-control" id="password2" name="password2" required="" pattern="[0-9]{4}" title="PIN DE 4 DIGITOS" placeholder="PIN 4 DIGITOS">
                    <p id="confirm"></p>
                  </div>
              </div>


              <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
            <button type="button" onclick="updatePassEmpleado()" class="btn btn-primary" data-dismiss="modal">ACTUALIZAR </button>
          </div>
            </form>

      </div>
    </div>
  </div>
</div>

