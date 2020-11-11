function datosAdmin(datos){
	d=datos.split('||');
	$('#id_admin').val(d[0]);
	$('#usuario').val(d[1]);
	$('#clave').val(d[2]);
	$('#nombre').val(d[3]);
	$('#appaterno').val(d[4]);
	$('#apmaterno').val(d[5]);
}

function datosAdminDelete(datos){
	d=datos.split('||');
	$('#id_admin_del').val(d[0]);
	$('#usuario_del').val(d[1]);
	$('#clave_del').val(d[2]);
	$('#nombre_del').val(d[3]);
	$('#appaterno_del').val(d[4]);
	$('#apmaterno_del').val(d[5]);
}


function editUser(datos){
	d=datos.split('||');
	$('#id_usuario_edit').val(d[0]);
	$('#usuario_edit').val(d[1]);
	$('#clave_edit').val(d[2]);
	$('#nombre_edit').val(d[3]);
	$('#appaterno_edit').val(d[4]);
	$('#apmaterno_edit').val(d[5]);
	$('#id_area_edit').val(d[6]);
	$('#area_edit').val(d[7]);
}

function deleteUser(datos){
	d=datos.split('||');
	$('#id_usuario_del').val(d[0]);
	$('#usuario_del').val(d[1]);
	$('#clave_del').val(d[2]);
	$('#nombre_del').val(d[3]);
	$('#appaterno_del').val(d[4]);
	$('#apmaterno_del').val(d[5]);
	$('#id_area_del').val(d[6]);
	$('#area_del').val(d[7]);

}
