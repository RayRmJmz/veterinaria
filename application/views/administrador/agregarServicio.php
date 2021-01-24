
<script src="<?=base_url()?>assets/servicios.js"></script>
<!-- ************************************************************************* -->
<div class="content-wrapper">
	<div class="content">
		<div class="card" style="box-shadow: 0 0 30px 0 rgba(82,63,105,.05);
      border: 0;">
		  <div class="card-header alert" style="background: #fff;">
        <b style="font-weight: 500;
      font-size: 1.275rem;
      color: #181c32; ">Agregar servicio
		  </div>

      <form  name="empleadosForm" method="post" action="<?=base_url()?>welcome/insertServicio" onsubmit="return validateForm()" class="needs-validation" novalidate >
		    <div class="card-body" style="border-top: 1px solid #ebedf3; padding: 2rem;">
		  		<div class="form-group row">
				      <label for="servicio">Servicio</label>
				      <input type="text" class="form-control" id="servicio" name="servicio" maxlength="30" required="" title="">
				      <p id="message"></p>
			    </div>
			    <div class="form-group row">
				      <label for="descripcion">Descripción</label>
				      <input type="text" class="form-control" id="descripcion" name="descripcion" maxlength="200">
			    </div>
        </div>
        <div class="card-footer" style="background: #fff">
            <div class="row">
              <div class="col-lg-4"></div>
              <div class="col-lg-8">
                <button type="submit" class="btn btn-primary mb-2">Aceptar</button>
                <a href="<?=base_url()?>welcome/servicios" type="button" class="btn btn-secondary mb-2">Cancelar</a>
              </div>
            </div>
          </div>
		  </form>
		</div>
	</div>
</div>

