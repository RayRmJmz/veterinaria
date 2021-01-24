<script src="<?=base_url()?>assets/newOrder.js"></script>
<link rel="stylesheet" href="<?=base_url()?>assets/css/empleados.css">

<!-- ************************************************************************* -->
<div class="content-wrapper">
	<div class="content">
		<div class="card" style="box-shadow: 0 0 30px 0 rgba(82,63,105,.05);
      border: 0;">
		  <div class="card-header alert " style="background: #fff;">
        <b style="font-weight: 500;
          font-size: 1.275rem;
          color: #181c32; ">Nueva orden de trabajo</b>
		  </div>
      <form  name="empleadosForm" method="post" action="<?=base_url()?>welcome/agregarOrden" onsubmit="return validateForm()" class="needs-validation" novalidate  >
        <div class="card-body">
		  		<div class="form-row">
			    	<h3>Cliente</h3>
			    </div>
		  		<div class="form-row container-search">
				    <div class="form-group search">
              <select class="selectClient"  style="width: 100%" name="cliente" id="cliente" required="" onchange="mascotas()" required=""></select>
				    </div>
			    </div>

			    <h3>Mascotas</h3>
			    <div class="form-row" id="mascota" >
			    </div>

			    <h3>Servicios</h3>
			    <div class="form-row" id="servicios">

			    </div>
			    <br>
			    <div class="input-group col-mb-3">
				  <div class="input-group-prepend">
				    <span class="input-group-text">Total $</span>
				  </div>
				  <input type="text" class="form-control" name="total" required="" pattern="[0-9]+\.[0-9]{2}" title="Número entero son dos decimales ejemplo 100.00" placeholder="Número entero son dos decimales ejemplo 100.00">
				</div>

			    <div class="input-group">
				  <div class="input-group-prepend">
				    <span class="input-group-text">Comentarios</span>
				  </div>
				  <textarea name="comentarios" class="form-control" aria-label="With textarea" placeholder=""></textarea>
				</div>


        <br>
      </div>
      <div class="card-footer" style="background: #fff">
            <div class="row">
              <div class="col-lg-4"></div>
              <div class="col-lg-8">
                <button type="submit" class="btn btn-primary mb-2">Aceptar</button>
                <a href="<?=base_url()?>welcome/ordenesActivas" type="button" class="btn btn-danger mb-2">Cancelar</a>
                <p id="message"></p>
              </div>
            </div>
          </div>


      </form>
		</div>
	</div>
</div>

<!-- ************************************************************************* -->
