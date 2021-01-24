
<script src="<?=base_url()?>assets/clientes.js"></script>
<link rel="stylesheet" href="<?=base_url()?>assets/css/empleados.css">

<!-- ************************************************************************* -->
<div class="content-wrapper">
	<div class="content">
		<div class="card card-container" style="overflow-y: auto;">
		  <div class="card-header card-search">
        <div class="row container-search">
          <div class="search">
            <section class="search-input">
              <input type="text" name="busqueda" id="busqueda" placeholder="Buscar cliente por nombre, apellido..." class="form-control mb-6">
            </section>
          </div>
          <div class="btn-add_empleado">
            <a href="<?=base_url()?>welcome/agregarCliente" class="btn btn-danger">Agregar cliente</a>
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
<div class="modal fade" id="editarCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" >
    <div class="modal-content">
      <div class="modal-header alert">
        <h5 class="modal-title " id="exampleModalLabel">Editar cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form>
        <div class="modal-body">
          <div class="form row">
            <div class="col form-group">
                <input class="form-control" type="text" name="id_cliente" value="" id="id_cliente" hidden="">
                <label for="nombre">Nombre</label>
                <input class="form-control" type="text" name="nombre" value="" id="nombre">
            </div>
          </div>
          <div class="form-row">
				    <div class="form-group col-md-6">
				      <label for="apellido1">Primer apellido</label>
				      <input type="text" class="form-control" id="apellido1" name="apellido1" required>
				      <p id="message"></p>
				    </div>
				    <div class="form-group col-md-6">
				      <label for="apellido2">Segundo apellido</label>
				      <input type="text" class="form-control" id="apellido2" name="apellido2" required>
				    </div>
			    </div>
			    <div class="form-row">
				    <div class="form-group col-md-6">
				      <label for="celular">Teléfo personal</label>
				      <input type="text" class="form-control" id="celular" name="celular" required>
				      <p id="message"></p>
				    </div>
				  <div class="form-group col-md-6">
				      <label for="telefono">Teléfono casa</label>
				      <input type="text" class="form-control" id="telefono" name="telefono" required>
				    </div>
			    </div>
			    <div class="form-row">
				    <div class="form-group col-md-6">
				      <label for="calle">Calle</label>
				      <input type="text" class="form-control" id="calle" name="calle" required>
				      <p id="message"></p>
				    </div>
				    <div class="form-group col-md-6">
				      <label for="numero">Número casa</label>
				      <input type="text" class="form-control" id="numero" name="numero" required>
				    </div>
			    </div>

			    <div class="form-row">
				    <div class="form-group col-md-4">
				      <label for="colonia">Colonia</label>
				      <input type="text" class="form-control" id="colonia" name="colonia" required>
				      <p id="message"></p>
				    </div>
				    <div class="form-group col-md-4">
				      <label for="cp">C.P</label>
				      <input type="text" class="form-control" id="cp" name="cp" required>
				    </div>
				    <div class="form-group col-md-4">
				      <label for="municipio">Municipio</label>
				      <select name="municipio" id="municipio" required="" class="form-control">
				      	<option value="Colima">Colima</option>
				      	<option value="Villa de Álvarez">Villa de Álvarez</option>
				      	<option value="Coquimatlán">Coquimatlán</option>
				      	<option value="Manzanillo">Manzanillo</option>
				      	<option value="Comala">Comala</option>
				      	<option value="Armería">Armería</option>
				      	<option value="Cuauhtémoc">Cuauhtémoc</option>
				      	<option value="Tecomán">Tecomán</option>
				      	<option value="Minatitlán">Minatitlán</option>
				      	<option value="Ixtlahuacan">Ixtlahuacán</option>
				      </select>
				    </div>
			    </div>

        </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" onclick="updateCliente();"  data-dismiss="modal" class="btn btn-primary">Aceptar </button>
            </div>

        </form>
    </div>
  </div>
</div>
