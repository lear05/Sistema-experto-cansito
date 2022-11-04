var rowSelected;

btns = "<button type='button' class='btn btn-flat btn-success' id='addPerfil'><i class='fa fa-plus'></i> Registrar</button> ";
btns += "<button type='button' class='btn btn-flat btn-warning' id='editPerfil'><i class='fa fa-pencil'></i> Editar</button> ";
btns += "<button type='button' class='btn btn-flat btn-danger' id='delPerfil'><i class='fa fa-trash'></i> Eliminar</button> ";
param.language.lengthMenu = btns+param.language.lengthMenu;
param.sAjaxSource = url_aplication+"perfil/grilla";
param.fnServerData = function( sUrl, aoData, fnCallback ) {
    $.ajax( {
        "url": sUrl,
        "data": aoData,
        "success": fnCallback,
        "dataType": "jsonp",
        "cache": false
    } );
};
var tblPerfil = $("#table-perfil").dataTable(param);/*.columnFilter({
// Set filter type
	aoColumns: [
		{ type: "text" },
		{ type: "text" },
		{ type: "text" },
		{ type: "text" },
		{ type: "text" }
	]
});*/
//SELECCIONAR GRILLA
$('#table-perfil tbody').on('click','tr', function () {
    tblPerfil.$('tr.bg-warning').removeClass('bg-warning');
    $(this).addClass('bg-warning');
});

$('#table-perfil tbody').on('dblclick','tr', function () {
	rowSelected = tblPerfil.fnGetData(tblPerfil.$('tr.bg-warning'));
    editPerfil(rowSelected.DT_RowId);
});

//operaciones CRUD
$("#addPerfil").click(function(){
	$("#formPerfil input, #formPerfil select, #formPerfil textarea").val("");
	$("#myModalLabel span").html("Registrar");
	$("#modalPerfil").modal("show");
});

$("#editPerfil").click(function(){
	rowSelected = tblPerfil.fnGetData(tblPerfil.$('tr.bg-warning'));
	if(rowSelected == null){
		Alerta("Seleccione un registro", "warning")
	}else{
		editPerfil(rowSelected.DT_RowId);
	}
});

$("#delPerfil").click(function(){
	rowSelected = tblPerfil.fnGetData(tblPerfil.$('tr.bg-warning'));
	if(rowSelected == null){
		Alerta("Seleccione un registro", "warning")
	}else{
		delPerfil(rowSelected.DT_RowId);
	}
});

function editPerfil(id){
	$("#carga").show();
	$.post(url_aplication+'perfil/get', {id_per: id}, function(response) {
		$("#id_per").val(response.id_per);
		$("#name_per").val(response.name_per);
		$("#myModalLabel span").html("Editar");
		$("#modalPerfil").modal("show");
		$("#carga").fadeOut("fast");
	},'json');
}

function delPerfil(id){
	Confirmar("¿Estas seguro de liminar el registro seleccionado?", "warning", function(){
		$.post(url_aplication+'perfil/delete', {id_per: id}, function(response) {
			if(response.result==true){
				Alerta("Registro eliminado", "success");
				tblPerfil.fnReloadAjax();
			}else{
				Alerta(response.msg, "danger");
			}
		},'json');
	}, function(){

	});
}