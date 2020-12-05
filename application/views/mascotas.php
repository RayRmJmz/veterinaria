
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
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addPet" onclick="getCatalogos()">Agregar mascota</button>
                <button type="button" class="btn btn-primary" onclick="getEspcies()">testing</button>
            </div>
  		    </div>

		  <div class="card-body">
		    
            <section id="resultado">
            </section>

            <div id="fomrSelect"></div>
   
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

        <form>

          <div class="form row">

            <div class="form-group col-md-2">
              <label for="apellido1">Nombre</label>
              <input type="text" class="form-control" id="apellido1" name="apellido1" required>
            </div>

            <div class="form-group col-md-2">
              <label for="apellido1">Peso</label>
              <input type="text" class="form-control" id="apellido1" name="apellido1" required>
            </div>

            <div class="form-group col-md-2">
              <label for="apellido1">Estatura</label>
              <input type="text" class="form-control" id="apellido1" name="apellido1" required>
            </div>
            
          </div>

          <div class="form row">
            <div class="form-group col-md-2">
              <label for="apellido1">Especie</label>
              <input type="text" class="form-control" id="apellido1" name="apellido1" required>
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
</div>