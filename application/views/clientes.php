
<script src="<?=base_url()?>assets/clientes.js"></script>


<!-- ************************************************************************* -->
<div class="content-wrapper">
	<div class="content">
		<div class="card">
		  <div class="card-header">
          <div class="row">
            <div class="col-sm-10">
             <section><input type="text" name="busqueda" id="busqueda" placeholder="Buscar cliente por nombre, apellido..." class="form-control mb-6" style="text-transform:uppercase;" ></section>
            </div>
            <div class="col-sm-2">
              <a href="<?=base_url()?>welcome/agregarCliente" class="btn btn-primary">AGREGAR CLIENE</a>
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