
<script src="<?=base_url()?>assets/servicios.js"></script>


<!-- ************************************************************************* -->
<div class="content-wrapper">
	<div class="content">
		<div class="card">
		  <div class="card-header">
          <div class="row">
            <div class="col-sm-10">
             <section><input type="text" name="busqueda" id="busqueda" placeholder="Buscar servicio" class="form-control mb-6" style="text-transform:uppercase;" ></section>
            </div>
            <div class="col-sm-2">
              <a href="<?=base_url()?>welcome/agregarServicio" class="btn btn-primary">AGREGAR SERVICIO</a>
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
<div class="modal fade" id="editarServicio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="text-transform:uppercase;">
  <div class="modal-dialog" role="document" >
    <div class="modal-content">
      <div class="modal-header alert alert-primary">
        <h5 class="modal-title " id="exampleModalLabel">Editar servicio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="text-transform:uppercase;">

        <form>
               <div class="form row">
                <div class="col form-group">
                    <input class="form-control" type="text" name="id_servicio" value="" id="id_servicio" hidden="">
                    <label for="servicio">SERVICIO</label>
                    <input class="form-control" type="text" name="servicio" value="" id="servicio"  style="text-transform:uppercase;">
                  </div>
              </div>

              <div class="form row">
                <div class="col form-group">
                    
                    <label for="descripcion">DESCRIPCION</label>
                    <input class="form-control" type="text" name="descripcion" value="" id="descripcion" required="" style="text-transform:uppercase;">
                  </div>
              </div>


              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
                <button type="button" onclick="updateServicio();"  data-dismiss="modal" class="btn btn-primary">ACEPTAR </button>
              </div>
         </form>
        
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="bajaServicio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="text-transform:uppercase;">
  <div class="modal-dialog" role="document" >
    <div class="modal-content">
      <div class="modal-header alert alert-danger">
        <h5 class="modal-title " id="exampleModalLabel">DAR DE BAJA SERVICIO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="text-transform:uppercase;">

        <form>
               <div class="form row">
                <div class="col form-group">
                    <input class="form-control" type="text" name="remove_id_servicio" value="" id="remove_id_servicio" hidden="">
                    <label for="remove_servicio">SERVICIO</label>
                    <input class="form-control" type="text" name="remove_servicio" value="" id="remove_servicio"  style="text-transform:uppercase;" disabled="">
                  </div>
              </div>

              <div class="form row">
                <div class="col form-group">
                    
                    <label for="remove_descripcion">DESCRIPCION</label>
                    <input class="form-control" type="text" name="remove_descripcion" value="" id="remove_descripcion" required="" style="text-transform:uppercase;" readonly="">
                  </div>
              </div>


              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
                <button type="button" onclick="removeServicio();"  data-dismiss="modal" class="btn btn-warning">DAR BAJA </button>
              </div>
         </form>
        
      </div>
    </div>
  </div>
</div>