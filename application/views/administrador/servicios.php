
<script src="<?=base_url()?>assets/servicios.js"></script>
<link rel="stylesheet" href="<?=base_url()?>assets/css/empleados.css">

<!-- ************************************************************************* -->
<div class="content-wrapper">
	<div class="content">
		<div class="card card-container" style="overflow-y: auto;">
		  <div class="card-header card-search">
          <div class="row container-search">
            <div class="search">
             <section class="search-input">
                <input type="text" name="busqueda" id="busqueda" placeholder="Buscar servicio..." class="form-control mb-6">
              </section>
            </div>
            <div class="btn-add_empleado">
              <a href="<?=base_url()?>welcome/agregarServicio" class="btn btn-danger">Agregar servicio</a>
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
<div class="modal fade" id="editarServicio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" >
    <div class="modal-content">
      <div class="modal-header alert">
        <h5 class="modal-title " id="exampleModalLabel">Editar servicio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form>
        <div class="modal-body">
          <div class="form row">
            <div class="col form-group">
                <input class="form-control" type="text" name="id_servicio" value="" id="id_servicio" hidden="">
                <label for="servicio">Servicio</label>
                <input class="form-control" type="text" name="servicio" value="" id="servicio">
              </div>
          </div>
          <div class="form row">
            <div class="col form-group">
                <label for="descripcion">Descripción</label>
                <input class="form-control" type="text" name="descripcion" value="" id="descripcion" required="">
              </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="button" onclick="updateServicio();"  data-dismiss="modal" class="btn btn-primary">Aceptar </button>
        </div>
      </form>
    </div>
  </div>
</div>


<div class="modal fade" id="bajaServicio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" >
    <div class="modal-content">
      <div class="modal-header alert" style="background: #fe5461;">
        <h5 class="modal-title " style="color: #fff;" id="exampleModalLabel">Dar de baja servicio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
               <div class="form row">
                <div class="col form-group">
                    <input class="form-control" type="text" name="remove_id_servicio" value="" id="remove_id_servicio" hidden="">
                    <label for="remove_servicio">Servicio</label>
                    <input class="form-control" type="text" name="remove_servicio" value="" id="remove_servicio"  disabled="">
                  </div>
              </div>

              <div class="form row">
                <div class="col form-group">

                    <label for="remove_descripcion">Descripción</label>
                    <input class="form-control" type="text" name="remove_descripcion" value="" id="remove_descripcion" required=""readonly="">
                  </div>
              </div>


              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" onclick="removeServicio();"  data-dismiss="modal" class="btn btn-danger">Dar de baja</button>
              </div>
         </form>

      </div>
    </div>
  </div>
</div>
