<script src="<?=base_url()?>assets/editOrder.js"></script>

<!-- ************************************************************************* -->
<div class="content-wrapper">
	<div class="content">
		<div class="card">
		  <div class="card-header">
		  	<div class="" style="text-align: center;" >
		  		<h2>Editar - actualizar orden de trabajo</h2>
		  	</div>
		  </div>

		  <div class="card-body">
		  	<div>
		  		<h3>Datos generales</h3><br>
		  		<h4>Cliente</h4><br>
		  		<table class="table">
		  			<thead>
		  				<tr>
		  					<th>Nombre completo</th>
		  					<th>Teléfono</th>
		  					<th>Celular</th>
		  					<th>Dirección</th>
		  				</tr>
		  			</thead>
		  			<tbody>
		  				<td><?=$data->cliente?> <?=$data->apellido1?> <?=$data->apellido2?></td>
		  				<td><?=$data->telefono?></td>
		  				<td><?=$data->celular?></td>
		  				<td><b>Calle</b> <?=$data->calle?> <b>#</b> <?=$data->numero?> <b>Col.</b> <?=$data->colonia?> <b>Mpio.</b> <?=$data->municipio?> <b>C.P.</b> <?=$data->cp?></td>
		  			</tbody>
		  		</table>

		  		<h4>Mascota</h4><br>

		  		<table class="table">
		  			<thead>
		  				<tr>
		  					<th>Especie</th>
		  					<th>Nombre</th>
		  					<th>Raza</th>
		  					<th>Pelaje</th>
		  					<th>Tamaño</th>
		  					<th>Peso</th>
		  					<th>Estatura</th>
		  					<th>Fecha nacimiento</th>
		  					<th>Edad</th>
		  				</tr>
		  			</thead>
		  			<tbody>
		  				<td><?=$data->especie?></td>
		  				<td><?=$data->nombre?></td>
		  				<td><?=$data->raza?></td>
		  				<td><?=$data->pelaje?></td>
		  				<td><?=$data->tamano?></td>
		  				<td><?=$data->peso?> kg</td>
		  				<td><?=$data->estatura?> mts</td>
		  				<td><?=$data->fecha_nacimiento?></td>
		  				<td> <?php date_default_timezone_set("America/Mexico_City");
		  							$dia_actual = date("Y-m-d");
									$edad_diff = date_diff(date_create($data->fecha_nacimiento), date_create($dia_actual));
									echo $edad_diff->format('%y año(s) %m mes(es) %d dia(s) ');?></td>
		  			</tbody>
		  		</table>
		  		
		  	</div>

		  	<div>
		  		<h3>Servicios</h3>
		  		<section id="resultado">
		  			
		  		</section>
		  	</div>
		  
   
		    
		  </div>
		</div> 
	</div>
</div>
<!-- ************************************************************************* -->