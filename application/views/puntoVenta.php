
<script src="<?=base_url()?>assets/puntoVenta.js"></script>
<link rel="stylesheet" href="<?=base_url()?>assets/css/empleados.css">
<!-- ************************************************************************* -->
<div class="content-wrapper">
	<div class="content">
		<div class="card card-container" style="overflow-y: auto;">
		  <div class="card-header card-search">
        <h2>Punto de venta</h2><br>
        <div class="row container-search">
          <div class="search">
            <select class="selectItem"  style="width: 100%" ></select>
          </div>
          <div class="btn-add_item">
            <a  class="btn btn-danger" onclick="buton()">Agregar articulo</a>
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