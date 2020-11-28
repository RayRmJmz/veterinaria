
<script src="<?=base_url()?>assets/articulos.js"></script>


<!-- ************************************************************************* -->
<div class="content-wrapper">
	<div class="content">
		<div class="card">
		  <div class="card-header">
          <div class="row">
            <div class="col-sm-10">
             <section><input type="text" name="busqueda" id="busqueda" placeholder="Buscar articulo" class="form-control mb-6" style="text-transform:uppercase;" ></section>
            </div>
            <div class="col-sm-2">
              <a href="<?=base_url()?>welcome/agregarArticulo" class="btn btn-primary">AGREGAR ARTICULO</a>
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
<div class="modal fade" id="editarArticulo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="text-transform:uppercase;">
  <div class="modal-dialog" role="document" >
    <div class="modal-content">
      <div class="modal-header alert alert-primary">
        <h5 class="modal-title " id="exampleModalLabel">Editar Articulo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="text-transform:uppercase;">

        <form name="empleadosForm" onsubmit="return validateForm()" class="needs-validation" novalidate>
               <div class="form-row">
				    <div class="form-group col-md-6">
					    <input class="form-control" type="text" name="id_articulo" value="" id="id_articulo" hidden="">
					      <label for="articulo">ARTICULO</label>
					      <input type="text" class="form-control" id="articulo" name="articulo" required="" style="text-transform:uppercase" >
					      <p id="message"></p>
					    </div>
					    <div class="form-group col-md-6">
					      <label for="marca">MARCA</label>
					      <input type="text" class="form-control" id="marca" name="marca" required="" style="text-transform:uppercase" >
					    </div>
				    </div>

				    <div class="form-row">
					    <div class="form-group col-md-6">
					      <label for="precio">PRECIO </label>
					      <input type="text" class="form-control" id="precio" name="precio" required="" pattern="[0-9]+\.[0-9]{2}" title="NUMERO ENTERO CON DOS DECIMALES EJEMPLO 100.00">
					    </div>
					    <div class="form-group col-md-6">
					      <label for="existencia">EXISTENCIA </label>
					      <input type="text" class="form-control" id="existencia" name="existencia" required="" pattern="[0-9]{1,6}" title="NUMERO ENTERO">
					    </div>
				    </div>


              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
                <button type="button" onclick="updateArticulo();"  data-dismiss="modal" class="btn btn-primary">ACEPTAR </button>
              </div>
         </form>
        
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="bajaArticulo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="text-transform:uppercase;">
  <div class="modal-dialog" role="document" >
    <div class="modal-content">
      <div class="modal-header alert alert-danger">
        <h5 class="modal-title " id="exampleModalLabel">DAR DE BAJA Articulo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="text-transform:uppercase;">

        <form>
               <div class="form-row">
				    <div class="form-group col-md-6">
					    <input class="form-control" type="text" name="remove_id_articulo" value="" id="remove_id_articulo" hidden="">
					      <label for="remove_articulo">ARTICULO</label>
					      <input type="text" class="form-control" id="remove_articulo" name="remove_articulo" readonly="" style="text-transform:uppercase" >
					      <p id="message"></p>
					    </div>
					    <div class="form-group col-md-6">
					      <label for="remove_marca">MARCA</label>
					      <input type="text" class="form-control" id="remove_marca" name="remove_marca" readonly="" style="text-transform:uppercase" >
					    </div>
				    </div>

				    <div class="form-row">
					    <div class="form-group col-md-6">
					      <label for="remove_precio">PRECIO </label>
					      <input type="text" class="form-control" id="remove_precio" name="remove_precio" readonly="">
					    </div>
					    <div class="form-group col-md-6">
					      <label for="remove_existencia">EXISTENCIA </label>
					      <input type="text" class="form-control" id="remove_existencia" name="remove_existencia" readonly="">
					    </div>
				    </div>


              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
                <button type="button" onclick="removeArticulo();"  data-dismiss="modal" class="btn btn-warning">DAR BAJA </button>
              </div>
         </form>
        
      </div>
    </div>
  </div>
</div>