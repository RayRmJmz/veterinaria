<script src="<?=base_url()?>assets/reservas.js"></script>
<link rel="stylesheet" href="<?=base_url()?>assets/css/empleados.css">

<!-- ************************************************************************* -->
<div class="content-wrapper">
	<div class="content">
		<div class="card card-container" style="overflow-y: auto;">
		  <div class="card-header card-search">
          <div class="row container-search">
            <div class="search">
              <section class="search-input">
                <input type="text" name="busqueda" id="busqueda" placeholder="Buscar reverva por folio, nombre mscota..." class="form-control mb-6">
              </section>
            </div>
            <div class="btn-add_empleado" style= "margin: auto 0 auto 22.5px;">
            <input type="date" id="fecha" name="fecha" value="<?php echo date("Y-m-d"); ?>">
            </div>
            <div class="btn-add_empleado">
              <a href="<?=base_url()?>welcome/agregarReserva" class="btn btn-danger">Nueva reserva</a>
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
