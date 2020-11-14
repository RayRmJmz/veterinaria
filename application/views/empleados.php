
<!-- ************************************************************************* -->
<div class="content-wrapper">
	<div class="content">
		<div class="card">
		  <div class="card-header">
		    <section><input type="text" name="busqueda" id="busqueda" placeholder="Buscar nombre, apellidos, puesto..." class="form-control" style="text-transform:uppercase;" ></section>
		    
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