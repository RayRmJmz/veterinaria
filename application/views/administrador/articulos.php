
<script src="<?=base_url()?>assets/articulos.js"></script>
<link rel="stylesheet" href="<?=base_url()?>assets/css/empleados.css">

<!-- ************************************************************************* -->
<div class="content-wrapper">
	<div class="content">
		<div class="card card-container" style="overflow-y: auto;">
		  <div class="card-header card-search">
        <div class="row container-search">
          <div class="search-input">
            <section><input type="text" name="busqueda" id="busqueda" placeholder="Buscar artículo..." class="form-control mb-6" ></section>
          </div>
          <div class="btn-add_empleado">
            <a href="<?=base_url()?>welcome/agregarArticulo" class="btn btn-danger">Agregar artículo</a>
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
<div class="modal fade" id="editarArticulo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" >
    <div class="modal-content">
      <div class="modal-header alert">
        <h5 class="modal-title " id="exampleModalLabel">Editar artículo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form name="empleadosForm" onsubmit="return validateForm()" class="needs-validation" novalidate>
        <div class="modal-body">
          <div class="form-row">
				    <div class="form-group col-md-6">
					    <input class="form-control" type="text" name="id_articulo" value="" id="id_articulo" hidden="">
              <label for="articulo">Artículo</label>
              <input type="text" class="form-control" id="articulo" name="articulo" required>
              <p id="message"></p>
            </div>
            <div class="form-group col-md-6">
              <label for="marca">Marca</label>
              <input type="text" class="form-control" id="marca" name="marca" required>
            </div>
				  </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="precio">Precio </label>
              <input type="text" class="form-control" id="precio" name="precio" required="" pattern="[0-9]+\.[0-9]{2}" title="Número entero con dos decimales, ejemplo 100.00">
            </div>
            <div class="form-group col-md-6">
              <label for="existencia">Existencia </label>
              <input type="text" class="form-control" id="existencia" name="existencia" required="" pattern="[0-9]{1,6}" title="Número entero">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="button" onclick="updateArticulo();"  data-dismiss="modal" class="btn btn-primary">Aceptar </button>
        </div>
      </form>
    </div>
  </div>
</div>


<div class="modal fade" id="bajaArticulo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" >
    <div class="modal-content">
      <div class="modal-header alert" style="background: #fe5461;">
        <h5 class="modal-title " style="color: #fff;"  id="exampleModalLabel">Dar baja artículo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form>
               <div class="form-row">
				    <div class="form-group col-md-6">
					    <input class="form-control" type="text" name="remove_id_articulo" value="" id="remove_id_articulo" hidden="">
					      <label for="remove_articulo">Artículo</label>
					      <input type="text" class="form-control" id="remove_articulo" name="remove_articulo" readonly>
					    </div>
					    <div class="form-group col-md-6">
					      <label for="remove_marca">Marca</label>
					      <input type="text" class="form-control" id="remove_marca" name="remove_marca" readonly>
					    </div>
				    </div>

				    <div class="form-row">
					    <div class="form-group col-md-6">
					      <label for="remove_precio">Precio</label>
					      <input type="text" class="form-control" id="remove_precio" name="remove_precio" readonly="">
					    </div>
					    <div class="form-group col-md-6">
					      <label for="remove_existencia">Existencia</label>
					      <input type="text" class="form-control" id="remove_existencia" name="remove_existencia" readonly="">
					    </div>
				    </div>


              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" onclick="removeArticulo();"  data-dismiss="modal" class="btn btn-danger">Dar baja</button>
              </div>
         </form>

      </div>
    </div>
  </div>
</div>
