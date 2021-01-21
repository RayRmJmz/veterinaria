<script src="<?=base_url()?>assets/reservas.js"></script>
<!-- ************************************************************************* -->
<div class="content-wrapper">
	<div class="content">
		<div class="card">
		  <div class="card-header">
          <div class="row">
            <div class="col-sm-8">
                <section><input type="text" name="busqueda" id="busqueda" placeholder="Buscar reverva por folio, nombre mscota..." class="form-control mb-6"></section>
            </div>
            <div class="col-sm-2">
             <label></label>
            <input type="date" id="fecha" name="fecha" value="<?php echo date("Y-m-d"); ?>">
            </div>
            <div class="col-sm-2">
              <a href="<?=base_url()?>welcome/agregarReserva" class="btn btn-primary">Nueva reserva</a>
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