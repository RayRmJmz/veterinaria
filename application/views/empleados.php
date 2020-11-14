
<script src="<?=base_url()?>assets/empleados.js"></script>


<!-- ************************************************************************* -->
<div class="content-wrapper">
	<div class="content">
		<div class="card">
		  <div class="card-header">
          <div class="row">
            <div class="col-sm-10">
             <section><input type="text" name="busqueda" id="busqueda" placeholder="Buscar nombre, apellidos, puesto..." class="form-control mb-6" style="text-transform:uppercase;" ></section>
            </div>
            <div class="col-sm-2">
              <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addEmpleado">Agregar empleado</a>
            </div>
            
          </div>
		  </div>

		  <div class="card-body">
		    <section id="resultado">

		    </section>
		  </div>
		</div> 
	</div>
</div>


<!-- ************************************************************************* -->

<div class="modal fade" id="editarEmpleado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="text-transform:uppercase;">
  <div class="modal-dialog" role="document" >
    <div class="modal-content">
      <div class="modal-header alert alert-primary">
        <h5 class="modal-title " id="exampleModalLabel">Editar empleado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="text-transform:uppercase;">

        <form method="post" action="<?=base_url()?>welcome/editAdmin">

              <div class="form row">
                <div class="col form-group">
                    <label for="nombre">NOMBRE</label>
                    <input class="form-control" type="text" name="nombre" value="" id="nombre" style="text-transform:uppercase;">
                  </div>
              </div>

              <div class="form row">
                  <div class="col form-group">
                    <label for="apellido1">APELLIDO PATERNO</label>
                    <input class="form-control" type="text" name="apellido1" value="" id="apellido1" style="text-transform:uppercase;">
                  </div>
                  <div class="col form-group">
                    <label for="apellido2">APELLIDO MATERNO</label>
                    <input class="form-control" type="text" name="apellido2" value="" id="apellido2" style="text-transform:uppercase;">
                  </div>
              </div>

              <div class="form row">
                  <div class="col form-group">
                    <label for="id_puesto">Puesto</label>
                    <select class="form-control" id="id_puesto" name="id_puesto" style="text-transform:uppercase;">
                      <?php 
                      foreach($puestos->result() as $row) { ?>
                      <?php echo '<option value="'.$row->id_puesto.'">'.$row->puesto.'</option>';  ?>
                      <?php }  ?>
                    </select>
                  </div>
                  <div class="col form-group">
                    <label for="id_rol" style="text-transform:uppercase;">Rol</label>
                    <select id="id_rol" name="id_rol" class="form-control" style="text-transform:uppercase;" >
                      <?php 
                      foreach($roles->result() as $row) { ?>
                      <?php echo '<option value="'.$row->id_rol.'">'.$row->rol.'</option>';  ?>
                      <?php }  ?>
                    </select>
                  </div>
              </div>


              <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
            <button type="submit" class="btn btn-primary">ACEPTAR </button>
          </div>
            </form>
        
      </div>
    </div>
  </div>
</div>


<!-- Modal  AGREGAR usuario-->
<div class="modal fade" id="addEmpleado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header alert alert-primary">
        <h5 class="modal-title " id="exampleModalLabel" style="text-transform:uppercase;">Agregar nuevo empleado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form method="post" action="<?=base_url()?>welcome/addEmpleado">
              <div class="form row" >
                   <input class="form-control" type="text" name="id_new" value="" id="id_new" hidden="">
                  <div class="col form-group " >
                    <label for="newEmpleado" style="text-transform:uppercase;">Usuario</label>
                    <input class="form-control" type="text" name="newEmpleado" value="" id="newEmpleado" minlength="3" maxlength="15" style="text-transform:uppercase;" required >
                    <p id="message"></p>
                  </div>
                  <div class="col form-group">
                    <label for="newPass" style="text-transform:uppercase;">Contrseña</label>
                    <input class="form-control" type="text" name="newPass" value="" id="newPass" minlength="3" maxlength="7" style="text-transform:uppercase;" required>
                  </div>
              </div>

              <div class="form row">
                <div class="col form-group">
                    <label for="newName" style="text-transform:uppercase;">Nombre</label>
                    <input class="form-control" type="text" name="newName" value="" id="newName" required style="text-transform:uppercase;">
                  </div>
              </div>
              <div class="form row">
                  <div class="col form-group">
                    <label for="newApellido1" style="text-transform:uppercase;">Apellido paterno</label>
                    <input class="form-control" type="text" name="newApellido1" value="" id="newApellido1" required style="text-transform:uppercase;">
                  </div>
                  <div class="col form-group">
                    <label for="newApellido2" style="text-transform:uppercase;">Apellido materno</label>
                    <input class="form-control" type="text" name="newApellido2" value="" id="newApellido2" required style="text-transform:uppercase;">
                  </div>
              </div>

              <div class="form row">
                  <div class="col form-group">
                    <label for="newCell" style="text-transform:uppercase;">Celular</label>
                    <input class="form-control" type="text" name="newCell" value="" id="newCell" required style="text-transform:uppercase;">
                  </div>
              </div>

              <div class="form row">
                  <div class="col form-group">
                    <label for="newPuesto">Puesto</label>
                    <select class="form-control" id="newPuesto" name="newPuesto" style="text-transform:uppercase;">
                      <?php 
                      foreach($puestos->result() as $row) { ?>
                      <?php echo '<option value="'.$row->id_puesto.'">'.$row->puesto.'</option>';  ?>
                      <?php }  ?>
                    </select>
                  </div>
                  <div class="col form-group">
                    <label for="newRol" style="text-transform:uppercase;">Rol</label>
                    <select id="newRol" name="newRol" class="form-control" style="text-transform:uppercase;" >
                      <?php 
                      foreach($roles->result() as $row) { ?>
                      <?php echo '<option value="'.$row->id_rol.'">'.$row->rol.'</option>';  ?>
                      <?php }  ?>
                    </select>
                  </div>
              </div>

              <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" style="text-transform:uppercase;">Cancelar</button>
            <button type="submit" class="btn btn-primary" id="Aceptar" style="text-transform:uppercase;">Aceptar </button>
          </div>
            </form>
        
      </div>
    </div>
  </div>
</div>