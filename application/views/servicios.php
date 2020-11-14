<form>
	 <div class="form-group">
	    <label for="exampleFormControlSelect1">Roles</label>
	    <select class="form-control" id="2">
	    	<?php

			foreach ($puestos->result() as $row) { ?>
	      <option><?=$row->puesto?></option>
	  <?php } ?>
	    </select>
	  </div>
</form>
<?php

foreach ($puestos->result() as $row) {
			echo $row->puesto;
		}

foreach ($roles->result() as $row) {
			echo $row->rol;
		}
?>
