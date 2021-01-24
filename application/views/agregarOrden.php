<script src="<?=base_url()?>assets/newOrder.js"></script>
<link rel="stylesheet" href="<?=base_url()?>assets/css/empleados.css">

<!-- ************************************************************************* -->
<div class="content-wrapper">
	<div class="content">
		<div class="card" style="box-shadow: 0 0 30px 0 rgba(82,63,105,.05);
      border: 0;">
		  <div class="card-header alert " style="background: #fff; margin-bottom: 0;">
        <p style="font-weight: 500;
          font-size: 1.5rem;
          color: #181c32; ">Nueva Orden de Trabajo</p>
		  </div>
      <form  name="empleadosForm" method="post" action="<?=base_url()?>welcome/agregarOrden" onsubmit="return validateForm()" class="needs-validation" novalidate  >
        <div class="card-body">
		  		<div class="form-row" style="margin-bottom: 15px">
			    	<h4 style="margin-left: 0;">Cliente</h4>
			    </div>
		  		<div class="form-row container-search">
				    <div class="form-group search">
              <select class="selectClient"  style="width: 100%" name="cliente" id="cliente" required="" onchange="mascotas()" required=""></select>
				    </div>
			    </div>

			    <h4 style="margin-bottom: 15px;">Mascotas</h4>
			    <div class="form-row" id="mascota" >
			    </div>

			    <h4 style="margin: 15px 0;">Servicios</h4>
			    <div class="form-row" id="servicios">

			    </div>
			    <br>
			    <div class="input-group col-mb-3">
				  <div class="input-group-prepend">
				    <span class="input-group-text">Total $</span>
				  </div>
				  <input type="text" class="form-control" name="total" required="" pattern="[0-9]+\.[0-9]{2}" title="Número entero son dos decimales ejemplo 100.00" placeholder="Precio con dos decimales (Ej. 100.00)">
				</div>
			    <div class="input-group">
				  <div class="input-group-prepend">
				    <span class="input-group-text">Comentarios</span>
				  </div>
				  <textarea name="comentarios" class="form-control" aria-label="With textarea" placeholder="Comentarios de la orden de trabajo"></textarea>
				</div>


        <br>
      </div>
      <div class="card-footer" style="background: #fff">
            <div class="row">
              <div class="col-lg-4"></div>
              <div class="col-lg-8">
                <button type="submit" class="btn btn-primary mb-2">Aceptar</button>
                <a href="<?=base_url()?>welcome/ordenesActivas" type="button" class="btn btn-secondary mb-2">Cancelar</a>
                <p id="message"></p>
              </div>
            </div>
          </div>


      </form>
		</div>
	</div>
</div>

<!-- ************************************************************************* -->
