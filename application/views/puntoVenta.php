
<script src="<?=base_url()?>assets/puntoVenta.js"></script>
<link rel="stylesheet" href="<?=base_url()?>assets/css/empleados.css">
<!-- ************************************************************************* -->
<div class="content-wrapper">
	<div class="content">
		<div class="card card-container" style="overflow-y: auto;">
		  <div class="card-header card-search">
        <h2>Punto de venta</h2><br>
        <div class="row container-search">
          <!-- <div class="search">
            <select class="selectItem"  style="width: 100%" ></select>
          </div> -->

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

          <div >
            <a  type="button" class="btn btn-primary" onclick="addItem()">Agregar articulo</a>
          </div>

        </div>
		  </div>
		  <div class="card-body">


        <form method="post" action="<?=base_url()?>welcome/sellItems">
          <div class="input-group col-lg-12">
            <table class="table table-bordered table-hover" id="tablaProductos">  
              <thead>
                <tr> 
                  <th>Folio</th>
                  <th>Producto</th>
                  <th>Existencia</th>
                  <th>Precio</th>
                  <th>Cantidad</th>
                </tr>
              </thead>
              <tbody>
               
              </tbody>
            </table>

            <button type="submit" class="btn btn-primary mb-2">Aceptar</button>
          </div>
        </form>

		  </div>
		</div>
	</div>
</div>

<!-- ************************************************************************* -->