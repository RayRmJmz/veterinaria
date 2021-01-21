<script src="<?=base_url()?>assets/ordenesActivas.js"></script>

<!-- ************************************************************************* -->
<div class="content-wrapper">
	<div class="content">
		<div class="card">
		  <div class="card-header">
		  	<div class="" style="text-align: center;" >
		  		<h2>Ordenes de trabajo</h2>
		  	</div>
          <div class="row">
            <div class="col-sm-10">
             <section><input type="text" name="busqueda" id="busqueda" placeholder="Buscar orden de trabajo por especie, raza, nombre..." class="form-control mb-6"></section>
            </div>
            <div class="col-sm-2">
              <a href="<?=base_url()?>welcome/nuevaOrden" class="btn btn-primary">Nueva Orden</a>
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