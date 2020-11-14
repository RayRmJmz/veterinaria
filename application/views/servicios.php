
<script src="<?=base_url()?>assets/servicios.js"></script>
<!-- ************************************************************************* -->
<div class="content-wrapper">
	<div class="content">
		<div class="card">
		  <div class="card-header">
          <div class="row">
            <div class="col-sm-10">
             <section><input type="text" name="busqueda" id="busqueda" placeholder="Buscar nombre, apellidos, puesto..." class="form-control mb-6" style="text-transform:uppercase;" ></section>
            </div>
            <div class="col-sm-2">
              <a href="#" class="btn btn-primary" onclick="llamado();">Agregar servicio</a>
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