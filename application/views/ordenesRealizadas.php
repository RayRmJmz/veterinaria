<script src="<?=base_url()?>assets/ordenesRealizadas.js"></script>
<link rel="stylesheet" href="<?=base_url()?>assets/css/empleados.css">

<!-- ************************************************************************* -->
<div class="content-wrapper wrapper">
	<div class="content">
		<div class="card card-container" style="overflow-y: auto;">
		  <div class="card-header card-search">
		  	<div class="" style="text-align: center;" >
		  		<h2 style="margin-bottom: 30px;" >Órdenes de trabajo realizadas</h2>
		  	</div>
        <div class="row container-search">
          <div class="search">
            <section class="search-input">
              <input type="text" name="busqueda" id="busqueda" placeholder="Buscar orden de trabajo por especie, raza, nombre..." class="form-control mb-6">
            </section>
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
