
<script src="<?=base_url()?>assets/puntoVenta.js"></script>
<link rel="stylesheet" href="<?=base_url()?>assets/css/empleados.css">
<!-- ************************************************************************* -->
<div class="content-wrapper">
	<div class="content">
		<div class="card card-container" style="overflow-y: auto;">
		  <div class="card-header card-search">
      <div class="" style="text-align: center;" >
		  		<h2 style="margin-bottom: 25px">Punto de Venta</h2>
		  	</div>
        <div class="row container-search" style="align-items: center;">
          <div class="search">
            <select class="js-example-basic-single" name="articulo" id="articulo" style="width: 100%">
              <option value="0">Buscar artículo</option>
              <?php
              foreach($items->result() as $row) {
                if($row->existencia < 1){
                  echo '<option value="'.$row->id_articulo.'" disabled style="color:red;">'.$row->articulo.' existencia: sin existencias '.'</option>' ;
                }else{
                  echo '<option value="'.$row->id_articulo.'">'.$row->articulo. ' existencia: '. $row->existencia.'</option>';
                }
              }  ?>
            </select>

          </div>

          <div class="btn-add_empleado" style="color: #fff;">
            <a  type="button" class="btn btn-danger" onclick="addItem()">Agregar articulo</a>
          </div>
        </div>
		  </div>
		  <div class="card-body">


        <form method="post" action="<?=base_url()?>welcome/sellItems">
          <div class="input-group col-lg-12">
            <table class="table table-bordered table-hover tabla" id="tablaProductos">
              <thead>
                <tr>
                  <th class="titles-thead" scope="col">Folio</th>
                  <th class="titles-thead" scope="col">Producto</th>
                  <th class="titles-thead" scope="col">Existencia</th>
                  <th class="titles-thead" scope="col">Precio</th>
                  <th class="titles-thead" scope="col">Cantidad</th>
                </tr>
              </thead>
              <tbody>

              </tbody>
            </table>


            <div style="text-align: right;">
              <button type="submit" class="btn btn-primary mb-2">Aceptar</button>
            </div>
          </div>
        </form>

		  </div>
		</div>
	</div>
</div>

<!-- ************************************************************************* -->
