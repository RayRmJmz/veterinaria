<script src="<?=base_url()?>assets/addReserva.js"></script>

<!-- ************************************************************************* -->
<div class="content-wrapper">
	<div class="content">
		<div class="card" style="box-shadow: 0 0 30px 0 rgba(82,63,105,.05);
      border: 0;">
		  <div class="card-header alert" style="background: #fff;">
			 <b style="font-weight: 500;
      font-size: 1.275rem;
      color: #181c32; ">Agregar Nueva Reserva</b>
		  </div>
		  <form  name="empleadosForm" method="post" action="<?=base_url()?>welcome/insertReserva" onsubmit="return validateForm()" class="needs-validation" novalidate  >
        <div class="card-body" style="border-top: 1px solid #ebedf3;">
		  		<div class="form-row">
			    	<h3 style="margin-bottom: 15px;">Cliente</h3>
			    </div>
		  		<div class="form-row">
				    <div class="form-group col-md-9">
				        <select class="selectClient"  style="width: 100%" name="cliente" id="cliente" required="" onchange="mascotas()"></select>
				    </div>

				    <div class="form-group col-md-3">
		              <label for="fecha"></label>
		              <input type="datetime-local" class="" id="fecha" name="fecha" required>
		            </div>

			    </div>

			    <h3 style="margin-bottom: 15px;">Mascotas</h3>
			    <div class="form-row" id="mascota" >

			    </div>

			    <h3 style="margin-bottom: 10px;">Servicios</h3>
			    <div class="form-row" id="servicios">

			    </div>
			    <br>
			    <div class="input-group col-mb-3">
				  <div class="input-group-prepend">
				    <span class="input-group-text">Total $</span>
				  </div>
				  <input type="text" class="form-control" name="total" pattern="[0-9]+\.[0-9]{2}" title="Número entero son dos decimales ejemplo 100.00">
				</div>

			    <div class="input-group">
				  <div class="input-group-prepend">
				    <span class="input-group-text">Comentarios</span>
				  </div>
				  <textarea name="comentarios" class="form-control" aria-label="With textarea"></textarea>
				</div>

		  </div>

      <div class="card-footer" style="background: #fff">
            <div class="row">
              <div class="col-lg-4"></div>
              <div class="col-lg-8">
                <button type="submit" class="btn btn-primary mb-2">Aceptar</button>
                <a href="<?=base_url()?>welcome/reservas" type="button" class="btn btn-secondary mb-2">Cancelar</a>
                <p id="message"></p>
              </div>
            </div>
          </div>


		  	</form>
		</div>
	</div>
</div>

<!-- ************************************************************************* -->
