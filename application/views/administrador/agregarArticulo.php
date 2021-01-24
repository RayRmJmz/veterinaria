
<script src="<?=base_url()?>assets/articulos.js"></script>
<!-- ************************************************************************* -->
<div class="content-wrapper">
	<div class="content">
		<div class="card" style="box-shadow: 0 0 30px 0 rgba(82,63,105,.05);
      border: 0;">
		  <div class="card-header alert" style="background: #fff;">
        <b style="font-weight: 500;
      font-size: 1.275rem;
      color: #181c32; ">Agregar Artículo</b>
      </div>

      <form  name="empleadosForm" method="post" action="<?=base_url()?>welcome/insertArticulo" onsubmit="return validateForm()" class="needs-validation" novalidate >
        <div class="card-body" style="border-top: 1px solid #ebedf3;">
		  		<div class="form-group row">
				    <div class="col-md-6">
				      <label for="articulo">Artículo</label>
				      <input type="text" placeholder="Ingresa nombre del artículo" class="form-control" id="articulo" name="articulo" required="">
				      <p id="message"></p>
				    </div>
				    <div class="col-md-6">
				      <label for="marca">Marca</label>
				      <input type="text" placeholder="Ingresa nombre de la marca" class="form-control" id="marca" name="marca" required="">
				    </div>
			    </div>

			    <div class="form-group row">
				    <div class="col-md-6">
				      <label for="precio">Precio </label>
				      <input type="text" class="form-control" id="precio" name="precio" required="" pattern="[0-9]+\.[0-9]{2}" placeholder="Ingresa precio del artículo (Ej. 100.00)" title="Número entero con dos decimales ejemplo 100.00">
				    </div>
				    <div class="col-md-6">
				      <label for="existencia">Existencia </label>
				      <input type="text" placeholder="Ingresa cantidad de artículos en existencia" class="form-control" id="existencia" name="existencia" required="" pattern="[0-9]{1,6}" title="Número entero">
				    </div>
          </div>
        </div>
        <div class="card-footer" style="background: #fff">
          <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-8">
              <button type="submit" class="btn btn-primary mb-2">Aceptar</button>
              <a href="<?=base_url()?>welcome/articulos" type="button" class="btn btn-secondary mb-2">Cancelar</a>
            </div>
          </div>
        </div>
		  </form>
		</div>
	</div>
</div>

