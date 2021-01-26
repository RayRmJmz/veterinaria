
<script src="<?=base_url()?>assets/puntoVenta.js"></script>
<link rel="stylesheet" href="<?=base_url()?>assets/css/empleados.css">
<!-- ************************************************************************* -->
<div class="content-wrapper">
	<div class="content">
		<div class="card card-container" style="overflow-y: auto;">
		  <div class="card-header card-search">
      <div class="" style="text-align: center;" >
		  		<h2 style="margin-bottom: 25px">Ventas realizadas</h2>
		  	</div>
        <div class="row container-search">
          <div class="col-4">
            <label style="margin-right: 10px;">Fecha inicial</label>
            <input type="date" name="inicial" id="inicial">
          </div>
          <div class="col-4">
            <label style="margin-right: 10px;">Fecha final</label>
            <input type="date" name="final" id="final">
          </div>
          <div class="col-4">
            <button type="button" class="btn btn-primary" onclick="ventasRealizadas()">Buscar</button>
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
