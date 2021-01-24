<script src="<?=base_url()?>assets/mascotas.js"></script>
<link rel="stylesheet" href="<?=base_url()?>assets/css/empleados.css">

<!-- ************************************************************************* -->
<div class="content-wrapper">
	<div class="content">
		<div class="card card-container" style="overflow-y: auto;"">
		  <div class="card-header card-search">
        <div class="container">
          <div class="row">
            <div class="col-sm-4">
              <p style="font-weight: 500">Cliente: <span style="font-weight: 100"><?=$nombre?></span></p>
            </div>
            <div class="col-sm-4">
              <p style="font-weight: 500">Primer apellido: <span style="font-weight: 100"><?=$apellido1?></span> </p>
            </div>
            <div class="col-sm-4">
              <p style="font-weight: 500">Segundo apellido: <span style="font-weight: 100"><?=$apellido2?></span> </p>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-sm-4">
              <p style="font-weight: 500">Celular: <span style="font-weight: 100"><?=$celular?></span></p>
            </div>
            <div class="col-sm-4">
              <p style="font-weight: 500">Teléfono: <span style="font-weight: 100"><?=$telefono?></span> </p>
            </div>
            <div class="col-sm-4">
              <p style="font-weight: 500">Código postal: <span style="font-weight: 100"><?=$cp?></span></p>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-sm-4">
              <p style="font-weight: 500">Calle: <span style="font-weight: 100"><?=$calle?> <?=$numero?></span></p>
            </div>
            <div class="col-sm-4">
              <p style="font-weight: 500">Colonia: <span style="font-weight: 100"><?=$colonia?></span></p>
            </div>
            <div class="col-sm-4">
              <p style="font-weight: 500">Municipio: <span style="font-weight: 100"><?=$municipio?></span></p>
            </div>
          </div>
        </div><br>
        <div class="row container-search">
            <div class="search">
              <section class="search-input">
                <input type="text" name="busqueda" id="busqueda"  placeholder="Buscar mascota por nombre..." class="form-control mb-6"></section>
            </div>
            <div class="btn-add_empleado">
              <button type="button" class="btn btn-danger" onclick="getEspecies()">Agregar mascota</button>
          </div>
        </div>
      </div>
		  <div class="card-body">
        <section id="resultado"></section>
      </div>
		  </div>
		</div>
	</div>
</div>
<!-- **************************************************************************************** -->

<div class="modal fade" id="addPet" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document" >
    <div class="modal-content">
      <div class="modal-header alert">
        <h5 class="modal-title " id="exampleModalLabel">Agregar mascota</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form name="petsForm">

          <div class="form row">

            <div class="form-group col-md-3">
              <label for="nombre">Nombre</label>
              <input type="text" class="form-control" id="nombre" name="nombre" required>
              <p id="messName"></p>
            </div>

            <div class="form-group col-md-2">
              <label for="peso">Peso (kg)</label>
              <input type="text" class="form-control" id="peso" name="peso" required pattern="[0-9]+\.[0-9]{2}" placeholder="20.50" >
              <p id="messPeso"></p>
            </div>

            <div class="form-group col-md-3">
              <label for="estatura">Estatura (m)</label>
              <input type="text" class="form-control" id="estatura" name="estatura" required pattern="[0-9]+\.[0-9]{2}" placeholder="0.75">
              <p id="messEstatura"></p>
            </div>

            <div class="form-group col-md-4">
              <label for="fecha">Fecha nacimiento</label>
              <input type="date" class="form-control" id="fecha" name="fecha" required>
              <p id="messDate"></p>
            </div>

          </div>

          <div class="form row">

            <div class="form-group col-md-3" >
              <section id="formEspecie"></section>
              <p id="messageEspecie"></p>
            </div>

            <div class="form-group col-md-3">
              <section id="formRaza"></section>
              <p id="messageRaza"></p>
            </div>

            <div class="form-group col-md-3">
              <section id="formTamano"></section>
              <p id="messageTamaño"></p>
            </div>

            <div class="form-group col-md-3">
              <section  id="formPelaje"></section>
              <p id="messagePelaje"></p>
            </div>

          </div>

            <div class="modal-footer">
                <p id="message"></p>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="addPet()">Aceptar </button>
            </div>
         </form>

      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="editPet" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document" >
    <div class="modal-content">
      <div class="modal-header alert">
        <h5 class="modal-title " id="exampleModalLabel">Editar mascota</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form name="petsForm">
        <div class="modal-body">
          <div class="form row">
            <div class="form-group col-md-6">
               <input class="form-control" type="text" name="edit_id_mascota" value="" id="edit_id_mascota" hidden="">
              <label for="edit_nombre">Nombre</label>
              <input type="text" class="form-control" id="edit_nombre" name="edit_nombre" required>
              <p id="messName"></p>
            </div>

            <div class="form-group col-md-6">
              <label for="edit_peso">Peso (kg)</label>
              <input type="text" class="form-control" id="edit_peso" name="edit_peso" required pattern="[0-9]+\.[0-9]{2}" placeholder="Ejemplo 20.50" >
              <p id="messPeso"></p>
            </div>
          </div>
          <div class="form row">
            <div class="form-group col-md-6">
              <label for="edit_estatura">Estatura (metros)</label>
              <input type="text" class="form-control" id="edit_estatura" name="edit_estatura" required pattern="[0-9]+\.[0-9]{2}" placeholder="Ejemplo 0.75">
              <p id="messEstatura"></p>
            </div>

            <div class="form-group col-md-6">
              <label for="edit_fecha">Fecha nacimiento</label>
              <input type="date" class="form-control" id="edit_fecha" name="edit_fecha" required>
              <p id="messDate"></p>
            </div>
          </div>
        </div>
            <div class="modal-footer">
                <p id="message"></p>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="editPet()">Aceptar </button>
            </div>

        </form>
    </div>
  </div>
</div>
