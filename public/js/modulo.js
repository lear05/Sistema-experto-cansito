var rowSelected;

btns = "<button type='button' class='btn btn-flat btn-success' id='addModulo'><i class='fa fa-plus'></i> Registrar</button> ";
btns += "<button type='button' class='btn btn-flat btn-warning' id='editModulo'><i class='fa fa-pencil'></i> Editar</button> ";
btns += "<button type='button' class='btn btn-flat btn-danger' id='delModulo'><i class='fa fa-trash'></i> Eliminar</button> ";
param.language.lengthMenu = btns+param.language.lengthMenu;
param.sAjaxSource = url_aplication+"modulo/grilla";
param.fnServerData = function( sUrl, aoData, fnCallback ) {
    $.ajax( {
        "url": sUrl,
        "data": aoData,
        "success": fnCallback,
        "dataType": "jsonp",
        "cache": false
    } );
};
var tblModulo = $("#table-modulo").dataTable(param);/*.columnFilter({
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
$('#table-modulo tbody').on('click','tr', function () {
    tblModulo.$('tr.bg-warning').removeClass('bg-warning');
    $(this).addClass('bg-warning');
});

$('#table-modulo tbody').on('dblclick','tr', function () {
	rowSelected = tblModulo.fnGetData(tblModulo.$('tr.bg-warning'));
    editModulo(rowSelected.DT_RowId);
});

//operaciones CRUD
$("#addModulo").click(function(){
	$("#formModulo input, #formModulo select, #formModulo textarea").val("");
	$("#alone").prop("checked", false);
	$("#id_padre").prop("disabled", false);
	$("#myModalLabel span").html("Registrar");
	$("#modalModulo").modal("show");
});

$("#editModulo").click(function(){
	rowSelected = tblModulo.fnGetData(tblModulo.$('tr.bg-warning'));
	if(rowSelected == null){
		Alerta("Seleccione un registro", "warning")
	}else{
		editModulo(rowSelected.DT_RowId);
	}
});

$("#delModulo").click(function(){
	rowSelected = tblModulo.fnGetData(tblModulo.$('tr.bg-warning'));
	if(rowSelected == null){
		Alerta("Seleccione un registro", "warning")
	}else{
		delModulo(rowSelected.DT_RowId);
	}
});

function editModulo(id){
	$("#carga").show();
	$.post(url_aplication+'modulo/get', {id_mod: id}, function(response) {
		$("#id_mod").val(response.id_mod);
		$("#name_mod").val(response.name_mod);
		if(response.id_padre==0){ response.id_padre = "";}
		$("#id_padre").val(response.id_padre);
		$("#url").val(response.url);
		$("#icon").val(response.icon);
		$("#orden").val(response.orden);

		if(response.alone==1){
			$("#alone").prop("checked", true);
			$("#id_padre").prop("disabled", true);
		}else{
			$("#alone").prop("checked", false);
			$("#id_padre").prop("disabled", false);
		}

		$("#modalModulo").modal("show");
		$("#carga").fadeOut("fast");
		$("#myModalLabel span").html("Editar");
	},'json');
}

function delModulo(id){
	Confirmar("¿Estas seguro de liminar el registro seleccionado?", "warning", function(){
		$.post(url_aplication+'modulo/delete', {id_mod: id}, function(response) {
			if(response.result==true){
				Alerta("Registro eliminado", "success");
				tblModulo.fnReloadAjax();
			}else{
				Alerta(response.msg, "danger");
			}
		},'json');
	}, function(){

	});
}