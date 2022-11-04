var rowSelected;

btns = "<button type='button' class='btn btn-flat btn-success' id='addTipoAnimal'><i class='fa fa-plus'></i> Registrar</button> ";
btns += "<button type='button' class='btn btn-flat btn-warning' id='editTipoAnimal'><i class='fa fa-pencil'></i> Editar</button> ";
btns += "<button type='button' class='btn btn-flat btn-danger' id='delTipoAnimal'><i class='fa fa-trash'></i> Eliminar</button> ";
param.language.lengthMenu = btns+param.language.lengthMenu;
param.sAjaxSource = url_aplication+"tipo_animal/grilla";
param.fnServerData = function( sUrl, aoData, fnCallback ) {
    $.ajax( {
        "url": sUrl,
        "data": aoData,
        "success": fnCallback,
        "dataType": "jsonp",
        "cache": false
    } );
};
var tblTipoAnimal = $("#table-tipo-animal").dataTable(param);/*.columnFilter({
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
$('#table-tipo-animal tbody').on('click','tr', function () {
    tblTipoAnimal.$('tr.bg-warning').removeClass('bg-warning');
    $(this).addClass('bg-warning');
});

$('#table-tipo-animal tbody').on('dblclick','tr', function () {
	rowSelected = tblTipoAnimal.fnGetData(tblTipoAnimal.$('tr.bg-warning'));
    editTipoAnimal(rowSelected.DT_RowId);
});

//operaciones CRUD
$("#addTipoAnimal").click(function(){
	$("#formTipoAnimal input, #formTipoAnimal select, #formTipoAnimal textarea").val("");
	$("#myModalLabel span").html("Registrar");
	$("#modalTipoAnimal").modal("show");
});

$("#editTipoAnimal").click(function(){
	rowSelected = tblTipoAnimal.fnGetData(tblTipoAnimal.$('tr.bg-warning'));
	if(rowSelected == null){
		Alerta("Seleccione un registro", "warning")
	}else{
		editTipoAnimal(rowSelected.DT_RowId);
	}
});

$("#delTipoAnimal").click(function(){
	rowSelected = tblTipoAnimal.fnGetData(tblTipoAnimal.$('tr.bg-warning'));
	if(rowSelected == null){
		Alerta("Seleccione un registro", "warning")
	}else{
		delTipoAnimal(rowSelected.DT_RowId);
	}
});

function editTipoAnimal(id){
	$("#carga").show();
	$.post(url_aplication+'tipo_animal/get', {id_tani: id}, function(response) {
		$("#id_tani").val(response.id_tani);
		$("#desc_tani").val(response.desc_tani);
		$("#myModalLabel span").html("Editar");
		$("#modalTipoAnimal").modal("show");
		$("#carga").fadeOut("fast");
	},'json');
}

function delTipoAnimal(id){
	Confirmar("¿Estas seguro de liminar el registro seleccionado?", "warning", function(){
		$.post(url_aplication+'tipo_animal/delete', {id_tani: id}, function(response) {
			if(response.result==true){
				Alerta("Registro eliminado", "success");
				tblTipoAnimal.fnReloadAjax();
			}else{
				Alerta(response.msg, "danger");
			}
		},'json');
	}, function(){

	});
}