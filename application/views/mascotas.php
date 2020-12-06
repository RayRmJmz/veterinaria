<script src="<?=base_url()?>assets/mascotas.js"></script>
<!-- ************************************************************************* -->
<div class="content-wrapper">
	<div class="content">
		<div class="card">
		  <div class="card-header">

          <div class="container"> 
            <div class="row">
              <div class="col-sm-4">
                <h6>Nombre: <?=$nombre?></h6>
              </div>
              <div class="col-sm-4">
                <h6>Primer apellido: <?=$apellido1?> </h6>
              </div>
              <div class="col-sm-4">
                <h6>Segundo apellido: <?=$apellido2?></h6>
              </div>       
            </div>
          </div>

          <div class="container">
            <div class="row">
              <div class="col-sm-4">
                <h6>Celular: <?=$celular?></h6>
              </div>
              <div class="col-sm-4">
                <h6>Teléfono: <?=$telefono?> </h6>
              </div>
              <div class="col-sm-4">
                <h6>Código postal: <?=$cp?></h6>
              </div>       
            </div>
          </div>

          <div class="container">
            <div class="row">
              <div class="col-sm-2">
                <h6>Calle: <?=$calle?></h6>
              </div>
              <div class="col-sm-2">
                <h6>Número: <?=$numero?> </h6>
              </div>
              <div class="col-sm-2">
                <h6>Colonia: <?=$colonia?></h6>
              </div> 
              <div class="col-sm-2">
                <h6>Municipio: <?=$municipio?></h6>
              </div>     
            </div>
          </div><br>
          

          <div class="row">
              <div class="col-sm-10">
              	
               <section><input type="text" name="busqueda" id="busqueda"  placeholder="Buscar mascota por nombre..." class="form-control mb-6"></section>
              </div>
              <div class="col-sm-2">
                <button type="button" class="btn btn-primary" onclick="getEspecies()">Agregar mascota</button>
            </div>
  		    </div>

      </div>

		  <div class="card-body">
		    
            <section id="resultado">
            </section>

      </div>

      <div class="card-footer">
      </div>
   
		  </div>
		</div> 
	</div>
</div>
<!-- **************************************************************************************** -->

<div class="modal fade" id="addPet" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document" >
    <div class="modal-content">
      <div class="modal-header alert alert-primary">
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

            <div class="form-group col-md-3">
              <label for="peso">Peso kg</label>
              <input type="text" class="form-control" id="peso" name="peso" required pattern="[0-9]+\.[0-9]{2}" placeholder="Ejemplo 20.50" >
              <p id="messPeso"></p>
            </div>

            <div class="form-group col-md-3">
              <label for="estatura">Estatura mtrs</label>
              <input type="text" class="form-control" id="estatura" name="estatura" required pattern="[0-9]+\.[0-9]{2}" placeholder="Ejemplo 0.75">
              <p id="messEstatura"></p>
            </div>

            <div class="form-group col-md-3">
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
      <div class="modal-header alert alert-primary">
        <h5 class="modal-title " id="exampleModalLabel">Editar mascota</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form name="petsForm">

          <div class="form row">

            <div class="form-group col-md-3">
               <input class="form-control" type="text" name="edit_id_mascota" value="" id="edit_id_mascota" hidden="">
              <label for="edit_nombre">Nombre</label>
              <input type="text" class="form-control" id="edit_nombre" name="edit_nombre" required>
              <p id="messName"></p>
            </div>

            <div class="form-group col-md-3">
              <label for="edit_peso">Peso kg</label>
              <input type="text" class="form-control" id="edit_peso" name="edit_peso" required pattern="[0-9]+\.[0-9]{2}" placeholder="Ejemplo 20.50" >
              <p id="messPeso"></p>
            </div>

            <div class="form-group col-md-3">
              <label for="edit_estatura">Estatura mtrs</label>
              <input type="text" class="form-control" id="edit_estatura" name="edit_estatura" required pattern="[0-9]+\.[0-9]{2}" placeholder="Ejemplo 0.75">
              <p id="messEstatura"></p>
            </div>

            <div class="form-group col-md-3">
              <label for="edit_fecha">Fecha nacimiento</label>
              <input type="date" class="form-control" id="edit_fecha" name="edit_fecha" required>
              <p id="messDate"></p>
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
</div>