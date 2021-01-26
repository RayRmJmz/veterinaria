<script src="<?=base_url()?>assets/editOrder.js"></script>

<!-- ************************************************************************* -->
<div class="content-wrapper">
	<div class="content">
		<div class="card">
		  <div class="card-header" style="background: #fff; margin: 15px 0;">
		  	<div class="" style="text-align: center;" >
		  		<h2>Editar - Actualizar orden de trabajo</h2>
		  	</div>
		  </div>
		  <div class="card-body">
		  	<div>
		  		<p style="color: #000; font-weight: 500">Datos generales</p><br>
		  		<h4>Cliente</h4><br>
          <div class="table-responsive" style="display: block;">
            <table class="table table-hover tabla ">
              <thead>
                <tr>
                  <th class="titles-thead" scope="col">Nombre completo</th>
                  <th class="titles-thead" scope="col">Teléfono</th>
                  <th class="titles-thead" scope="col">Celular</th>
                  <th class="titles-thead" scope="col">Dirección</th>
                </tr>
              </thead>
              <tbody>
                <td><?=$data->cliente?> <?=$data->apellido1?> <?=$data->apellido2?></td>
                <td><?=$data->telefono?></td>
                <td><?=$data->celular?></td>
                <td style="text-align: center;  ">Calle <?=$data->calle?> # <?=$data->numero?> Col. <?=$data->colonia?>, Mpio. <?=$data->municipio?>, C.P. <?=$data->cp?></td>
              </tbody>
            </table>
          </div>

		  		<h4>Mascota</h4><br>

        <div class="table-responsive" style="display: block;">
		  		<table class="table table-hover tabla ">
		  			<thead>
		  				<tr>
		  					<th class="titles-thead" scope="col">Nombre</th>
		  					<th class="titles-thead" scope="col">Especie</th>
		  					<th class="titles-thead" scope="col">Raza</th>
		  					<th class="titles-thead" scope="col">Pelaje</th>
		  					<th class="titles-thead" scope="col">Tamaño</th>
		  					<th class="titles-thead" scope="col">Peso</th>
		  					<th class="titles-thead" scope="col">Estatura</th>
		  					<th style="text-align: center;" class="titles-thead" scope="col">Fecha Nacimiento</th>
		  					<th class="titles-thead" scope="col">Edad</th>
		  				</tr>
		  			</thead>
		  			<tbody>
		  				<td><?=$data->nombre?></td>
		  				<td><?=$data->especie?></td>
		  				<td><?=$data->raza?></td>
		  				<td><?=$data->pelaje?></td>
		  				<td><?=$data->tamano?></td>
		  				<td><?=$data->peso?> kg</td>
		  				<td><?=$data->estatura?> mts</td>
		  				<td style="text-align: center;"><?=$data->fecha_nacimiento?></td>
		  				<td style="text-align: center;"> <?php date_default_timezone_set("America/Mexico_City");
		  							$dia_actual = date("Y-m-d");
									$edad_diff = date_diff(date_create($data->fecha_nacimiento), date_create($dia_actual));
									echo $edad_diff->format('%y año(s) %m mes(es) %d dia(s) ');?></td>
		  			</tbody>
		  		</table>
        </div>

		  	</div>

		  	<div style="margin-bottom: 20px;">
		  		<h4 style="margin-bottom: 20px;">Servicios</h4>
		  		<section id="resultado" style="display: flex;"></section>
		  	</div>
        <div class="card-footer" style="background: #fff; margin-top: 15px;">
          <div class="row" style="margin-top: 15px;">
            <div class="col-lg-4"></div>
            <div class="col-lg-8">
              <a  type="button" onclick="successOrden()" class="btn btn-success" style="color: #fff;">Terminar servicio</a>
              <a href="<?=base_url()?>welcome/ordenesActivas" type="button" class="btn btn-secondary">Regresar</a>
            </div>
          </div>
        </div>
		  </div>
		</div>
	</div>
</div>
<!-- ************************************************************************* -->
